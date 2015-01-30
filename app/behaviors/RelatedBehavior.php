<?php

/**
 * Behavior for resource models that includes a list of related items.
 * This class provides helper methods for getting a properly formatted list of related resources.
 *
 * Example of a "composition" response structure with a list of related items:
 * {
 *   "heading": "demo heading",
 *   "subheading": "demo subheading",
 *   "about": "demo about",
 *   "item_type": "composition",
 *   "composition_type": "exercise",
 *   "composition": {},
 *   "contributors": [],
 *   "related": []
 * }
 */
class RelatedBehavior extends CActiveRecordBehavior
{
    /**
     * Returns any related items for the owner node.
     *
     * @return array
     */
    public function getRelatedItems()
    {
        $related = array();
        foreach ($this->owner->getRelated('related', true) as $node) {
            $resource = $this->loadRelatedResource($node);
            if ($resource === null) {
                continue;
            }
            $related[] = $resource->getRelatedAttributes();
        }
        return $related;
    }

    /**
     * Loads the rest resource model for the node.
     *
     * @param Node $node the node to get the rest resource for.
     * @return RelatedResource|null the resource model or null if not found.
     */
    protected function loadRelatedResource(Node $node)
    {
        try {
            $item = $node->item();
        } catch (NodeItemExistsButIsRestricted $e) {
            return null;
        }
        return RestApiModel::loadRelated($item);
    }
}
