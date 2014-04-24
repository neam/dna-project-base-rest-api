<?php

// auto-loading
Yii::setPathOfAlias('Role', dirname(__FILE__));
Yii::import('Role.*');

class Role extends BaseRole
{

    const DEVELOPER = 'Developer';
    const SUPER_ADMINISTRATOR = 'Super Administrator';

    const GROUP_ADMINISTRATOR = 'Group Administrator';
    const GROUP_PUBLISHER = 'Group Publisher';
    const GROUP_EDITOR = 'Group Editor';
    const GROUP_APPROVER = 'Group Approver';
    const GROUP_MODERATOR = 'Group Moderator';
    const GROUP_CONTRIBUTOR = 'Group Contributor';
    const GROUP_REVIEWER = 'Group Reviewer';
    const GROUP_TRANSLATOR = 'Group Translator';
    const GROUP_MEMBER = 'Group Member';

    const MEMBER = 'Member';
    const ANONYMOUS = 'Anonymous';


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

}
