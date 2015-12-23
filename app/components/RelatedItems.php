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
        $relationAttributeCamelized,
        $level
    ) {
        $relatedItems = static::getRelatedItems($relatedModelClass, $item, $relationAttributeCamelized);
        $relatedRestApiItemClass = "RestApi" . $relatedModelClass;
        $related = array();
        $level++;
        if (!empty($relatedItems)) {
            foreach ($relatedItems as $k => $relatedItem) {
                $related[] = $relatedRestApiItemClass::getRelatedAttributes($relatedItem, $level);
            }
        }
        return $related;
    }

    public static function getRelatedItem(
        $relatedModelClass,
        \Propel\Runtime\ActiveRecord\ActiveRecordInterface $item,
        $relationAttributeCamelized
    ) {
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
            $relatedItemClass = "\\propel\\models\\$relatedModelClass";
            $relatedItem = new $relatedItemClass;
        }
        return $relatedItem;
    }

    public static function formatItem(
        $relatedModelClass,
        \Propel\Runtime\ActiveRecord\ActiveRecordInterface $item,
        $relationAttributeCamelized,
        $level
    ) {
        $relatedItem = static::getRelatedItem($relatedModelClass, $item, $relationAttributeCamelized);
        $relatedRestApiItemClass = "RestApi" . $relatedModelClass;
        $level++;
        $related = $relatedRestApiItemClass::getRelatedAttributes($relatedItem, $level);
        return $related;
    }

    public static function setRelatedItemAttributes(
        $relatedModelClass,
        \Propel\Runtime\ActiveRecord\ActiveRecordInterface $item,
        $requestAttributes,
        $attribute,
        $fkAttribute,
        $relatedItemSetterMethod
    ) {

        // Update/create new if the attributes array is set in the related item request
        if (isset($requestAttributes->attributes->$attribute->attributes)) {
            // Existing or new
            if ($requestAttributes->attributes->$attribute->id === null) {
                $relatedItemClass = "\\propel\\models\\{$relatedModelClass}";
                $relatedItem = new $relatedItemClass;
            } else {
                $relatedItemQueryClass = "\\propel\\models\\{$relatedModelClass}Query";
                $relatedItem = $relatedItemQueryClass::create()->findPk(
                    $requestAttributes->attributes->$attribute->id
                );
            }
            $relatedRestApiItemClass = "RestApi{$relatedModelClass}";
            $relatedRestApiItemClass::setItemAttributes($relatedItem, $requestAttributes->attributes->$attribute);
            $item->$relatedItemSetterMethod($relatedItem);
        } else {
            $row[$fkAttribute] = $requestAttributes->attributes->$attribute->id;
        }

    }

}
