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

    public static function formatItems(
        $relatedModelClass,
        \Propel\Runtime\ActiveRecord\ActiveRecordInterface $item,
        $relationAttributeCamelized,
        $level
    ) {
        $helperClass = "RestApi" . $relatedModelClass;
        $relatedItemsMethod = "get{$relatedModelClass}s";
        if (!method_exists($item, $relatedItemsMethod)) {
            $relatedItemsMethod = "get{$relatedModelClass}sRelatedBy" . $relationAttributeCamelized;
        }
        $relatedItems = $item->$relatedItemsMethod();
        $related = array();
        $level++;
        if (!empty($relatedItems)) {
            foreach ($relatedItems as $k => $relatedItem) {
                $related[] = $helperClass::getRelatedAttributes($relatedItem, $level);
            }
        }
        return $related;
    }

    public static function formatItem(
        $relatedModelClass,
        \Propel\Runtime\ActiveRecord\ActiveRecordInterface $item,
        $relationAttributeCamelized,
        $level
    ) {
        $helperClass = "RestApi" . $relatedModelClass;
        $relatedItemMethod = "get{$relatedModelClass}";
        if (!method_exists($item, $relatedItemMethod)) {
            $relatedItemMethod = "get{$relatedModelClass}RelatedBy" . $relationAttributeCamelized;
        }
        if (!method_exists($item, $relatedItemMethod)) {
            throw new Exception(
                "Bad propel method name guess: " . get_class($item) . "->$relatedItemMethod() does not exist"
            );
        }

        /** @var \Propel\Runtime\ActiveRecord\ActiveRecordInterface $relatedItem */
        $relatedItem = $item->$relatedItemMethod();
        if (empty($relatedItem)) {
            $relatedItemPropelObjectClass = "\\propel\\models\\$relatedModelClass";
            $relatedItem = new $relatedItemPropelObjectClass;
        }
        $level++;
        $related = $helperClass::getRelatedAttributes($relatedItem, $level);
        return $related;
    }

}
