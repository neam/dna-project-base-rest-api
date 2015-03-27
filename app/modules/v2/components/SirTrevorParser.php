<?php

/**
 * Component for resource models that includes a sir trevor data structure.
 * This class provides helper methods for populating blocks in the sir trevor structure with more info fom the nodes
 * they represent, i.e. a video file node represented in a sir trevor structure holds only it's node id and item type
 * and the rest of the data needs to be fetched from the node and added to the structure.
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
class SirTrevorParser
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
    public static function populateSirTrevorBlocks($composition, array $options = array())
    {
        // Hack for fixing sir trevor urls where every "-" is a "\\-". (https://github.com/madebymany/sir-trevor-js/issues/248)
        $blocks = json_decode(str_replace('\\\-', '-', $composition), true);
        if (is_array($blocks) && isset($blocks['data']) && is_array($blocks['data'])) {
            foreach ($blocks['data'] as &$block) {
                self::recPopulateSirTrevorBlock($block, $options);
            }
        }
        return $blocks;
    }

    /**
     * Returns a Sir Trevor block structure based on it's `id`, i.e. the md5 hash of it's data.
     *
     * @param string $composition the composition where the block should reside.
     * @param string $blockId the md5 hash of the block data.
     * @param array $options
     * @return array|bool the block structure or false if not found.
     */
    public static function getSirTrevorBlockById($composition, $blockId, array $options = array())
    {
        // Get the "un-localized" blocks.
        $options = array_merge($options, array('localize' => false));
        $blocks = self::populateSirTrevorBlocks($composition, $options);
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
    protected static function recPopulateSirTrevorBlock(&$block, array $options = array())
    {
        if (is_array($block) && isset($block['data'], $block['type'])) {
            $block['id'] = md5(serialize($block['data']));
            $recAttr = $block['type'];

            try {
                /** @var RestApiSirTrevorBlockNode $model */
                // todo: getComponent method does not exists when running with barebones.
                $model = \Yii::app()->getComponent('sirTrevorBlockFactory')->forgeBlock($block, $options['parent']);
                if (isset($options['mode'])) {
                    $model->mode = $options['mode'];
                }

                if (isset($options['localize']) && $options['localize'] === true) {
                    if ($model instanceof RestApiSirTrevorBlockNode) {
                        $block['type'] = $block['data']['item_type'] = $model->getItemType();
                        // Blocks that refer nodes have their translations under `attributes`.
                        $block['data']['attributes'] = $model->getTranslatedBlockData();
                    } else {
                        // Pure Sir Trevor blocks have their translations directly under `data`.
                        $block['data'] = array_merge($block['data'], $model->getTranslatedBlockData());
                    }
                    if ($model->mode === RestApiSirTrevorBlockNode::MODE_TRANSLATION) {
                        $block['progress'] = $model->getTranslationProgress();
                    }
                } else {
                    // When we want the un-translated block data, we only need to care about the node referring blocks,
                    // as the pure Sir Trevor ones already have their data populated.
                    if ($model instanceof RestApiSirTrevorBlockNode) {
                        $block['type'] = $block['data']['item_type'] = $model->getItemType();
                        $block['data']['attributes'] = $model->getRawBlockData();
                        if ($model->mode === RestApiSirTrevorBlock::MODE_TRANSLATION) {
                            $block['data']['labels'] = $model->getBlockAttributeLabels();
                        }
                    }
                }
            } catch (\RestApiNoBlockModelFound $e) {
                // No block model exists for this type of block. Just ignore it.

                // If we are fetching localized blocks, then add zero progress to all blocks that don't support translation.
                if (isset($options['localize'], $options['mode']) && $options['localize'] === true && $options['mode'] === RestApiSirTrevorBlockNode::MODE_TRANSLATION) {
                    $block['progress'] = 0;
                }
            }

            if (isset($block['data'][$recAttr]) && is_array($block['data'][$recAttr])) {
                foreach ($block['data'][$recAttr] as &$child) {
                    self::recPopulateSirTrevorBlock($child, $options);
                }
            }
        }
    }
}
