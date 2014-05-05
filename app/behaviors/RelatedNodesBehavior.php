<?php

/**
 * Class RelatedNodesBehavior
 * Behavior used to get node-ids from active-records node-relations
 */
class RelatedNodesBehavior extends CActiveRecordBehavior
{
    /**
     * @param string $relation name of the relation
     * @param string $idColumn the column which values are collected from the related items
     * @return array
     */
    public function getRelatedModelColumnValues($relation, $idColumn)
    {
        $ids = array();
        foreach ($this->owner->{$relation} as $related) {
            $ids[] = $related->{$idColumn};
        }
        return $ids;
    }
}
