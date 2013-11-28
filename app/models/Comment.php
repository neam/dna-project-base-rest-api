<?php

// auto-loading
Yii::setPathOfAlias('Comment', dirname(__FILE__));
Yii::import('Comment.*');

class Comment extends BaseComment
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
            array(
                'author-owner-behavior' => array(
                    'class' => 'OwnerBehavior',
                    'ownerColumn' => 'author_user_id',
                ),
                'i18n-attribute-messages' => array(
                    'class' => 'I18nAttributeMessagesBehavior',
                    'translationAttributes' => array('comment'),
                    'languageSuffixes' => array_keys(Yii::app()->params["languages"]),
                    'messageSourceComponent' => 'dbMessages',
                ),
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

    public function search()
    {
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria(),
        ));
    }

    /**
     * Performs the mapping between real attributes and the corresponding
     * attributes that jquery comments expects
     */
    public function jqcAttributes()
    {
        $locale = CLocale::getInstance(Yii::app()->language);
        $createdDate = $locale->getDateFormatter()->formatDateTime($this->created, 'medium', 'medium');
        return array(
            "Id" => $this->id,
            "Author" => $this->authorUser->username,
            "Comment" => $this->comment,
            "ParentId" => $this->parent_id,
            "Date" => $createdDate,
        );
    }

}
