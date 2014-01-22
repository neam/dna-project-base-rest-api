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
                    'messageSourceComponent' => 'displayedMessages',
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
     * Performs the mapping between real attributes and the corresponding
     * attributes that jquery comments expects
     */
    public function jqcAttributes()
    {
        $selectedAttributes = array(
            "comment.id" => $this->id,
            "account.username" => $this->authorUser->username,
            "comment._comment" => $this->_comment,
            "comment.parent_id" => $this->parent_id,
            "comment.created" => $this->created,
        );
        return self::convertToJqcAttributes($selectedAttributes);
    }

    static public function convertToJqcAttributes($selectedAttributes)
    {

        $locale = CLocale::getInstance(Yii::app()->language);
        $createdDate = $locale->getDateFormatter()->formatDateTime($selectedAttributes["comment.created"], 'medium', 'medium');

        return array(
            "Id" => $selectedAttributes["comment.id"],
            "Author" => $selectedAttributes["account.username"],
            "Comment" => $selectedAttributes["comment._comment"],
            "ParentId" => $selectedAttributes["comment.parent_id"],
            "Date" => $createdDate,
        );

    }

}
