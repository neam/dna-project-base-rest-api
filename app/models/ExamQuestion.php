<?php

// auto-loading
Yii::setPathOfAlias('ExamQuestion', dirname(__FILE__));
Yii::import('ExamQuestion.*');

class ExamQuestion extends BaseExamQuestion
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
            array(
                'datasource' => array(self::HAS_MANY, 'DataSource', array('id' => 'node_id'), 'through' => 'outNodes'),
                'related' => array(self::HAS_MANY, 'Node', array('id' => 'id'), 'through' => 'outNodes'),
            )
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
                array('slug', 'required', 'on' => 'draft,preview,public'),
                array('question', 'required', 'on' => 'preview,public'),
                array('source_node_id', 'required', 'on' => 'public'),

                // Ordinary validation rules
                //array('about_' . $this->source_language, 'length', 'min' => 10, 'max' => 200),
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
            'draft' => array(
                'slug_' . $this->source_language,
            ),
            'preview' => array(
                'question_' . $this->source_language,
            ),
            'public' => array(
                'source_node_id',
                'alternatives',
                'related',
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
            'question' => array(
                'slug_' . $this->source_language,
                'question_' . $this->source_language,
            ),
            'answer' => array(
                'alternatives',
            ),
            'datasource' => array(
                'source_node_id',
            ),
            'related' => array(
                'related',
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'question' => Yii::t('app', 'Question'),
            'answer' => Yii::t('app', 'Answer'),
            'datasource' => Yii::t('app', 'Data source'),
            'related' => Yii::t('app', 'Related'),
        );
    }

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(), array(
                'slug' => Yii::t('model', 'Nice link'),
                'slug_en' => Yii::t('model', 'English Nice link'),
                'question' => Yii::t('model', 'Question'),
                'alternatives' => Yii::t('model', 'Alternatives'),
                'datasource' => Yii::t('model', 'Source'),
                'related' => Yii::t('model', 'Related'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'slug' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines. The identifier is "regional_population_map" url to the chapter with populations on the map.'),
                'question' => Yii::t('model', 'An understandable fact question with one fact-based correct answer. Discussions and open ended questions are part of exercises. These test questions can be corrected by a machine.'),
                'alternatives' => Yii::t('model', 'The alternative answers in a single choice question'),
                'datasource' => Yii::t('model', 'When the correct answer is presented, this provides the source and explains the answer.'),
                'related' => Yii::t('model', ''),
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
