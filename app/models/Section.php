<?php

// auto-loading
Yii::setPathOfAlias('Section', dirname(__FILE__));
Yii::import('Section.*');

class Section extends BaseSection
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
        return array_merge(parent::relations(), array(
            'htmlChunks' => array(self::MANY_MANY, 'HtmlChunk', 'section_content(section_id, html_chunk_id)'),
            'snapshots' => array(self::MANY_MANY, 'Snapshot', 'section_content(section_id, snapshot_id)'),
            'videoFiles' => array(self::MANY_MANY, 'VideoFile', 'section_content(section_id, video_file_id)'),
            'exercises' => array(self::MANY_MANY, 'Exercise', 'section_content(section_id, exercise_id)'),
            'slideshoFiles' => array(self::MANY_MANY, 'SlideshowFIle', 'section_content(section_id, slideshow_file_id)'),
            'dataArticles' => array(self::MANY_MANY, 'DataArticle', 'section_content(section_id, data_chunk_id)'),
            'downloadLinks' => array(self::MANY_MANY, 'DownloadLink', 'section_content(section_id, download_link_id)'),
            'examQuestions' => array(self::MANY_MANY, 'ExamQuestion', 'section_content(section_id, exam_question_id)'),
        ));
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
                array('title_' . $this->source_language, 'length', 'min' => 3, 'max' => 200),
            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
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
     * Define status-dependent fields
     * @return array
     */
    public function statusRequirements()
    {
        return array(
            'draft' => array(
                'title_' . $this->source_language,
            ),
            'reviewable' => array(
                'slug_' . $this->source_language,
            ),
            'publishable' => array(),
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
                'menu_label_' . $this->source_language,
            ),
        );
    }

}
