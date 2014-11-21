<?php

class SirTrevorBehavior extends CActiveRecordBehavior
{
    /**
     * Populates Sir Trevor blocks with data from the nodes they represent.
     * The blocks are identified by their node_id property.
     *
     * @param string $blocks the sir trevor block json string.
     * @return object|null the sir trevor object structure or null.
     */
    public function populateSirTrevorBlocks($blocks)
    {
        $blocks = json_decode($blocks);
        if (is_object($blocks) && isset($blocks->data) && is_array($blocks->data)) {
            foreach ($blocks->data as &$block) {
                if (!isset($block->data, $block->data->node_id)) {
                    continue;
                }
                $node = Node::model()->findByPk((int)$block->data->node_id);
                if ($node === null) {
                    continue;
                }
                try {
                    $item = $node->item();
                } catch (NodeItemExistsButIsRestricted $e) {
                    // If the node is restricted, just continue to the next one.
                    continue;
                }
                // todo: can we use model->attributes as such, the i18n attributes for example won't be translated.
                $block->data->attributes = $item->attributes;
            }
        }
        return $blocks;
    }
} 