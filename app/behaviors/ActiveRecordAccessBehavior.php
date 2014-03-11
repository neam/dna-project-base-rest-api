<?php

/**
 * @property CActiveRecord $owner
 */
class ActiveRecordAccessBehavior extends CActiveRecordBehavior
{
    /**
     * @param array|string $restrictions
     * @return CActiveRecord
     */
    public function restrictAccess()
    {
        $method = 'checkAccessFind';

        if (method_exists($this->owner, $method)) {
            $result = $this->owner->$method();
            $criteria = $this->owner->getDbCriteria();
            if ($result === false) {
                $criteria->addCondition('0');
            } else if ($result instanceof CDbCriteria || is_array($result)) {
                $criteria->mergeWith($result);
            }
        }

        return $this->owner;
    }

    /**
     * @param CEvent $event
     */
    public function beforeFind($event)
    {
        $this->restrictAccess();
    }
}