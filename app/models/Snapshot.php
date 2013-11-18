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

    public $link;
    public $thumbnail;

    public function rules()
    {
        return array_merge(
            parent::rules(), array(

                // Define status-dependent fields
                array('slug', 'required', 'on' => 'draft,preview,public'),
                array('link', 'required', 'on' => 'preview,public'),
                array('about, embed_override, tool, related', 'required', 'on' => 'public'),

                // Define step-dependent fields
                array('slug', 'safe', 'on' => 'step_slug'),
                array('title', 'safe', 'on' => 'step_title'),
                array('about', 'safe', 'on' => 'step_about'),
                //array('thumbnail_media_id', 'safe', 'on' => 'step_thumbnail'),
                array('link', 'safe', 'on' => 'step_link'),
                array('embed_override', 'safe', 'on' => 'step_embed_override'),
                array('tool', 'safe', 'on' => 'step_tool'),
                array('related', 'safe', 'on' => 'step_related'),

                array('slug', 'required', 'on' => 'step_slug'),
                array('title', 'required', 'on' => 'step_title'),
                array('about', 'required', 'on' => 'step_about'),
                //array('thumbnail_media_id', 'required', 'on' => 'step_thumbnail'),
                array('link', 'required', 'on' => 'step_link'),
                array('embed_override', 'required', 'on' => 'step_embed_override'),
                array('tool', 'required', 'on' => 'step_tool'),
                array('related', 'required', 'on' => 'step_related'),

                // Ordinary validation rules
                //array('thumbnail', 'validateThumbnail', 'on' => 'public'),
                array('about', 'length', 'min' => 10, 'max' => 200),
                array('link', 'validateLink', 'on' => 'public'),
                array('embed_override', 'validateEmbedOverride', 'on' => 'public'),
                array('tools', 'validateTools', 'on' => 'public'),
                array('related', 'validateRelated', 'on' => 'public'),
            )
        );
    }

    public function validateEmbedOverride()
    {
        return true;
        return true;
        return !is_null($this->thumbnail_media_id);
    }

    public function validateThumbnail()
    {
        return true;
        return !is_null($this->thumbnail_media_id);
    }

    public function validateLink()
    {
        // Check if this is an actual link?
        return strlen($this->link)>0;
    }

    public function validateTools()
    {
        return count($this->tools) > 0;
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
                'slug' => array(
                    'icon' => 'edit',
                ),
            ),
            'preview' => array(
                'link' => array(
                    'icon' => 'edit',
                ),
            ),
            'public' => array(
                /*
                'thumbnail' => array(
                    'icon' => 'edit',
                ),
                */
                'title' => array(
                    'icon' => 'edit',
                ),
                'about' => array(
                    'icon' => 'edit',
                ),
                'embed_override' => array(
                    'icon' => 'edit',
                    'action' => 'embedOverride',
                ),
                'tool' => array(
                    'icon' => 'edit',
                ),
                'related' => array(
                    'icon' => 'edit',
                ),
            ),
            'all' => array(
                /*
                'title' => array(
                    'icon' => 'edit',
                ),
                'about' => array(
                    'icon' => 'edit',
                ),
                'embed_override' => array(
                    'icon' => 'edit',
                ),
                'tool' => array(
                    'icon' => 'edit',
                ),
                'related' => array(
                    'icon' => 'edit',
                ),
                */
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'about' => Yii::t('app', 'About'),
            'thumbnail' => Yii::t('app', 'Thumbnail'),
            'link' => Yii::t('app', 'Vizabi state'),
            'embed_override' => Yii::t('app', 'Embed override'),
            'tool' => Yii::t('app', 'Tool'),
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

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title_en' => Yii::t('model', 'Snapshot titles are descriptive with common language. Mentioning what data, geography and time is covered. '),
                'slug_en' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines. The identifier is "regional_population_map" url to the chapter with populatoins on the map.'),
                'thumbnail' => Yii::t('model', 'This thumbnail is the visual symbol that enables users to reconginze the chapter again in a list of thumbnails. It should capture the essence of the visual presentation. and should not look like other chapters. Many chapters show bubblechart, so th thumbnail must capture the specific aspect by focusing on an essential detail.'),
                'about_en' => Yii::t('model', 'Describe the purpose of the chapter, try aviding using the word "and". When repeating a lot of aspects there is probably a uniting aspect that should be written instead.'),

                'tags' => Yii::t('model', ''),
                'dataChunks' => Yii::t('model', ''),
                'tests' => Yii::t('model', ''),
                'related' => Yii::t('model', 'Users seeing this visualization may also be interested in these Items. especially list other visualizations that should be of interest. For example: A linechart showing the world Population trend, should be related to at least 4 things: 1) linecharts with four lines for regional Population trends, 2) linechart showing Babies per Woman, 3)  line chart showing Life Expectancy for the World, 3) the chapter about World Population'),
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
