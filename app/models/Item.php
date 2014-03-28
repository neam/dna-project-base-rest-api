<?php

// auto-loading
Yii::setPathOfAlias('Item', dirname(__FILE__));
Yii::import('Item.*');

class Item extends BaseItem
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
        return parent::getItemLabel();
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

    /**
     * The attributes that is returned by the REST api
     */
    public function getAllAttributes()
    {

        $response = new stdClass();
        $response->id = $this->id;
        $response->title = $this->_title;
        return $response;

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
     * @param $criteria
     * @return array
     */
    public function findAllActualItems($criteria)
    {
        $items = array();
        // TODO: ensure that DataModel::qaModels returns the correct classes
        foreach (DataModel::qaModels() as $modelClass => $table) {
            foreach (ActiveRecord::model($modelClass)->findAll($criteria) as $relatedItemCandidate) {
                $items[] = $relatedItemCandidate;
            }
        }
        return $items;
    }

}
