<?php

// auto-loading
Yii::setPathOfAlias('Chapter', dirname(__FILE__));
Yii::import('Chapter.*');

class Chapter extends BaseChapter
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
        return (string) $this->title;
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
                'videos' => array(self::HAS_MANY, 'VideoFile', array('id' => 'node_id'), 'through' => 'outNodes'),
                'exercises' => array(self::HAS_MANY, 'Exercise', array('id' => 'node_id'), 'through' => 'outNodes'),
                'snapshots' => array(self::HAS_MANY, 'Snapshot', array('id' => 'node_id'), 'through' => 'outNodes'),
            )
        );
    }

    public $thumbnail;
    public $credits;

    public function rules()
    {
        return array_merge(
            parent::rules(), array(

                // Define status-dependent fields
                array('title_' . $this->source_language . ', slug_' . $this->source_language, 'required', 'on' => 'draft,preview,public'),
                array('thumbnail, about_' . $this->source_language . ', videos, teachers_guide, exercises, snapshots, credits', 'required', 'on' => 'public'),

                // Define step-dependent fields - Part 1 - what fields are saved at each step? (Other fields are ignored upon submit)
                array('title_' . $this->source_language . ', slug_' . $this->source_language . ', about_' . $this->source_language . ', thumbnail_media_id', 'safe', 'on' => 'draft-step_info,preview-step_info,public-step_info'),
                array('teachers_guide', 'safe', 'on' => 'draft-step_teachers_guide,preview-step_teachers_guide,public-step_teachers_guide'),
                array('exercises', 'safe', 'on' => 'draft-step_exercises,preview-step_exercises,public-step_exercises'),
                array('videos', 'safe', 'on' => 'draft-step_videos,preview-step_videos,public-step_videos'),
                array('snapshots', 'safe', 'on' => 'draft-step_snapshots,preview-step_snapshots,public-step_snapshots'),
                array('credits', 'safe', 'on' => 'draft-step_credits,preview-step_credits,public-step_credits'),

                // Define step-dependent fields - Part 2 - what fields are required at each step?
                array('title_' . $this->source_language . '', 'required', 'on' => 'draft-step_info,public-step_info,step_info'),
                array('slug_' . $this->source_language . ', about_' . $this->source_language . ', thumbnail_media_id', 'required', 'on' => 'step_info'),
                array('teachers_guide', 'required', 'on' => 'public-step_teachers_guide,step_teachers_guide'),
                array('exercises', 'required', 'on' => 'public-step_exercises,step_exercises'),
                array('videos', 'required', 'on' => 'public-step_videos,step_videos'),
                array('snapshots', 'required', 'on' => 'public-step_snapshots,step_snapshots'),
                array('credits', 'required', 'on' => 'public-step_credits,step_credits'),

                // Ordinary validation rules
                array('thumbnail', 'validateThumbnail', 'on' => 'public'),
                array('about_' . $this->source_language, 'length', 'min' => 10, 'max' => 200),
                array('videos', 'validateVideo', 'on' => 'public'),
                //array('teachers_guide', 'length', 'min' => 150, 'max' => 400), // currently not keeping constraints on html fields until further notice
                array('exercises', 'validateExercises', 'on' => 'public'),
                array('snapshots', 'validateSnapshots', 'on' => 'public'),
                array('credits', 'length', 'min' => 1, 'max' => 200),
            )
        );
    }

    public function validateThumbnail()
    {
        return !is_null($this->thumbnail_media_id);
    }

    public function validateVideo()
    {
        return count($this->videos) == 1;
    }

    public function validateExercises()
    {
        return count($this->exercises) > 0;
    }

    public function validateSnapshots()
    {
        return count($this->snapshots) > 0;
    }

    /**
     * TODO html-length...
     * @return bool
     */
    public function htmlLength()
    {
        return true;
    }

    public function flowSteps()
    {
        return array(
            'draft' => array(
                'info' => array(
                    'icon' => 'edit',
                ),
            ),
            'preview' => array(),
            'public' => array(
                'teachers_guide' => array(
                    'icon' => 'edit',
                    'action' => 'teachersGuide',
                ),
                'exercises' => array(
                    'icon' => 'edit',
                ),
                'videos' => array(
                    'icon' => 'edit',
                ),
            ),
            'all' => array(
                'snapshots' => array(
                    'icon' => 'edit',
                ),
                'credits' => array(
                    'icon' => 'edit',
                )
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
            'teachers_guide' => Yii::t('app', 'Teacher\'s guide'),
            'exercises' => Yii::t('app', 'Exercise(s)'),
            'videos' => Yii::t('app', 'Video'),
            'snapshots' => Yii::t('app', 'Snapshot(s)'),
            'credits' => Yii::t('app', 'Credits'),
            'mandatory_complete' => Yii::t('app', 'Mandatory fields filled'),
        );
    }

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(), array(
                'title' => Yii::t('model', 'Title'),
                'title_en' => Yii::t('model', 'English Title'),
            )
        );
    }

    public function getAttributeHint($key)
    {
        $a = $this->attributeHints();
        if (isset($a[$key])) {
            return $a[$key];
        }
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title_en' => Yii::t('model', 'Chapter titles are descriptive with common language. Mentioning what data, geography and time is covered. '),
                'slug_en' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines. The identifier is "regional_population_map" url to the chapter with populatoins on the map.'),
                'thumbnail' => Yii::t('model', 'This thumbnail is the visual symbol that enables users to reconginze the chapter again in a list of thumbnails. It should capture the essence of the visual presentation. and should not look like other chapters. Many chapters show bubblechart, so th thumbnail must capture the specific aspect by focusing on an essential detail.'),
                'about_en' => Yii::t('model', 'Describe the purpose of the chapter, try aviding using the word "and". When repeating a lot of aspects there is probably a uniting aspect that should be written instead.'),
                'teachers_guide_en' => Yii::t('model', 'You are a teacher. Your time is presious and your students are picky.  By watching the video you\'ve already understood the content of this chapter. Now you are reading the guide looking for ways to engage your students without loosing time. If the guide is good, you will realize you don\'t need any fancy technology. Maybe you just need seven small stones. You may get an advice to give the students one of the exercises first and then give the presentation, when they are more curious for an answer. That\'s what a good guide can do for a teacher!'),
                'exercise' => Yii::t('model', 'Exercises let students build skills and use knowledge, instead of just memorize facts and then forget them. The exercises deal with the same phenomenas as the chapter video and mimics it\'s graphics so that students can bring their understanding from the videos and slideshows into assignments.'),
                'video' => Yii::t('model', 'The video does two things. First of all it shows some core global trends and patterns. But it also gives teachers ideas for how to make these learnings come alive with simple explanations that are easy to understand and remember.  This video does not give pracitcal advice for different equipment. Such videos are found as material with the exercises of the chapter.'),
                'snapshot' => Yii::t('model', 'The visualizaitons opens a window into the data, which let\'s the students generate their hypothesis and try answering quesitons themselves. With local data the story of the chapter can be made local, by selecting your country. The visualizations in this view should relate directly to those in the video. Visualizaitons that are indirectly relevant are in the related list.'),

                'tags' => Yii::t('model', ''),
                'dataChunks' => Yii::t('model', ''),
                'tests' => Yii::t('model', ''),
                'related' => Yii::t('model', ''),
                'credits' => Yii::t('model', ''),
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
