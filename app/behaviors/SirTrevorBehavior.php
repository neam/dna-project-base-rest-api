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
            $node = SirTrevorModelFactory::getReferredBlockNode($block);
            if ($node !== null) {
                $block['type'] = $block['data']['item_type'] = $node->getCompositionItemType();
                $block['data']['attributes'] = $node->getCompositionAttributes();
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
            $model = SirTrevorModelFactory::createBlockModel($block);
            if ($model !== null) {
                $model->setAttributes((array)$block['data']);
                $model->contextId = $this->getOwner()->getNodeId();
                if ($model->validate()) {
                    foreach ($model->getTranslatableAttributes() as $attr) {
                        if (isset($model->{$attr}, $block['data'][$attr])) {
                            // todo: how to handle urls
                            $block['data'][$attr] = \Yii::t($model->getTranslationCategory($attr), $block['data'][$attr], array(), 'displayedMessages');
                        }
                    }

                    // todo: add recursive
                }
            }
        }
    }
}
