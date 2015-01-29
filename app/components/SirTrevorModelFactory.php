<?php

/**
 * Helper factory for getting Sir Trevor related models.
 */
class SirTrevorModelFactory extends CComponent
{
    /**
     * @var array map of node models that can be referred to in a Sir Trevor composition structure.
     * Must implement SirTrevorBlockNode interface.
     */
    protected static $sirTrevorBlockNodes = array(
        'video_file' => 'RestApiVideoFile',
        'html_chunk' => 'RestApiHtmlChunk',
        'download_link' => 'RestApiDownloadLink',
        'item_list_config' => 'RestApiItemList',
    );

    /**
     * @var array map of models that represent a Sir Trevor block. Not used for blocks referring a Node.
     * Must extend RestApiSirTrevorBlock base class.
     */
    protected static $sirTrevorBlockModels = array(
        'text' => 'RestApiSirTrevorBlockText',
        'heading' => 'RestApiSirTrevorBlockHeading',
        'quote' => 'RestApiSirTrevorBlockQuote',
        'list' => 'RestApiSirTrevorBlockList',
        'linked_image' => 'RestApiSirTrevorBlockLinkedImage',
    );

    /**
     * Returns a block model that represents a Sir Trevor block in a composition structure.
     * Note that blocks that refer a Node do not count as block models.
     *
     * @param array $block the block data.
     * @return RestApiSirTrevorBlock|null the model or null if not created.
     */
    public static function createBlockModel(array $block)
    {
        if (!isset($block['type'], $block['id'])) {
            return null;
        }
        if (!isset(self::$sirTrevorBlockModels[$block['type']])) {
            return null;
        }
        $model = new self::$sirTrevorBlockModels[$block['type']]();
        $model->id = $block['id'];
        $model->type = $block['type'];
        return $model;
    }

    /**
     * Returns a node model that is referred to in a Sir Trevor block.
     * The block data should include a `node_id` on which the correct model can be found.
     *
     * @param array $block the block data.
     * @return SirTrevorBlockNode|null the model or null if not created.
     */
    public static function getReferredBlockNode(array $block)
    {
        if (!isset($block['data'], $block['data']['item_type'], $block['data']['node_id'])) {
            return null;
        }
        if (!isset(self::$sirTrevorBlockNodes[$block['data']['item_type']])) {
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
        return \CActiveRecord::model(self::$sirTrevorBlockNodes[$block['data']['item_type']])->findByPk($item->id);
    }
} 