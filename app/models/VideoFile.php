<?php

// auto-loading
Yii::setPathOfAlias('VideoFile', dirname(__FILE__));
Yii::import('VideoFile.*');

class VideoFile extends BaseVideoFile
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
        return (string) !empty($this->title) ? $this->title : "Video #" . $this->id;
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
                array('thumbnail_media_id', 'validateThumbnail', 'on' => 'public'),
                array('original_media_id', 'validateClip', 'on' => 'public'),
                array('about_' . $this->source_language, 'length', 'min' => 10, 'max' => 200),
                array('subtitles' . $this->source_language, 'validateSubtitles', 'on' => 'public'),
            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    public function validateThumbnail()
    {
        return !is_null($this->thumbnail_media_id);
    }

    public function validateClip()
    {
        return !is_null($this->original_media_id);
    }

    public function validateSubtitles()
    {
        return !is_null($this->subtitles);
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
            'preview' => array(
                'original_media_id',
            ),
            'public' => array(
                'about_' . $this->source_language,
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
            'files' => array(
                'original_media_id',
            ),
            'subtitles' => array(
                'subtitles_' . $this->source_language,
                'subtitles_import_media_id',
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
            'files' => Yii::t('app', 'Files'),
            'subtitles' => Yii::t('app', 'Subtitles'),
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
                'original_media_id' => Yii::t('model', 'Film file'),
                'subtitles' => Yii::t('model', 'Subtitles'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'Descriptive language including the words that people would use to search for this video. The title can not be longer than what fits in a headline of a Google search-result snippet.'),
                'slug' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines. The identifier is "where_population_increase_future" url to the video with populations on the map.'),
                'about' => Yii::t('model', 'Describing the videos content. We avoid the word "and" in about texts and titles, as it\'s often become boring enumerations of details instead of figuring out what is the whole.'),
                'thumbnail_media_id' => Yii::t('model', 'This is the small image representing the video in lists and also the start screen as the film is loading. It shows an iconic snapshot from the film, with the crucial graphics focused to help users recognize it later. Preferably a closeup of the high res films visualization with a human touch.'),
                'original_media_id' => Yii::t('model', 'The film needs to be .webm file.'),
                'subtitles' => Yii::t('model', 'The subtitles srt file contents'),
                'subtitles_import_media_id' => Yii::t('model', 'Here you can upload and import an existing subtitles file in srt file format. <b>Warning:</b> Clicking import will replace the current subtitles with the contents of the srt file.'),
                'related' => Yii::t('model', 'After watching this video you may also be interested in these Items. If the video is on a chapter page, the chapter is assumed to related to these items as well.'),
            )
        );
    }

    public function search()
    {
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria(),
        ));
    }

    public function getParsedSubtitles()
    {
        $subtitle_lines = explode("\r\n", $this->subtitles);
        $parsed = array();
        $i = 2;
        while (isset($subtitle_lines[$i])) {
            $parsed[$subtitle_lines[$i - 2]] = (object) array(
                "id" => $subtitle_lines[$i - 2],
                "timestamp" => $subtitle_lines[$i - 1],
                "sourceMessage" => $subtitle_lines[$i],
            );
            $i = $i + 4;
        }
        return $parsed;
    }

}
