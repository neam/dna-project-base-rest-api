<?php

/**
 * Component for resource models that includes a list of related items.
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
class RelatedItems
{

    public static function getRelatedItems(
        $relatedModelClass,
        \Propel\Runtime\ActiveRecord\ActiveRecordInterface $item,
        $relationAttributeCamelized
    ) {
        $relatedItemsMethod = "get{$relatedModelClass}s";
        if (!method_exists($item, $relatedItemsMethod)) {
            $relatedItemsMethod = "get{$relatedModelClass}sRelatedBy" . $relationAttributeCamelized;
        }
        $relatedItems = $item->$relatedItemsMethod();
        return $relatedItems;
    }

    public static function formatItems(
        $relatedModelClass,
        \Propel\Runtime\ActiveRecord\ActiveRecordInterface $item,
        $relationAttributeCamelized
    ) {
        $relatedItems = static::getRelatedItems($relatedModelClass, $item, $relationAttributeCamelized);
        return static::formatRelatedItems($relatedItems, $relatedModelClass);
    }

    public static function formatRelatedItems(
        $relatedItems,
        $relatedModelClass
    ) {
        $relatedRestApiItemClass = "RestApi" . $relatedModelClass;
        $related = [];
        if (!empty($relatedItems)) {
            foreach ($relatedItems as $k => $relatedItem) {
                $related[] = $relatedRestApiItemClass::getWrapperAttributes($relatedItem);
            }
        }
        return $related;
    }

}
