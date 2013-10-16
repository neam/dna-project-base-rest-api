<?php

// auto-loading
Yii::setPathOfAlias('Section', dirname(__FILE__));
Yii::import('Section.*');

class Section extends BaseSection
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

    public function relations()
    {
        return array_merge(parent::relations(), array(
            'htmlChunks' => array(self::MANY_MANY, 'HtmlChunk', 'section_content(section_id, html_chunk_id)'),
            'snapshots' => array(self::MANY_MANY, 'Snapshot', 'section_content(section_id, snapshot_id)'),
            'videoFiles' => array(self::MANY_MANY, 'VideoFile', 'section_content(section_id, video_file_id)'),
            'teachersGuides' => array(self::MANY_MANY, 'TeachersGuide', 'section_content(section_id, teachers_guide_id)'),
            'exercises' => array(self::MANY_MANY, 'Exercise', 'section_content(section_id, exercise_id)'),
            'slideshoFiles' => array(self::MANY_MANY, 'SlideshowFIle', 'section_content(section_id, slideshow_file_id)'),
            'dataChunks' => array(self::MANY_MANY, 'DataChunk', 'section_content(section_id, data_chunk_id)'),
            'downloadLinks' => array(self::MANY_MANY, 'DownloadLink', 'section_content(section_id, download_link_id)'),
            'examQuestions' => array(self::MANY_MANY, 'ExamQuestion', 'section_content(section_id, exam_question_id)'),
        ));
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

}
