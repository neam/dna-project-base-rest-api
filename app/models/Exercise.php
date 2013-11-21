<?php

// auto-loading
Yii::setPathOfAlias('Exercise', dirname(__FILE__));
Yii::import('Exercise.*');

class Exercise extends BaseExercise
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
        return (string) !empty($this->title) ? $this->title : "Exercise #" . $this->id;
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
        //TODO: How do we sort mixed types like "materials"?
        return array_merge(
            parent::relations(),
            array(
                'materials' => array(self::HAS_MANY, 'VideoFile', array('id' => 'node_id'), 'through' => 'outNodes'),
            )
        );
    }

    public $thumbnail;
    public $materials;

    public function rules()
    {
        $return = array_merge(
            parent::rules(),
            $this->statusRequirementsRules(),
            $this->flowStepRules(),
            $this->i18nRules(),
            array(

                // Ordinary validation rules
                array('question_' . $this->source_language, 'length', 'min' => 25, 'max' => 200),
                array('description_' . $this->source_language, 'length', 'min' => 100, 'max' => 400),
                array('thumbnail', 'validateThumbnail', 'on' => 'public'),
                array('materials', 'validateMaterials', 'on' => 'public'),

            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    public function i18nRules()
    {
        $i18nRules = array();
        foreach (Yii::app()->params["languages"] as $lang => $label) {
            $i18nRules[] = array('title_' . $lang . ', slug_' . $lang . ', question_' . $lang . ', description_' . $lang, 'safe', 'on' => 'into_' . $lang . '-step_info');
            $i18nRules[] = array('title_' . $this->source_language . ', slug_' . $this->source_language . ', question_' . $this->source_language . ', description_' . $this->source_language, 'safe', 'on' => 'into_' . $lang . '-step_info');
        }
        return $i18nRules;
    }


    public function validateThumbnail()
    {
        return !is_null($this->thumbnail_media_id);
    }

    public function validateMaterials()
    {
        //TODO: How do we sort mixed?
        return true;
        return count($this->materials) > 0;
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
            'preview' => array(),
            'public' => array(
                'question_' . $this->source_language,
                'description_' . $this->source_language,
                'thumbnail_media_id',
                //'materials',
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
                'question_' . $this->source_language,
                'description_' . $this->source_language,
                'thumbnail_media_id',
            ),
            /*
            'materials' => array(
                'materials',
            ),
            'learning_objectives' => array(
                'learning_objectives',
            ),
            'related' => array(
                'related',
            ),
            */
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
            'materials' => Yii::t('app', 'Materials'),
            'learning_objectives' => Yii::t('app', 'Learning Objectives'),
            'related' => Yii::t('app', 'Related'),
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
                'question' => Yii::t('model', 'Challenge'),
                'question_en' => Yii::t('model', 'Challenge (English)'),
                'description' => Yii::t('model', 'Activity'),
                'description_en' => Yii::t('model', 'Activity (English)'),
                'thumbnail_media_id' => Yii::t('model', 'Thumbnail'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'Chapter titles are descriptive with common language. Mentioning what data, geography and time is covered. '),
                'slug' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines. The identifier is "regional_population_exercise" url to the exercise with populations on the map.'),
                'question' => Yii::t('model', 'A challenging question targeting the students, capturing the essense of the task, "Can you draw the world population trend from 1800 to 2100?" "Do your parents know how the world changed since they were young?"'),
                'description' => Yii::t('model', 'This is the procedure of the exercises, describing how to use the attached materials, and suggesting different solutions to achieve the same learning with different equipment. It may mention the attached videos that show examples of usage in different situations.'),
                'thumbnail_media_id' => Yii::t('model', 'This thumbnail is used in lists of exercises. The thumbnail should show a practical situation of doing this exercises in it\'s simplest version. If you can draw a worldmap in the sand and distribute 7 stones as billion people; that\'s the thumbnail.'),
                'tags' => Yii::t('model', 'Relevant tags refer to the content or the learning objectives. e.g. AMERICA, POPULATIONGROWTH.'),
                'materials' => Yii::t('model', 'These material that may be helpful or needed to do the exercise. It may a rough video showing how to draw a worldmap in 10 seconds or a colorful pdf-printout.'),
                'learning_objectives' => Yii::t('model', 'Whenever a teacher give the students an exercises, it\'s good to know why. What are the learning objectives? It\'s not always easy to express them. Most activities have multiple purposes and combine training skills and learning facts. The Objectives can be on many levels: "Reading charts", "Identifying where in Africa the deserts are located", "Get a feeling of proportions for World Population change.". The objectives all start with a verb describing what happens in the mind of the student.'),
                'related' => Yii::t('model', 'Users of this chapter may also be interested in these things, in addition to the related material of the various components.'),
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
