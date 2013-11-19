<?php

// auto-loading
Yii::setPathOfAlias('Tool', dirname(__FILE__));
Yii::import('Tool.*');

class Tool extends BaseTool
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
        return array_merge(
            parent::rules(), array(

                // Define status-dependent fields
                array('title_' . $this->source_language . ', slug_' . $this->source_language . '', 'required', 'on' => 'draft,preview,public'),

                // Define step-dependent fields - Part 1 - what fields are saved at each step? (Other fields are ignored upon submit)
                array('title_' . $this->source_language . ', slug_' . $this->source_language . '', 'safe', 'on' => 'draft-step_info,preview-step_info,public-step_info,step_info'),
                array('about_' . $this->source_language . '', 'safe', 'on' => 'step_info'),
                array('embed_template,', 'safe', 'on' => 'step_embed'),
                array('po_file_id', 'safe', 'on' => 'step_po'),

                // Define step-dependent fields - Part 2 - what fields are required at each step?
                array('title_' . $this->source_language . ', slug_' . $this->source_language . '', 'required', 'on' => 'draft-step_info,preview-step_info,public-step_info,step_info'),
                array('about_' . $this->source_language . '', 'required', 'on' => 'step_info'),
                array('embed_template,', 'required', 'on' => 'step_embed'),
                array('po_file_id', 'required', 'on' => 'step_po'),

                // Ordinary validation rules
                array('title_' . $this->source_language . '', 'length', 'min' => 5, 'max' => 200),
                array('about_' . $this->source_language . '', 'length', 'min' => 3, 'max' => 400),
            )
        );
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
            'public' => array(),
            'all' => array(
                'embed' => array(
                    'icon' => 'edit',
                ),
                'po' => array(
                    'icon' => 'edit',
                ),
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

    public function search()
    {
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria(),
        ));
    }

}
