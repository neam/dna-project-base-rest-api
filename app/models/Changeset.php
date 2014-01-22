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
        return "Changeset #".$this->id;
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

    public function search()
    {
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria(),
        ));
    }

    /**
     * Returns the ActiveRecord instances of type $activeRecordClass which the user has ownership on.
     *
     * @param $userId the user-id of the user which changesets will be returned
     * @param null $activeRecordClass
     * @return array|CActiveRecord[]
     */
    public function getOwn($userId, $activeRecordClass)
    {
        // Get all Changeset instances that the user has made
        $criteria = new CDbCriteria();
        $criteria->compare('user_id', $userId);
        /* @var $results Changeset[] */
        $results = $this->findAll($criteria);

        $resultsOfType = array();
        $ids = array();
        foreach ($results as $changeset) {
            $criteria = new CDbCriteria();
            $criteria->compare('node_id', $changeset->node_id);

            $ar = ActiveRecord::model($activeRecordClass)->find($criteria);
            if ($ar !== null && !in_array($ar->id, $ids)) {
                $resultsOfType[] = $ar;
                $ids[] = $ar->id;
            }
        }

        return $resultsOfType;
    }

}
