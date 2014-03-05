<?php

// auto-loading
Yii::setPathOfAlias('PoFile', dirname(__FILE__));
Yii::import('PoFile.*');

class PoFile extends BasePoFile
{

    use ItemTrait;

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        $this->itemDescription = Yii::t('itemDescription', 'For developers to manage GUI string po-files.');
        return parent::init();
    }

    public function getItemLabel()
    {
        return (string) !empty($this->title) ? $this->title : "PoFile #" . $this->id;
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
            array()
        );
    }

    public $original_media_id;
    public $processed_media_id;

    public function rules()
    {
        $return = array_merge(
            parent::rules(),
            $this->statusRequirementsRules(),
            $this->flowStepRules(),
            $this->i18nRules(),
            array(

                array('title', 'length', 'min' => 10, 'max' => 200),
                array('about', 'length', 'min' => 3, 'max' => 400),
                array('original_media_id', 'validateFile', 'on' => 'public'),

            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    public function validateFile()
    {
        return !is_null($this->original_media_id);
    }

    /**
     * TODO html-length...
     * @return bool
     */
    public function htmlLength()
    {
        return true;
    }

    /**
     * Define status-dependent fields
     * @return array
     */
    public function statusRequirements()
    {
        return array(
            'draft' => array(
                'title',
                'original_media_id',
            ),
            'preview' => array(),
            'public' => array(
                'about',
            ),
        );
    }

    /**
     * Define step-dependent fields
     * @return array
     */
    public function flowSteps()
    {
        return array(
            'file' => array(
                'title',
                'about',
                'original_media_id',
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'file' => Yii::t('app', 'File'),
        );
    }

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(), array(
                'title' => Yii::t('model', 'Title'),
                'about' => Yii::t('model', 'About'),
                'file' => Yii::t('model', 'File'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'Title'),
                'about' => Yii::t('model', 'What is this .po file for?'),
                'file' => Yii::t('model', 'The actual file'),
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

}
