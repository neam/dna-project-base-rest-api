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
            try {
                $item = $node->item();
            } catch (NodeItemExistsButIsRestricted $e) {
                // If the item is restricted, just continue to the next one.
                continue;
            }
            if ($item !== null && $item instanceof Composition) {
                $related[] = array(
                    'node_id' => $node->id,
                    'item_type' => 'composition',
                    'id' => $item->id,
                    'heading' => $item->heading,
                    'subheading' => $item->sub_heading,
                    'thumb' => $this->getRelatedItemThumbnailUrl($item),
                    'caption' => $item->caption,
                    'slug' => $item->slug,
                    'composition_type' => $item->compositionType->ref,
                );
            }
        }
        return $related;
    }

    /**
     * Returns the url for the item thumbnail image url.
     *
     * @param object $item the item object to get the url for.
     * @return string|null the absolute url or null if not found.
     */
    public function getRelatedItemThumbnailUrl($item)
    {
        $url = ($item->thumbMedia !== null)
            ? $item->thumbMedia->createUrl('item-thumbnail', true)
            : null;
        // todo: provide a fallback profile picture when it is done/exists
        // Rewriting so that the temporary files-api app is used to serve the profile pictures
        return is_string($url) ? str_replace(array("api/", "internal/"), "files-api/", $url) : $url;
    }
}
