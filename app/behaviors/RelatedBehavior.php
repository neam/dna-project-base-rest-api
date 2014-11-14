<?php

class RelatedBehavior extends CActiveRecordBehavior
{
    /**
     * Returns any related items for the owner node.
     *
     * @return array
     */
    public function getRelatedItems()
    {
        // todo: refactor when we know what related types we can support and which model supports what.
        // todo: related items are hard-coded to be composition types only for now.

        $related = array();
        foreach ($this->owner->getRelated('related', true) as $node) {
            $item = $node->item();
            if ($item !== null && $item instanceof Composition) {
                $related[] = array(
                    'node_id' => $node->id,
                    'item_type' => 'composition',
                    'id' => $item->id,
                    'heading' => $item->heading,
                    'subheading' => $item->sub_heading,
                    'thumb' => '', // todo: $this->getItemThumbnail($item),
                    'caption' => $item->caption,
                    'slug' => $item->slug,
                    'composition_type' => $item->compositionType->ref,

//                    "title": "Related Item #1",
//                    "subheading": "This is an example item.",
//                    "thumbnailUrl": "http://placehold.it/200x120",
//                    "id": 2,
//                    "permalink": "related-item-1",
//                    "item_type": "composition",
//                    "composition_type": "exercise"

                );
            }
        }
        return $related;
    }
}
