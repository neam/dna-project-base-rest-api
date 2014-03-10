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
                array('clip_webm_media_id', 'validateVideoWebm', 'on' => 'publishable'),
                array('clip_mp4_media_id', 'validateVideoMp4', 'on' => 'publishable'),
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

    public function validateVideoWebm()
    {
        return !is_null($this->clip_webm_media_id);
    }

    public function validateVideoMp4()
    {
        return !is_null($this->clip_mp4_media_id);
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
                $this->getMediaIdAttribute(),
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
                'clip_webm_media_id',
                // TODO: Add clip_mp4_media_id
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
                'clip_webm_media_id' => Yii::t('model', 'Video File (.webm)'),
                'clip_mp4_media_id' => Yii::t('model', 'Video File (.mp4)'),
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
                'about' => Yii::t('model', 'Describing the videos content. We avoid the word "and" r about texts and titles, as it\'s often become boring enumerations of details instead of figuring out what is the whole.'),
                'thumbnail_media_id' => Yii::t('model', 'This is the small image representing the video in lists and also the start screen as the film is loading. It shows an iconic snapshot from the film, with the crucial graphics focused to help users recognize it later. Preferably a closeup of the high res films visualization with a human touch.'),
                'clip_webm_media_id' => Yii::t('model', 'The film needs to be an .webm file.'),
                'clip_mp4_media_id' => Yii::t('model', 'The film needs to be an .mp4 file.'),
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

    /**
     * Returns the media ID.
     * @return integer
     */
    public function getMediaId()
    {
        return !empty($this->clip_webm_media_id) ? $this->clip_webm_media_id : $this->clip_mp4_media_id;
    }

    /**
     * Returns the media ID attribute name ('clip_webm_media_id' or 'clip_mp4_media_id').
     * @return string
     */
    public function getMediaIdAttribute()
    {
        return isset($this->clip_webm_media_id) ? 'clip_webm_media_id' : 'clip_mp4_media_id';
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

    const ROLE_TRANSLATOR = 1;
    const ROLE_REVIEWER = 2;

    /**
     * Checks access for viewing this record.
     */
    public function checkAccessView()
    {
        if (Yii::app()->user->isAdmin) {
            return true;
        } elseif (true/* and user belongs to the same group as this record */) {
            return true; // todo: return criteria
        } else {
            return false;
        }
    }

    /**
     * Checks access for translating this record.
     */
    public function checkAccessTranslate()
    {
        // Only check translators
        if (!Yii::app()->user->hasRole('Translator')) {
            return true;
        }

        if (Yii::app()->user->isAdmin) {
            return true;
        } elseif (Yii::app()->user->hasRole('Translator')) {
            return $this->createRoleAccessCriteria(self::ROLE_TRANSLATOR);
        } else {
            return $this->createOwnerAccessCriteria();
        }
    }

    /**
     * Checks access for reviewing this record.
     */
    public function checkAccessReview()
    {
        // Only check reviewers
        if (!Yii::app()->user->hasRole('Reviewer')) {
            return true;
        }

        if (Yii::app()->user->isAdmin) {
            return true;
        } elseif (Yii::app()->user->hasRole('Reviewer')) {
            return $this->createRoleAccessCriteria(self::ROLE_REVIEWER);
        } else {
            return $this->createOwnerAccessCriteria();
        }
    }

    /**
     * @param int $roleId
     * @return CDbCriteria
     */
    protected function createRoleAccessCriteria($roleId)
    {
        $criteria = new CDbCriteria();

        $criteria->join = implode(
            ' ',
            array(
            "JOIN node_has_group AS nhg ON (nhg.node_id = t.node_id)",
            "JOIN group_has_account AS gha ON (gha.group_id = nhg.group_id AND role_id = :roleId)",
            )
        );
        $criteria->params[':roleId'] = $roleId;

        if (isset($_GET['id'])) {
            $criteria->addCondition('t.id = :id');
            $criteria->params[':id'] = $_GET['id'];
        }

        return $criteria;
    }

    /**
     * @return CDbCriteria
     */
    protected function createOwnerAccessCriteria()
    {
        $criteria = new CDbCriteria();

        $criteria->addCondition("t.owner_id = :accountId");
        $criteria->params[':accountId'] = !Yii::app()->user->isGuest ? Yii::app()->user->id : -1;

        return $criteria;
    }
}
