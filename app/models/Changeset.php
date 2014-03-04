<?php

// auto-loading
Yii::setPathOfAlias('Changeset', dirname(__FILE__));
Yii::import('Changeset.*');

class Changeset extends BaseChangeset
{

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        return parent::init();
    }

    public function getItemLabel()
    {
        return "Changeset #" . $this->id;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array()
        );
    }

    public function rules()
    {
        return array_merge(
            parent::rules()
        /* , array(
          array('column1, column2', 'rule1'),
          array('column3', 'rule2'),
          ) */
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria($criteria),
        ));
    }

    /**
     * Returns the ActiveRecord instances of type $activeRecordClass which the user has ownership on.
     *
     * @param $userId the user-id of the user which changesets will be returned
     * @param $activeRecordClass
     * @return array|CActiveRecord[]
     */
    public function getOwn($userId, $activeRecordClass)
    {
        $criteria = $this->getOwnCriteria($userId);
        return ActiveRecord::model($activeRecordClass)->findAll($criteria);
    }

    public function getOwnCriteria($userId)
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'node_id IN(SELECT node_id FROM changeset WHERE user_id = :userId)';
        $criteria->params = array(':userId' => $userId);
        return $criteria;
    }

}
