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
     * @var array map of rest resource models per related active record class name (models must implement RelatedResource interface).
     */
    protected static $relatedResourceMap = array(
        'Composition' => 'RestApiComposition',
    );

    /**
     * Returns any related items for the owner node.
     *
     * @param int $nodeId
     * @return array
     */
    public static function getItems($nodeId)
    {
        $command = Yii::app()->getDb()->createCommand()
            ->select('related.id AS related_id, item.id AS item_id, item.model_class AS item_model_class')
            ->from('node related')
            ->where('(`relation`="related") AND (`relation`="related") AND (`node`.`id`=:nodeId)')
            ->order('outEdges.weight ASC');
        $command->join = 'LEFT OUTER JOIN `node` `outNodes` ON (`outNodes`.`id`=`related`.`id`)';
        $command->join .= 'LEFT OUTER JOIN `edge` `outEdges` ON (`outEdges`.`to_node_id`=`outNodes`.`id`)';
        $command->join .= 'LEFT OUTER JOIN `node` `node` ON (`node`.`id`=`outEdges`.`from_node_id`)';
        $command->join .= 'INNER JOIN `item` `item` ON (`item`.`node_id`=`related`.`id`)';

        $related = array();
        foreach ($command->queryAll(true, array(':nodeId' => (int)$nodeId)) as $row) {
            $modelId = (int)$row['item_id'];
            $modelClass = (string)$row['item_model_class'];
            if (!isset(self::$relatedResourceMap[$modelClass])) {
                continue;
            }
            $relatedModelClass = self::$relatedResourceMap[$modelClass];
            /** @var RelatedResource $resource */
            $resource = ActiveRecord::model($relatedModelClass)->findByPk($modelId);
            if ($resource === null) {
                continue;
            }
            $related[] = $resource->getRelatedAttributes();
        }
        return $related;
    }
} 