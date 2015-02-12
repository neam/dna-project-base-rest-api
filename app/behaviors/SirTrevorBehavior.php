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
     * Also localizes the blocks if the "localize" key is set to true in the options array and the app language is
     * different from the source language.
     *
     * @param string $composition the sir trevor block json string.
     * @param array $options options for the population. Valid keys values are (bool)`localize`, (string)`mode`.
     * @return array|null the sir trevor block structure or null.
     */
    public function populateSirTrevorBlocks($composition, array $options = array())
    {
        // If we don't what to localize the blocks, then we need to reset the app language.
        // This is because all blocks that refer a node will use the I18nAttributeMessagesBehavior to fetch attributes
        // and that works based on the app language.
        if (!isset($options['localize']) || $options['localize'] === false) {
            $targetLanguage = Yii::app()->language;
            Yii::app()->language = Yii::app()->sourceLanguage;
        }

        // Hack for fixing sir trevor urls where every "-" is a "\\-". (https://github.com/madebymany/sir-trevor-js/issues/248)
        $blocks = json_decode(str_replace('\\\-', '-', $composition), true);
        if (is_array($blocks) && isset($blocks['data']) && is_array($blocks['data'])) {
            foreach ($blocks['data'] as &$block) {
                $this->recPopulateSirTrevorBlock($block, $options);
                if (isset($options['localize']) && $options['localize'] === true) {
                    $this->recLocalizeSirTrevorBlock($block);
                }
            }
        }

        // If we did not want localizations, then remember to reset the app language to it's original state.
        if ((!isset($options['localize']) || $options['localize'] === false) && isset($targetLanguage)) {
            Yii::app()->language = $targetLanguage;
        }

        return $blocks;
    }

    /**
     * Returns a Sir Trevor block structure based on it's `id`, i.e. the md5 hash of it's data.
     *
     * @param string $blockId the md5 hash of the block data.
     * @return array|bool the block structure or false if not found.
     * @throws CException if the owner model does not have the `composition` field containing the Sir Trevor blocks.
     */
    public function getSirTrevorBlockById($blockId)
    {
        $owner = $this->getOwner();
        if (!isset($owner->composition)) {
            throw new \CException('Owner model does not have the `composition` field.');
        }
        // Get the "un-localized" blocks.
        $blocks = $this->populateSirTrevorBlocks($owner->composition, array('localize' => false));
        if (!empty($blocks) && isset($blocks['data']) && is_array($blocks['data'])) {
            foreach ($blocks['data'] as $block) {
                if (!empty($block['id']) && $block['id'] === $blockId) {
                    return $block;
                }
            }
        }
        return false;
    }

    /**
     * Recursively populate the Sir Trevor block with data from it's node if it is associated with one.
     * It's recursive as some blocks, e.g. download_links, have download_link blocks as their data. The method
     * recursively traverses the block only if it includes a property named exactly the same as the type of the block
     * and the value of the property is an array.
     *
     * @param array $block the Sir Trevor block to populate with data.
     * @param array $options options for the population. Valid keys values are (bool)`localize`, (string)`mode`.
     */
    protected function recPopulateSirTrevorBlock(&$block, array $options = array())
    {
        if (is_array($block) && isset($block['data'], $block['type'])) {
            $block['id'] = md5(serialize($block['data']));
            $recAttr = $block['type'];

            try {
                /** @var RestApiSirTrevorBlockNode $model */
                $model = \Yii::app()->getComponent('sirTrevorBlockFactory')->forgeBlock($block, $this->getOwner());
                if ($model instanceof RestApiSirTrevorBlockNode) {
                    $block['type'] = $block['data']['item_type'] = $model->getItemType();
                    $block['data']['attributes'] = $model->getListableAttributes($options);
                }
            } catch (\CException $e) {
                // No block model exists for this type of block. Just ignore it.
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
     * Also adds a `progress` key to every block that holds the percentage of the block translation.
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
            $block['progress'] = 0;
            $recAttr = $block['type'];

            try {
                /** @var RestApiSirTrevorBlock $model */
                $model = \Yii::app()->getComponent('sirTrevorBlockFactory')->forgeBlock($block, $this->getOwner());
                if ($model->validate()) {
                    $attributes = $model->getTranslatableAttributes();
                    $countAttributes = count($attributes);
                    $countTranslated = $model->applyTranslations($block);
                    if ($countTranslated > 0) {
                        $block['progress'] = round(($countTranslated / $countAttributes) * 100);
                    }
                }
            } catch (\CException $e) {
                // No block model exists for this type of block. Just ignore it.
            }

            if (isset($block['data'][$recAttr]) && is_array($block['data'][$recAttr])) {
                foreach ($block['data'][$recAttr] as &$child) {
                    $this->recLocalizeSirTrevorBlock($child);
                }
            }
        }
    }
}
