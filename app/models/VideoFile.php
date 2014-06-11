<?php

// auto-loading
Yii::setPathOfAlias('VideoFile', dirname(__FILE__));
Yii::import('VideoFile.*');

class VideoFile extends BaseVideoFile
{
    use ItemTrait;

    const MIME_TYPE_VIDEO_WEBM = 'video/webm';
    const MIME_TYPE_VIDEO_MP4 = 'video/mp4';

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

        // The field po_contents is not itself translated, but contains translated contents, so need to add i18n validation rules manually for the field
        $attribute = "subtitles";
        $manualI18nRules = array();
        foreach (LanguageHelper::getCodes() as $language) {
            $manualI18nRules[] = array($attribute, 'validateSubtitlesTranslation', 'on' => 'translate_into_' . $language);

            foreach ($this->flowSteps() as $step => $fields) {
                $manualI18nRules[] = array($attribute, 'validateSubtitlesTranslation', 'on' => "into_$language-step_$step");
            }
        }

        $return = array_merge(
            parent::rules(),
            $this->statusRequirementsRules(),
            $this->flowStepRules(),
            $this->i18nRules(),
            $manualI18nRules,
            array(
                // Ordinary validation rules
                array('thumbnail_media_id', 'validateThumbnail', 'on' => 'step_info,publishable,publishable-step_info'),
                array('clip_webm_media_id', 'validateVideoWebm', 'on' => 'step_files,publishable,publishable-step_files'),
                array('clip_mp4_media_id', 'validateVideoMp4', 'on' => 'step_files,publishable,publishable-step_files'),
                array('about_' . $this->source_language, 'length', 'min' => 10, 'max' => 200),
                array('subtitles_' . $this->source_language, 'validateSubtitles', 'on' => 'step_subtitles,publishable,publishable-step_subtitles'),
                array('youtube_url', 'url'),
            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    public function validateThumbnail($attribute)
    {
        if (is_null($this->thumbnail_media_id)) {
            $this->addError($attribute, Yii::t('app', '!validateThumbnail'));
        }
    }

    public function validateVideoWebm($attribute)
    {
        if (is_null($this->clip_webm_media_id)) {
            $this->addError($attribute, Yii::t('app', '!validateVideoWebm'));
        }
    }

    public function validateVideoMp4($attribute)
    {
        if (is_null($this->clip_mp4_media_id)) {
            $this->addError($attribute, Yii::t('app', '!validateVideoMp4'));
        }
    }

    public function validateSubtitles($attribute)
    {
        // Should not throw an exception or cause an error
        if (!isset($this->_subtitles)) {
            $this->getParsedSubtitles();
        }

        if (is_null($this->_subtitles)) {
            $this->addError($attribute, Yii::t('app', '!validateSubtitles'));
        }

    }

    public function validateSubtitlesTranslation($attribute)
    {
        // TODO
    }

    /**
     * TODO html-length...
     * @return bool
     */
    public function htmlLength()
    {
        if (false) {
        }
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
                'clip_mp4_media_id',
            ),
            'publishable' => array(
                'thumbnail_media_id',
                'clip_webm_media_id',
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
                'clip_webm_media_id',
                'clip_mp4_media_id',
                'youtube_url',
            ),
            'subtitles' => array(
                'subtitles_' . $this->source_language,
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
                'clip_webm_media_id' => Yii::t('model', 'Video File (.webm)'),
                'clip_mp4_media_id' => Yii::t('model', 'Video File (.mp4)'),
                'subtitles' => Yii::t('model', 'Subtitles'),
                'youtube_url' => Yii::t('model', 'YouTube URL'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'Descriptive language including the words that people would use to search for this video. The title can not be longer than what fits in a headline of a Google search-result snippet.'),
                'slug' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines. The identifier is "where_population_increase_future" url to the video with populations on the map.'),
                'about' => Yii::t('model', 'Describing the videos content. We avoid the word "and" r about texts and titles, as it\'s often become boring enumerations of details instead of figuring out what is the whole.'),
                'thumbnail_media_id' => Yii::t('model', 'This is the small image representing the video in lists and also the start screen as the film is loading. It shows an iconic snapshot from the film, with the crucial graphics focused to help users recognize it later. Preferably a closeup of the high res films visualization with a human touch.'),
                'clip_webm_media_id' => Yii::t('model', 'The film needs to be an .webm file.'),
                'clip_mp4_media_id' => Yii::t('model', 'The film needs to be an .mp4 file.'),
                'subtitles' => Yii::t('model', 'The subtitles srt file contents'),
                'subtitles_import_media_id' => Yii::t('model', 'Here you can upload and import an existing subtitles file in srt file format. Warning: Clicking import will replace the current subtitles with the contents of the srt file.'),
                'related' => Yii::t('model', 'After watching this video you may also be interested in these Items. If the video is on a chapter page, the chapter is assumed to related to these items as well.'),
                'youtube_url' => Yii::t('model', 'The URL to a video on YouTube'),
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

    /**
     * Returns the media ID.
     * @return integer
     */
    public function getMediaId()
    {
        return !empty($this->clip_webm_media_id) ? $this->clip_webm_media_id : $this->clip_mp4_media_id;
    }

    /**
     * Returns the video mime type.
     * @return string|null
     */
    public function getMimeType()
    {
        $media = P3Media::model()->findByPk($this->getMediaId());
        return $media instanceof P3Media ? $media->mime_type : null;
    }

    public function getParsedSubtitles()
    {
        $subtitle_lines = explode("\n", $this->_subtitles);

        $parsed = array();
        $p = new stdClass();
        foreach ($subtitle_lines as $subtitle_line) {

            $subtitle_line = trim($subtitle_line, "\r");

            // Check for a single number = the id
            if (!isset($p->id) && intval($subtitle_line) == $subtitle_line) {
                $p->id = $subtitle_line;
            } else {

                // Check for 00:00:29,000 --> 00:00:30,160 style row = the timestamp
                if (!isset($p->timestamp) && strpos($subtitle_line, '-->') !== false) {
                    $p->timestamp = $subtitle_line;
                } else {

                    // Check for the actual source message
                    if (!empty($subtitle_line)) {
                        if (!isset($p->sourceMessage)) {
                            $p->sourceMessage = "";
                        } else {
                            $p->sourceMessage .= "\n";
                        }
                        $p->sourceMessage .= $subtitle_line;
                    } else {
                        $parsed[] = $p;
                        $p = new stdClass();
                        continue;
                    }
                }

            }

        }
        return $parsed;
    }

    public function getTranslatedSubtitles($parsedSubtitles)
    {

        $return = "";
        foreach ($parsedSubtitles as $subtitle) {
            $return .= "{$subtitle->id}\n";
            $return .= "{$subtitle->timestamp}\n";
            $return .= Yii::t("video-{$this->id}-subtitles", $subtitle->sourceMessage, array(), 'displayedMessages', Yii::app()->language) . "\n";
            $return .= "\n";
        }
        return $return;

    }

    /**
     * The attributes that is returned by the REST api
     */
    public function getAllAttributes($includeRelated = true)
    {

        $response = new stdClass();

        $response->id = $this->id;
        $response->title = $this->title;
        $response->slug = $this->slug;
        $response->caption = $this->caption;
        $response->about = $this->about;
        //$response->tags = $this->tags;
        $response->subtitles = Yii::app()->createAbsoluteUrl('api/videoFile/subtitles', array('id' => $this->id));
        $response->thumbnail = new stdClass();
        if (!is_null($this->thumbnail_media_id)) {
            $response->thumbnail->original = $this->thumbnailMedia->createUrl('original-public', true);
            $response->thumbnail->thumb = $this->thumbnailMedia->createUrl('related-thumb', true);
        }
        $response->clipWebm = !is_null($this->clip_webm_media_id) ? $this->clipWebmMedia->createUrl('original-public-webm', true) : null;
        $response->clipMp4 = !is_null($this->clip_mp4_media_id) ? $this->clipMp4Media->createUrl('original-public-mp4', true) : null;
        $response->youtube_url = $this->youtube_url;


        if ($includeRelated) {
            $response->related = array();
            foreach ($this->related as $related) {
                $response->related[] = $related->item()->getAllAttributes(false);
            }
        }

        //$response->overlays = $this->overlays;
        //$response->dubbing = $this->dubbing;

        return $response;

    }

    /**
     * Returns the P3Media IDs for the uploaded videos.
     * @return array
     */
    public function getP3MediaIds()
    {
        $ids = array();

        if (isset($this->clip_webm_media_id)) {
            $ids[] = (int) $this->clip_webm_media_id;
        }

        if (isset($this->clip_mp4_media_id)) {
            $ids[] = (int) $this->clip_mp4_media_id;
        }

        return $ids;
    }

    /**
     * Returns the uploaded video files.
     * @return P3Media[]
     */
    public function getUploadedVideos()
    {
        $p3MediaIds = $this->getP3MediaIds();
        $criteria = new CDbCriteria();
        $criteria->addInCondition('t.id', $p3MediaIds);
        return P3Media::model()->findAll($criteria);
    }

    /**
     * Returns related video P3Media.
     * @return P3Media[]
     */
    public function getAllVideos()
    {
        return $this->getP3Media(array(
            'video/webm',
            'video/mp4',
        ));
    }

    /**
     * Returns videos by mime type.
     * @param string|array $mimeType mime type or an array of mime types.
     * @return P3Media[]
     */
    public function getVideosByMimeType($mimeType)
    {
        if (is_string($mimeType)) {
            $mimeType = array($mimeType);
        }

        return $this->getP3Media($mimeType);
    }

    /**
     * Returns related thumbnail P3Media.
     * @return P3Media[]
     */
    public function getThumbnails()
    {
        return $this->getP3Media(array(
            'image/jpeg',
            'image/png',
        ));
    }

    /**
     * Returns related video options.
     * @param string|array $mimeType mime type or an array of mime types.
     * @return array
     */
    public function getVideoOptions($mimeType)
    {
        if (is_string($mimeType)) {
            $mimeType = array($mimeType);
        }

        return $this->getOptions($this->getVideosByMimeType($mimeType));
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
     * Returns subtitle files.
     * @return P3Media[]
     */
    public function getSubtitles()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('mime_type = :mimeType');
        $criteria->addCondition('t.type = :type');
        $criteria->addCondition('t.access_owner = :userId');
        $criteria->addCondition("t.original_name LIKE '%.srt'");
        $criteria->limit = 100;
        $criteria->order = 't.created_at DESC';
        $criteria->params[':userId'] = Yii::app()->user->id;
        $criteria->params[':type'] = 'file';
        $criteria->params[':mimeType'] = 'text/plain';
        return P3Media::model()->findAll($criteria);
    }

    /**
     * Returns subtitles options.
     * @return array
     */
    public function getSubtitleOptions()
    {
        return $this->getOptions($this->getSubtitles());
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
        /** @var P3Media $videoMedia */
        $videoMedia = P3Media::model()->findByPk($this->getMediaId()); // Currently we hard-code to use the original movie file instead of any processed media

        if (isset($videoMedia)) {
            return ($this->getMimeType() === 'video/webm')
                ? $videoMedia->createUrl('original-public-webm')
                : $videoMedia->createUrl('original-public');
        } else {
            return null;
        }
    }

    /**
     * Returns the video URL for a P3Media file.
     * @param integer $p3MediaId
     * @return string|null
     */
    public function getVideoUrlForP3Media($p3MediaId)
    {
        $p3Media = P3Media::model()->findByPk($p3MediaId);
        $url = null;

        if (isset($p3Media)) {
            $url = ($p3Media->mime_type === 'video/webm')
                ? $p3Media->createUrl('original-public-webm')
                : $p3Media->createUrl('original-public');
        }

        return $url;
    }

    /**
     * Returns the translation category for the current model and attribute.
     * @return string
     */
    public function getTranslationCategory($attribute)
    {
        return 'video-' . $this->id . '-' . $attribute;
    }

    /**
     * Returns a source message model for the given source message and language.
     * @param string $sourceMessage
     * @param string $language
     * @return SourceMessage
     */
    public function getSourceMessage($sourceMessage, $language)
    {
        return SourceMessage::ensureSourceMessage(
            $this->getTranslationCategory('subtitles'),
            $sourceMessage,
            $language
        );
    }

    /**
     * Returns the current translation for the given source message and language.
     * @param string $sourceMessage
     * @param string $language
     * @return string
     */
    public function getCurrentTranslation($sourceMessage, $language)
    {
        return Yii::t(
            $this->getTranslationCategory('subtitles'),
            $sourceMessage,
            array(),
            'editedMessages',
            $language
        );
    }

    /**
     * Returns the fallback translation for the given source message and language.
     * @param string $sourceMessage the original subtitle text.
     * @param string $language the target language.
     * @return string
     */
    public function getSubtitleFallbackTranslation($sourceMessage, $language)
    {
        return Yii::t(
            $this->getTranslationCategory('subtitles'),
            $sourceMessage,
            array(),
            'displayedMessages',
            $language);
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
