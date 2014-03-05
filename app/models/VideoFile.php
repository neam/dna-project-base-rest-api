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
        $this->itemDescription = Yii::t('itemDescription', 'There are several types of videos with different purposes: Chapter summary, answering questions (title should be a questions) and giving ideas of different ways of doing an exercise.');
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
            array(
                'goBehavior' => 'app.behaviors.GoActiveRecordBehavior',
            )
        );
    }

    public function relations()
    {
        return array_merge(
            parent::relations(),
            array(
                'related' => array(self::HAS_MANY, 'Node', array('id' => 'id'), 'through' => 'outNodes', 'condition' => 'relation=:relation', 'params' => array(':relation' => 'related')),
            )
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
                array('thumbnail_media_id', 'validateThumbnail', 'on' => 'publishable'),
                array('original_media_id', 'validateClip', 'on' => 'publishable'),
                array('about_' . $this->source_language, 'length', 'min' => 10, 'max' => 200),
                array('subtitles_' . $this->source_language, 'validateSubtitles', 'on' => 'publishable'),
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
        // Should not throw an error
        $this->getParsedSubtitles();
        return !is_null($this->_subtitles);
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
            'reviewable' => array(
                'original_media_id',
            ),
            'publishable' => array(
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
                'caption_' . $this->source_language,
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
            'related' => array(
                'related',
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
            'files' => Yii::t('app', 'Files'),
            'subtitles' => Yii::t('app', 'Subtitles'),
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
                'subtitles_import_media_id' => Yii::t('model', 'Here you can upload and import an existing subtitles file in srt file format. Warning: Clicking import will replace the current subtitles with the contents of the srt file.'),
                'related' => Yii::t('model', 'After watching this video you may also be interested in these Items. If the video is on a chapter page, the chapter is assumed to related to these items as well.'),
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

    public function getParsedSubtitles()
    {
        $subtitle_lines = explode("\r\n", $this->_subtitles);
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

    /**
     * Returns related video P3Media.
     * @return P3Media[]
     */
    public function getVideos()
    {
        return $this->getP3Media(array('video/webm'));
    }

    /**
     * Returns related thumbnail P3Media.
     * @return P3Media[]
     */
    public function getThumbnails()
    {
        return $this->getP3Media(array('image/jpeg', 'image/png'));
    }

    /**
     * Returns related video options.
     * @return array
     */
    public function getVideoOptions()
    {
        return $this->getOptions($this->getVideos());
    }

    /**
     * Returns related thumbnail options.
     * @return array
     */
    public function getThumbnailOptions()
    {
        return $this->getOptions($this->getThumbnails());
    }

    /**
     * Returns related P3Media records.
     * @param array $mimeType
     * @param string $type P3Media.type
     * @return P3Media[]
     */
    public function getP3Media(array $mimeType, $type = 'file')
    {
        $criteria = new CDbCriteria();
        $criteria->addInCondition('mime_type', $mimeType);
        $criteria->addCondition('t.type = :type');
        $criteria->addCondition('t.access_owner = :userId');
        $criteria->limit = 100;
        $criteria->order = 't.created_at DESC';
        $criteria->params[':userId'] = Yii::app()->user->id;
        $criteria->params[':type'] = $type;
        return P3Media::model()->findAll($criteria);
    }

    /**
     * Returns related P3Media options.
     * @param P3Media[] $data
     * @return array
     */
    public function getOptions($data)
    {
        return TbHtml::listData(
            $data,
            'id',
            'original_name'
        );
    }

    /**
     * Returns the video URL.
     * @return string|null
     */
    public function getVideoUrl()
    {
        $videoMedia = P3Media::model()->findByPk($this->original_media_id); // Currently we hard-code to use the original movie file instead of any processed media

        if (isset($videoMedia)) {
            return $videoMedia->createUrl('original-public-webm');
        } else {
            return null;
        }
    }

    /**
     * Returns the translation category for the current model.
     * @return string
     */
    public function getTranslationCategory()
    {
        return 'video-' . $this->id . '-subtitles';
    }

    /**
     * Returns the subtitle URL.
     * @return string
     */
    public function getSubtitleUrl()
    {
        return app()->controller->createUrl('videoFile/subtitles', array('id' => $this->id));
    }
}
