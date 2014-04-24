<?php

/**
 * Class GoActiveRecordBehavior
 * Behavior explicitly for ActiveRecords of Go-type (VideoFile, Snapshot)
 */
class GoActiveRecordBehavior extends CActiveRecordBehavior
{
    /**
     * @return array of node_ids
     */
    public function getRelatedNodeIds()
    {
        $ids = array();
        foreach ($this->owner->related as $related) {
            $ids[] = $related->id;
        }
        return $ids;
    }
}
