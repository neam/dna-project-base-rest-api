<?php

// auto-loading
Yii::setPathOfAlias('ExamQuestionAlternative', dirname(__FILE__));
Yii::import('ExamQuestionAlternative.*');

class ExamQuestionAlternative extends BaseExamQuestionAlternative
{

    use ItemTrait;

    public $alternatives;

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        $this->itemDescription = Yii::t('itemDescription', 'For testing if students remember the facts in a chapter, video or exercise.');
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

    public function relations()
    {
        return array_merge(
            parent::relations(),
            array()
        );
    }

    public function rules()
    {
        $return = array_merge(
            parent::rules(),
            $this->statusRequirementsRules(),
            $this->flowStepRules(),
            $this->i18nRules(),
            array(
                array('markup_' . $this->source_language, 'required', 'on' => 'preview,public'),
                array('correct', 'required', 'on' => 'preview,public'),
                array('slug_' . $this->source_language, 'required', 'on' => 'public'),
            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    /**
     * Define status-dependent fields
     * @return array
     */
    public function statusRequirements()
    {
        return array(
            'draft' => array(),
            'preview' => array(
                'markup_' . $this->source_language,
                'correct',
            ),
            'public' => array(
                'slug_' . $this->source_language,
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
            'optional' => array(
                'slug_' . $this->source_language,
            ),
            'alternative' => array(
                'markup_' . $this->source_language,
                'correct',
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'optional' => Yii::t('app', 'Optional'),
            'alternative' => Yii::t('app', 'Alternative'),
        );
    }

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(),
            array(
                'slug' => Yii::t('model', 'Nice link'),
                'slug_en' => Yii::t('model', 'English Nice link'),
                'markup' => Yii::t('model', 'Markup'),
                'markup_en' => Yii::t('model', 'Markup (English)'),
                'correct' => Yii::t('model', 'Correct'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(),
            array(
                'slug' => Yii::t('model',''),
                'markup' => Yii::t('model',''),
                'correct' => Yii::t('model',''),
            )
        );
    }

    public function search()
    {
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria(),
        ));
    }

}
