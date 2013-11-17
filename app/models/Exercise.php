<?php

// auto-loading
Yii::setPathOfAlias('Exercise', dirname(__FILE__));
Yii::import('Exercise.*');

class Exercise extends BaseExercise
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
        return array_merge(
            parent::rules(), array(

                // Define status-dependent fields
                array('title_' . $this->source_language . ', slug_' . $this->source_language, 'required', 'on' => 'draft,preview,public'),
                array('question_' . $this->source_language . ', description_' . $this->source_language . ', thumbnail_media_id, materials', 'required', 'on' => 'public'),

                // Define step-dependent fields - Part 1 - what fields are saved at each step? (Other fields are ignored upon submit)
                array('title_' . $this->source_language . ', slug_' . $this->source_language . ', question_' . $this->source_language . ', description_' . $this->source_language . ', thumbnail_media_id', 'safe', 'on' => 'draft-step_info,preview-step_info,public-step_info,step_info'),
                array('materials', 'safe', 'on' => 'draft-step_materials,preview-step_materials,public-step_materials,step_materials'),
                //array('learning_objectives', 'safe', 'on' => 'draft-step_learning_objectives,preview-step_learning_objectives,public-step_learning_objectives,step_learning_objectives'),
                //array('related', 'safe', 'on' => 'draft-step_related,preview-step_related,public-step_related,step_related'),

                // Define step-dependent fields - Part 2 - what fields are required at each step?
                array('title_' . $this->source_language . ', slug_' . $this->source_language . ', question_' . $this->source_language . ', description_' . $this->source_language . ', thumbnail_media_id', 'required', 'on' => 'draft-step_info,preview-step_info,public-step_info,step_info'),
                array('materials', 'required', 'on' => 'draft-step_materials,preview-step_materials,public-step_materials,step_materials'),
                //array('learning_objectives', 'required', 'on' => 'draft-step_learning_objectives,preview-step_learning_objectives,public-step_learning_objectives,step_learning_objectives'),
                //array('related', 'required', 'on' => 'draft-step_related,preview-step_related,public-step_related,step_related'),

                // Ordinary validation rules
                array('question_' . $this->source_language, 'length', 'min' => 25, 'max' => 200),
                array('description_' . $this->source_language, 'length', 'min' => 100, 'max' => 400),
                array('thumbnail', 'validateThumbnail', 'on' => 'public'),
                array('materials', 'validateMaterials', 'on' => 'public'),
            )
        );
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
                'materials' => array(
                    'icon' => 'edit',
                ),
            ),
            'all' => array(),
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
                'title' => Yii::t('model', 'Chapter titles are descriptive with common language. Mentioning what data, geography and time is covered.'),
                'slug' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines. The identifier is "regional_population_map" url to the chapter with populatoins on the map.'),
                'thumbnail' => Yii::t('model', 'This thumbnail is the visual symbol that enables users to reconginze the chapter again in a list of thumbnails. It should capture the essence of the visual presentation. and should not look like other chapters. Many chapters show bubblechart, so th thumbnail must capture the specific aspect by focusing on an essential detail.'),
                'question' => Yii::t('model', 'A challenging question targeting the students, capturing the essense of the task, "Can you draw the world populaiton trend from 1800 to 2100?" "Do your parents know how the world changed since they were young?"'),
                'description' => Yii::t('model', 'This is the procedure of the exercises, describing how to use the attached materials, and suggesting different solutions to achieve the same learning with different equipment. It may mention the attached videos that show examples of usage in different situations.'),
                'materials' => Yii::t('model', 'These material that may be helpful or needed to do the exercise. It may an rough video showing how to draw a worldmap in 10 seconds or a colorful pdf-printout.'),
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
