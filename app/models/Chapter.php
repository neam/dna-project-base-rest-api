<?php

// auto-loading
Yii::setPathOfAlias('Chapter', dirname(__FILE__));
Yii::import('Chapter.*');

class Chapter extends BaseChapter
{
    use ItemTrait;

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        $this->itemDescription = Yii::t('itemDescription', 'A Chapter is a collection of related teaching material, useful to make a phenomena understandable. The video introduces the phenomena and the teachers guide suggest an effective way to convey this knowledge to students.');
        return parent::init();
    }

    public function getItemLabel()
    {
        return (string) !empty($this->title) ? $this->title : "Chapter #" . $this->id;
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
                'videos' => array(self::HAS_MANY, 'VideoFile', array('id' => 'node_id'), 'through' => 'outNodes', 'condition' => 'relation=:relation', 'params' => array(':relation' => 'videos')),
                'exercises' => array(self::HAS_MANY, 'Exercise', array('id' => 'node_id'), 'through' => 'outNodes', 'condition' => 'relation=:relation', 'params' => array(':relation' => 'exercises')),
                'snapshots' => array(self::HAS_MANY, 'Snapshot', array('id' => 'node_id'), 'through' => 'outNodes', 'condition' => 'relation=:relation', 'params' => array(':relation' => 'snapshots')),
                'related' => array(self::HAS_MANY, 'Node', array('id' => 'id'), 'through' => 'outNodes', 'condition' => 'relation=:relation', 'params' => array(':relation' => 'related')),
            )
        );
    }

    public $credits;

    public function rules()
    {
        $return = array_merge(
            parent::rules(),
            $this->statusRequirementsRules(),
            $this->flowStepRules(),
            $this->i18nRules(),
            array(
                // Ordinary validation rules
                array('thumbnail_media_id', 'validateThumbnail', 'on' => 'publishable'),
                array('about_' . $this->source_language, 'length', 'min' => 10, 'max' => 200),
                array('videos', 'validateVideo', 'on' => 'publishable'),
                //array('teachers_guide', 'length', 'min' => 150, 'max' => 400), // currently not keeping constraints on html fields until further notice
                array('exercises', 'validateExercises', 'on' => 'publishable'),
                array('snapshots', 'validateSnapshots', 'on' => 'publishable'),
                array('credits', 'length', 'min' => 1, 'max' => 200),
            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
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
            'reviewable' => array(),
            'publishable' => array(
                'about_' . $this->source_language,
                'thumbnail_media_id',
                'teachers_guide_' . $this->source_language,
                'exercises',
                'videos',
                'snapshots',
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
            'info' => array(
                'title_' . $this->source_language,
                'slug_' . $this->source_language,
                'about_' . $this->source_language,
                'thumbnail_media_id',
            ),
            'teachers_guide' => array(
                'teachers_guide_' . $this->source_language,
            ),
            'exercises' => array(
                'exercises',
            ),
            'videos' => array(
                'videos',
            ),
            'snapshots' => array(
                'snapshots',
            ),
            'related' => array(
                'related',
            ),
            /* next version
            'credits' => array(
                'credits',
            )
            */
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
            'related' => Yii::t('app', 'Related items'),
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
                'thumbnail_media_id' => Yii::t('model', 'Thumbnail'),
                'about' => Yii::t('model', 'About'),
                'about_en' => Yii::t('model', 'About (English)'),
                'tags' => Yii::t('model', 'Tags'),
                'video' => Yii::t('model', 'Video'),
                'teachers_guide' => Yii::t('model', 'Teacher\'s guide'),
                'exercises' => Yii::t('model', 'Exercise(s)'),
                'snapshots' => Yii::t('model', 'Visualization(s)'),
                'dataArticles' => Yii::t('model', 'Data'),
                'tests' => Yii::t('model', 'Test'),
                'related' => Yii::t('model', 'Related'),
                'credits' => Yii::t('model', 'Thanks'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'Chapter titles are descriptive with common language. Mentioning what data, geography and time is covered. '),
                'slug' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines. The identifier is "regional_population_map" url to the chapter with populatins on the map.'),
                'thumbnail_media_id' => Yii::t('model', 'This thumbnail is the visual symbol that enables users to reconginze the chapter again in a list of thumbnails. It should capture the essence of the visual presentation. and should not look like other chapters. Many chapters show bubblechart, so the thumbnail must capture the specific aspect by focusing on an essential detail.'),
                'about' => Yii::t('model', 'Describe the purpose of the chapter, try aviding using the word "and". When repeating a lot of aspects there is probably a uniting aspect that should be written instead.'),
                'tags' => Yii::t('model', 'Relevant tags refer to the content: e.g. AFRICA, CHANGE, CO2, AGE, INCOME, DEATH). Avoid tags about the media formats (PPT, CLASSROOM, INTERACTIVE.'),
                'video' => Yii::t('model', 'The video does two things. First of all it shows some core global trends and patterns. But it also gives teachers ideas for how to make these learnings come alive with simple explanations that are easy to understand and remember.  This video does not give pracitcal advice for different equipment. Such videos are found as material with the exercises of the chapter.'),
                'teachers_guide' => Yii::t('model', 'You are a teacher. Your time is precious and your students are picky.  By watching the video you\'ve already understood the content of this chapter. Now you are reading the guide looking for ways to engage your students without loosing time. If the guide is good, you will realize you don\'t need any fancy technology. Maybe you just need seven small stones. You may get an advice to give the students one of the exercises first and then give the presentation, when they are more curious for an answer. That\'s what a good guide can do for a teacher!'),
                'exercise' => Yii::t('model', 'Exercises let students build skills and use knowledge, instead of just memorize facts and then forget them. The exercises deal with the same phenomenas as the chapter video and mimics it\'s graphics so that students can bring their understanding from the videos and slideshows into assignments.'),
                'snapshot' => Yii::t('model', 'The visualizations opens a window into the data, which lets the students generate their hypothesis and try answering questions themselves. With local data the story of the chapter can be made local, by selecting your country. The visualizations in this view should relate directly to those in the video. Visualizations that are indirectly relevant are in the related list.'),
                'dataArticles' => Yii::t('model', 'This is the data used in this chapter, listed as relating to the video and the visualizations.'),
                'tests' => Yii::t('model', 'Fact-questions for quiz or exams. By watching the video and doing the exercises the students should be able to get the answer right.'),
                'related' => Yii::t('model', 'Users of this chapter may also be interested in these things, in addition to the related material of the various components.'),
                'credits' => Yii::t('model', 'These are the people who contributed to this chapter. They helped in different ways. Some by editing a special piece of content, some by facilitating access to schools where the materials were evaluated.'),
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
