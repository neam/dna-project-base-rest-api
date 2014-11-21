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

                $block->data->attributes = array(
                    'id' => $item->id,
                    'title' => $item->title,
                    'about' => $item->about,
                );
                // todo: what data from the node item is to be set in attributes?

            }
        }
        return $blocks;
    }
} 