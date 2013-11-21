<?php

// auto-loading
Yii::setPathOfAlias('Tool', dirname(__FILE__));
Yii::import('Tool.*');

class Tool extends BaseTool
{

    use ItemTrait;

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
        return (string) !empty($this->title) ? $this->title : "Tool #" . $this->id;
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
        $return = array_merge(
            parent::rules(),
            $this->statusRequirementsRules(),
            $this->flowStepRules(),
            $this->i18nRules(),
            array(

                // Ordinary validation rules
                array('title_' . $this->source_language . '', 'length', 'min' => 5, 'max' => 200),
                array('about_' . $this->source_language . '', 'length', 'min' => 3, 'max' => 400),

            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    public function i18nRules()
    {
        $i18nRules = array();
        foreach (Yii::app()->params["languages"] as $lang => $label) {
            $i18nRules[] = array('title_' . $lang . ', slug_' . $lang . ', about_' . $lang, 'safe', 'on' => 'into_' . $lang . '-step_info');
            $i18nRules[] = array('title_' . $this->source_language . ', slug_' . $this->source_language . ', about_' . $this->source_language, 'safe', 'on' => 'into_' . $lang . '-step_info');
        }
        return $i18nRules;
    }

    /**
     * Define status-dependent fields
     * @return array
     */
    public function statusRequirements()
    {
        return array(
            'draft' => array(
                'title_' . $this->source_language,
                'slug_' . $this->source_language,
            ),
            'preview' => array(),
            'public' => array(),
        );
    }

    /**
     * Define step-dependent fields
     * @return array
     */
    public function flowSteps()
    {
        return array(
            'info' => array(
                'title_' . $this->source_language,
                'slug_' . $this->source_language,
                'about_' . $this->source_language,
            ),
            'embed' => array(
                'embed_template',
            ),
            'po' => array(
                'po_file_id',
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
            'embed' => Yii::t('app', 'Embed'),
            'po' => Yii::t('app', 'Po'),
        );
    }

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(), array(
                'title' => Yii::t('model', 'Title'),
                'title_en' => Yii::t('model', 'English Title'),
                'slug' => Yii::t('model', 'Nice link'),
                'slug_en' => Yii::t('model', 'English Nice link'),
                'about' => Yii::t('model', 'About'),
                'about_en' => Yii::t('model', 'About (English)'),
                'embed_template' => Yii::t('model', 'Package'),
                'po_file_id' => Yii::t('model', 'Po-file'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'The name of this tool will be displayed on a page enumeration all different tools.'),
                'slug' => Yii::t('model', 'The snapshots states will contain the tool-identifier in their state-link, so linechart is better than an unreadable link.'),
                'about' => Yii::t('model', 'What is this visualization?'),
                'embed_template' => Yii::t('model', 'The package of JavaScript following the Vizabi template'),
                'po_file_id' => Yii::t('model', 'The -po file with i18n content'),
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
