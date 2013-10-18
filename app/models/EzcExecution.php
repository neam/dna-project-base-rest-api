<?php

// auto-loading
Yii::setPathOfAlias('EzcExecution', dirname(__FILE__));
Yii::import('EzcExecution.*');

class EzcExecution extends BaseEzcExecution
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
        return (string) $this->execution_id." (Workflow: {$this->workflow_id})";
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array()
        );
    }

    public function relations()
    {
        return array_merge(
            parent::relations(),
            array(
                'workflow' => array(self::BELONGS_TO, 'EzcWorkflowModel', 'workflow_id'),
            )
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

}
