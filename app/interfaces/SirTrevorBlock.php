<?php

/**
 * Interface for resource nodes represented in a sir trevor block.
 * A block is an object inside the main data section of a sir trevor data structure.
 *
 * Example of a "video_file" block:
 * {
 *   "data": [
 *     {
 *       "type": "video_file",
 *       "data": {
 *         "node_id": 1,
 *         "item_type": "video_file",
 *         "attributes": []
 *       }
 *     }
 *   ]
 * }
 */
interface SirTrevorBlock
{
    /**
     * Returns the "item_type" to be shown for the resource in the composition.
     *
     * @return string the item type.
     */
    public function getCompositionItemType();

    /**
     * Returns the attributes for the the resource when included in a sir trevor composition block.
     *
     * @return array the attributes.
     */
    public function getCompositionAttributes();
} 