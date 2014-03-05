<?php

// auto-loading
Yii::setPathOfAlias('SourceMessage', dirname(__FILE__));
Yii::import('SourceMessage.*');

class SourceMessage extends BaseSourceMessage
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

    /**
     * Virtual attribute to represent the translation that is to be saved (used for editable field widget)
     * @var
     */
    public $translation;

    public function rules()
    {
        return array_merge(
            parent::rules()
            , array(
                array('translation', 'safe'),
            )
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

    static public function ensureSourceMessage($category, $message, $language)
    {
        if (empty($language)) {
            throw new CException("Language must not be empty");
        }
        $attributes = array('category' => $category, 'message' => $message);
        if (($model = SourceMessage::model()->find('message=:message AND category=:category', $attributes)) === null) {
            $model = new SourceMessage();
            $model->attributes = $attributes;
            if (!$model->save()) {
                throw new CException('Attribute source message ' . $attributes['category'] . ' - ' . $attributes['message'] . ' could not be added to the SourceMessage table. Errors: ' . print_r($model->errors, true));
            }
        }
        return $model;
    }

}
