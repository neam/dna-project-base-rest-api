<?php

// auto-loading
Yii::setPathOfAlias('NodeHasGroup', dirname(__FILE__));
Yii::import('NodeHasGroup.*');

class NodeHasGroup extends BaseNodeHasGroup
{
    const VISIBILITY_VISIBLE = 'visible';
    const VISIBILITY_HIDDEN = 'hidden';

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
     * Makes the node visible to the group.
     */
    public function makeVisible()
    {
        $this->visibility = self::VISIBILITY_VISIBLE;
        $this->save(false);
    }

    /**
     * Makes the node hidden to the group.
     */
    public function makeHidden()
    {
        $this->visibility = self::VISIBILITY_HIDDEN;
        $this->save(false);
    }
}
