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

    static public function ensureMessage($category, $message, $language)
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
        $attributes = array('id' => $model->id, 'language' => $language);
        if (($messageModel = Message::model()->find('id=:id AND language=:language', $attributes)) === null) {
            $messageModel = new Message;
            $messageModel->id = $model->id;
            $messageModel->language = $language;
            if (!$messageModel->save()) {
                throw new CException("Could not save new Message record");
            }
        }
        return $messageModel;
    }

}
