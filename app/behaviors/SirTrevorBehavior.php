<?php

/**
 * Behavior for node resource models that includes a Sir Trevor data structure.
 * This class provides helper methods for populating and localizing blocks in the Sir Trevor structure with more info
 * from the nodes they represent, i.e. a video file node represented in a sir trevor structure holds only it's node id
 * and item type and the rest of the data needs to be fetched from the node and added to the structure.
 *
 * Example of a sir trevor data structure with only a "video_file" block:
 * {
 *   "data": [
 *     {
 *       "type": "video_file",
 *       "data": {
 *         "node_id": 1,
 *         "item_type": "video_file"
 *       }
 *     }
 *   ]
 * }
 */
class SirTrevorBehavior extends CActiveRecordBehavior
{
    /**
     * @var array map of node resource models indexed on item types (models must implement SirTrevorBlockNode interface).
     */
    protected static $sirTrevorItemMap = array(
        'video_file' => 'RestApiVideoFile',
        'html_chunk' => 'RestApiHtmlChunk',
        'download_link' => 'RestApiDownloadLink',
        'item_list_config' => 'RestApiItemList',
    );

    /**
     * @var array map of sir trevor block models indexed on block type (must extend the RestApiSirTrevorBlock base class).
     */
    protected static $sirTrevorBlockMap = array(
        'text' => 'RestApiSirTrevorBlockText',
        'heading' => 'RestApiSirTrevorBlockHeading',
        'quote' => 'RestApiSirTrevorBlockQuote',
        'list' => 'RestApiSirTrevorBlockList',
        'linked_image' => 'RestApiSirTrevorBlockLinkedImage',
    );

    /**
     * Populates Sir Trevor blocks with data from the nodes they represent.
     * The blocks are identified by their `node_id`.
     *
     * @param string $blocks the sir trevor block json string.
     * @return array|null the sir trevor block structure or null.
     */
    public function populateSirTrevorBlocks($blocks)
    {
        $blocks = json_decode($blocks, true);
        if (is_array($blocks) && isset($blocks['data']) && is_array($blocks['data'])) {
            foreach ($blocks['data'] as &$block) {
                $this->recPopulateSirTrevorBlock($block);
            }
        }
        return $blocks;
    }

    /**
     * Localizes a Sir Trevor blocks structure.
     * The blocks are identified by their `id` that is set during block structure populate.
     *
     * @see SirTrevorBehavior::populateSirTrevorBlocks
     * @param array $blocks the sir trevor block data structure.
     * @return array the localized structure.
     */
    public function localizeSirTrevorBlocks($blocks)
    {
        // todo: is this method needed, or should we always localize when we populate the blocks?

        if (is_array($blocks) && isset($blocks['data']) && is_array($blocks['data'])) {
            foreach ($blocks['data'] as &$block) {
                $this->recLocalizeSirTrevorBlock($block);
            }
        }
        return $blocks;
    }

    /**
     * Recursively populate the Sir Trevor block with data from it's node if it is associated with one.
     * It's recursive as some blocks, e.g. download_links, have download_link blocks as their data. The method
     * recursively traverses the block only if it includes a property named exactly the same as the type of the block
     * and the value of the property is an array.
     *
     * @param array $block the Sir Trevor block to populate with data.
     */
    protected function recPopulateSirTrevorBlock(&$block)
    {
        if (is_array($block) && isset($block['data'], $block['type'])) {
            // todo: can we hash all blocks data just like that??
            $block['id'] = md5(serialize($block['data']));
            $recAttr = $block['type'];
            $item = $this->loadSirTrevorBlockNodeItem($block);
            if ($item !== null) {
                $block['type'] = $block['data']['item_type'] = $item->getCompositionItemType();
                $block['data']['attributes'] = $item->getCompositionAttributes();
            }
            if (isset($block['data'][$recAttr]) && is_array($block['data'][$recAttr])) {
                foreach ($block['data'][$recAttr] as &$child) {
                    $this->recPopulateSirTrevorBlock($child);
                }
            }
        }
    }

    /**
     * Recursively localize the Sir Trevor block.
     *
     * @param array $block the Sir Trevor block structure to localize.
     */
    protected function recLocalizeSirTrevorBlock(&$block)
    {
        // No need to go further if there is nothing to translate.
        if (\Yii::app()->language === \Yii::app()->sourceLanguage) {
            return;
        }
        if (is_array($block) && isset($block['data'], $block['type'])) {
            $model = $this->loadSirTrevorBlockModel($block);
            if ($model !== null) {
                $model->setAttributes((array)$block['data']);
                if ($model->validate()) {
                    foreach ($model->getTranslatableAttributes() as $attr) {
                        if (isset($model->{$attr}, $block['data'][$attr])) {
                            // todo: which source component for Yii::t()
                            // todo: how to handle urls
                            $block['data'][$attr] = \Yii::t($model->getTranslationCategory($attr), $block['data'][$attr]);
                        }
                    }

                    // todo: add recursive
                }
            }
        }
    }

    /**
     * Loads the sir trevor blocks node resource.
     * Method requires the block array to have a keys `['data']['item_type']` and `['data']['node_id']`.
     *
     * @param array $block the block to load the node resource for.
     * @return SirTrevorBlockNode the mode resource or null if not found.
     */
    protected function loadSirTrevorBlockNodeItem($block)
    {
        if (!isset($block['data'], $block['data']['item_type'], $block['data']['node_id'])) {
            return null;
        }
        if (!isset(self::$sirTrevorItemMap[$block['data']['item_type']])) {
            return null;
        }
        $node = \Node::model()->findByPk((int)$block['data']['node_id']);
        if ($node === null) {
            return null;
        }
        try {
            $item = $node->item();
        } catch (\NodeItemExistsButIsRestricted $e) {
            return null;
        }
        if ($item === null) {
            return null;
        }
        return \CActiveRecord::model(self::$sirTrevorItemMap[$block['data']['item_type']])->findByPk($item->id);
    }

    /**
     * Loads a `RestApiSirTrevorBlock` model based on passed data.
     * Method requires the block array to have keys `['type']` and `['id']`.
     *
     * @param array $block the block data to load the model for.
     * @return RestApiSirTrevorBlock|null the block model or null if not found.
     */
    protected function loadSirTrevorBlockModel($block)
    {
        if (!isset($block['type'], $block['id'])) {
            return null;
        }
        if (!isset(self::$sirTrevorBlockMap[$block['type']])) {
            return null;
        }
        $className = self::$sirTrevorBlockMap[$block['type']];
        $model = new $className();
        $model->contextId = $this->getOwner()->getNodeId();
        $model->id = $block['id'];
        $model->type = $block['type'];
        return $model;
    }
}
