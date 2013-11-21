<?php

// auto-loading
Yii::setPathOfAlias('Snapshot', dirname(__FILE__));
Yii::import('Snapshot.*');

class Snapshot extends BaseSnapshot
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
        return (string) !empty($this->title) ? $this->title : "Snapshot #" . $this->id;
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
                'parentChapters' => array(self::HAS_MANY, 'Chapter', array('id' => 'node_id'), 'through' => 'inNodes'),
                'tools' => array(self::HAS_MANY, 'Tool', array('id' => 'node_id'), 'through' => 'outNodes'),
                'related' => array(self::HAS_MANY, 'Snapshot', array('id' => 'node_id'), 'through' => 'outNodes'),
            )
        );
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(

                // Define status-dependent fields
                array('slug', 'required', 'on' => 'draft,preview,public'),
                array('vizabi_state', 'required', 'on' => 'preview,public'),

                // Define step-dependent fields - Part 1 - what fields are saved at each step? (Other fields are ignored upon submit)
                array('slug_' . $this->source_language . '', 'safe', 'on' => 'draft-step_info,preview-step_info,public-step_info,step_info'),
                array('title_' . $this->source_language . ', about_' . $this->source_language . ', thumbnail_media_id', 'safe', 'on' => 'step_info'),
                array('vizabi_state, tool_id, embed_override', 'safe', 'on' => 'draft-step_state,preview-step_state,public-step_state,step_state'),

                // Define step-dependent fields - Part 2 - what fields are required at each step?
                array('slug_' . $this->source_language . '', 'required', 'on' => 'draft-step_info,preview-step_info,public-step_info,step_info'),
                array('title_' . $this->source_language . ', about_' . $this->source_language . ', thumbnail_media_id', 'required', 'on' => 'step_info'),
                array('vizabi_state', 'required', 'on' => 'preview-step_state,public-step_state,step_state'),
                array('tool_id, embed_override', 'required', 'on' => 'step_state'),

                // Ordinary validation rules
                array('thumbnail_media_id', 'validateThumbnail', 'on' => 'public'),
                array('about_' . $this->source_language . '', 'length', 'min' => 10, 'max' => 200),
                array('vizabi_state', 'validateVizabiState', 'on' => 'public'),
            ),
            $this->i18nRules()
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

    public function validateThumbnail()
    {
        return !is_null($this->thumbnail_media_id);
    }

    public function validateVizabiState()
    {
        return strlen($this->vizabi_state) > 0;
    }

    public function validateRelated()
    {
        return count($this->related) > 0;
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
                'state' => array(
                    'icon' => 'edit',
                ),
                'info' => array(
                    'icon' => 'edit',
                ),
            ),
            'preview' => array(),
            'public' => array(),
            'all' => array(),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'state' => Yii::t('app', 'State'),
            'info' => Yii::t('app', 'Info'),
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
                'about' => Yii::t('model', 'About'),
                'about_en' => Yii::t('model', 'About (English)'),
                'thumbnail_media_id' => Yii::t('model', 'Thumbnail'),
                'related' => Yii::t('model', 'Related'),
                'datachunks' => Yii::t('model', 'Data'),
                'vizabi_state' => Yii::t('model', 'Snapshot'),
                'tool' => Yii::t('model', 'Tool'),
                'embed_override' => Yii::t('model', 'Embed override'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'Descriptive language including the words that people would use to search for this. The title can not be longer than what fits in a headline of a Google search-result snippet.'),
                'slug' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines. The identifier is "regional_population_map" url to the chapter with populations on the map.'),
                'about' => Yii::t('model', 'What\'s interesting with this visualization.'),
                'thumbnail_media_id' => Yii::t('model', 'This thumbnail is used in lists of snapshots. Automatically generated'),
                'related' => Yii::t('model', 'Users seeing this visualization may also be interested in these Items. especially list other visualizations that should be of interest. For example: A linechart showing the world Population trend, should be related to at least 4 things: 1) linecharts with four lines for regional Population trends, 2) linechart showing Babies per Woman, 3)  line chart showing Life Expectancy for the World, 3) the chapter about World Population'),
                'datachunks' => Yii::t('model', 'This is the data that is being visualized.'),
                'vizabi_state' => Yii::t('model', 'A link to the visualization on the related page.'),
                'tool' => Yii::t('model', ''),
                'embed_override' => Yii::t('model', ''),
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
