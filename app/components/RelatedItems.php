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
    /**
     * Returns any related items for the owner node.
     *
     * @param int $nodeId
     * @return array
     */
    public static function getItems($nodeId)
    {
        $command = \barebones\Barebones::fpdo()
            ->from('node related')
            ->select('related.id AS related_id, item.id AS item_id, item.model_class AS item_model_class')
            ->where(
                '(`relation`="related") AND (`relation`="related") AND (`node`.`id`=:nodeId)',
                array(':nodeId' => (int) $nodeId)
            )
            ->order('outEdges.weight ASC')
            ->leftOuterJoin('`node` `outNodes` ON (`outNodes`.`id`=`related`.`id`)')
            ->leftOuterJoin('`edge` `outEdges` ON (`outEdges`.`to_node_id`=`outNodes`.`id`)')
            ->leftOuterJoin('`node` `node` ON (`node`.`id`=`outEdges`.`from_node_id`)')
            ->innerJoin('`item` `item` ON (`item`.`node_id`=`related`.`id`)');

        $related = array();
        foreach ($command as $row) {
            $modelId = (int) $row['item_id'];
            $modelClass = (string) $row['item_model_class'];
            $model = RestApiModel::loadRelatedByIdAndClass($modelId, $modelClass);
            if (is_null($model)) {
                continue;
            }
            $related[] = $model->getRelatedAttributes();
        }
        return $related;
    }

    public static function formatItems($modelClass, $items)
    {
        if (!is_array($items)) {
            throw new CException("Non-array sent as \$items in RelatedItems::formatItems()");
        }
        $related = array();
        /** @var CActiveRecord $model */
        $model = $modelClass::model();
        foreach ($items as $k => $item) {
            $model->id = $item->id;
            $model->attributes = $item->attributes;
            $related[] = $model->getRelatedAttributes();
        }
        return $related;
    }

    public static function formatItem($modelClass, $item)
    {
        if (empty($item)) {
            return null;
        }
        if (is_array($item)) {
            throw new CException("Array sent as \$item in RelatedItems::formatItem()");
        }
        /** @var CActiveRecord $model */
        $model = $modelClass::model();
        $model->id = $item->id;
        $model->attributes = $item->attributes;
        $related = $model->getRelatedAttributes();
        return $related;
    }
}
