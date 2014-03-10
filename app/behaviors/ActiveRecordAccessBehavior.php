<?php

/**
 * @property CActiveRecord $owner
 */
class ActiveRecordAccessBehavior extends CActiveRecordBehavior
{
    /**
     * @var array
     */
    public $findRestrictions = array('view');

    /**
     * @param array|string $restrictions
     * @return CActiveRecord
     */
    public function restrictAccess($restrictions)
    {
        if (!is_array($restrictions)) {
            $restrictions = array($restrictions);
        }

        foreach ($restrictions as $name) {
            $method = 'checkAccess' . $name;
            if (method_exists($this->owner, $method)) {
                $result = $this->owner->$method();
                $criteria = $this->owner->getDbCriteria();
                if ($result === false) {
                    $criteria->addCondition('0');
                } else if ($result instanceof CDbCriteria || is_array($result)) {
                    $criteria->mergeWith($result);
                }
            }
        }

        return $this->owner;
    }

    /**
     * @param CEvent $event
     */
    public function beforeFind($event)
    {
        $this->restrictAccess($this->findRestrictions);
    }
}