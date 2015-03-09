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
     * @var array map of rest resource models per sir trevor item types (models must implement SirTrevorBlock interface).
     */
    protected static $sirTrevorItemMap = array(
        'video_file' => 'RestApiVideoFile',
        'html_chunk' => 'RestApiHtmlChunk',
        'download_link' => 'RestApiDownloadLink',
        'item_list_config' => 'RestApiItemListConfig',
        'slideshow_file' => 'RestApiSlideshowFile',
        'visualization' => 'RestApiVisualization',
    );

    /**
     * Populates Sir Trevor blocks with data from the nodes they represent.
     * The blocks are identified by their node_id property.
     *
     * @param string $blocks the sir trevor block json string.
     * @return object|null the sir trevor object structure or null.
     */
    public static function populateSirTrevorBlocks($blocks)
    {
        // hack for fixing sir trevor urls where every "-" is a "\\-". (https://github.com/madebymany/sir-trevor-js/issues/248)
        $blocks = json_decode(str_replace('\\\-', '-', $blocks));
        if (is_object($blocks) && isset($blocks->data) && is_array($blocks->data)) {
            foreach ($blocks->data as &$block) {
                self::recPopulateSirTrevorBlock($block);
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
     * @param object $block the Sir Trevor block to populate with data.
     */
    protected static function recPopulateSirTrevorBlock(&$block)
    {
        if (is_object($block) && isset($block->data, $block->type)) {
            $recAttr = $block->type;
            $resource = self::loadSirTrevorBlockResource($block);
            if ($resource !== null) {
                $block->type = $block->data->item_type = $resource->getCompositionItemType();
                $block->data->attributes = $resource->getCompositionAttributes();
            }
            if (isset($block->data->{$recAttr}) && is_array($block->data->{$recAttr})) {
                foreach ($block->data->{$recAttr} as &$child) {
                    self::recPopulateSirTrevorBlock($child);
                }
            }
        }
    }

    /**
     * Loads a rest resource model for the block node.
     * Method requires the block object to have a data object with a item_type.
     *
     * @param object $block the block object to load the rest resource for.
     * @return SirTrevorBlock the rest resource model or null if not found.
     */
    protected static function loadSirTrevorBlockResource($block)
    {
        if (!isset($block->data, $block->data->item_type, $block->data->node_id)) {
            return null;
        }
        if (!isset(self::$sirTrevorItemMap[$block->data->item_type])) {
            return null;
        }
        $resourceClass = self::$sirTrevorItemMap[$block->data->item_type];
        $command = \barebones\Barebones::fpdo()
            //->select('id')
            ->from('item')
            ->where('node_id=:nodeId', array(':nodeId' => (int)$block->data->node_id));
        $result = $command->fetch();
        if (empty($result)) {
            return null;
        }
        $modelId = $result['id'];
        return $resourceClass::model()->findByPk($modelId);
    }
}
