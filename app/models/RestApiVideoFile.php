<?php

/**
 * Video file resource.
 *
 * Properties made available through the I18nAttributeMessagesBehavior class:
 * @property string $title
 * @property string $caption
 * @property string $about
 *
 * Properties made available through the I18nColumnsBehavior class:
 * @property string $slug
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 *
 * Methods made available through the WRestModelBehavior class:
 * @method array getCreateAttributes
 * @method array getUpdateAttributes
 *
 * Methods made available through the RelatedBehavior class:
 * @method array getRelatedItems()
 */
class RestApiVideoFile extends VideoFile implements SirTrevorBlock
{
    /**
     * @inheritdoc
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array(
                'rest-model-behavior' => array(
                    'class' => 'WRestModelBehavior',
                ),
                'RestrictedAccessBehavior' => array(
                    'class' => '\RestrictedAccessBehavior',
                ),
                'i18n-attribute-messages' => array(
                    'class' => 'I18nAttributeMessagesBehavior',
                    'translationAttributes' => array('title', 'caption', 'about'),
                    'languageSuffixes' => LanguageHelper::getCodes(),
                    'behaviorKey' => 'i18n-attribute-messages',
                    'displayedMessageSourceComponent' => 'displayedMessages',
                    'editedMessageSourceComponent' => 'editedMessages',
                ),
                'i18n-columns' => array(
                    'class' => 'I18nColumnsBehavior',
                    'translationAttributes' => array('slug'),
                ),
                'related-behavior' => array(
                    'class' => 'RelatedBehavior',
                ),
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function getAllAttributes()
    {
        return array(
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'caption' => $this->caption,
            'about' => $this->about,
            'thumbnail' => $this->getUrlThumbnail(),
            'url_mp4' => $this->getUrlMp4(),
            'url_webm' => $this->getUrlWebm(),
            'url_youtube' => $this->youtube_url,
            'url_subtitles' => $this->getUrlSubtitles(),
            'related' => $this->getRelatedItems(),
        );
    }

    /**
     * @inheritdoc
     */
    public function getCompositionAttributes()
    {
        return array(
            'id' => $this->id,
            'title' => $this->title,
            'thumbnail' => $this->getUrlThumbnail(),
            'url_mp4' => $this->getUrlMp4(),
            'url_webm' => $this->getUrlWebm(),
            'url_youtube' => $this->youtube_url,
            'url_subtitles' => $this->getUrlSubtitles(),
        );
    }

    /**
     * Returns absolute url to the api endpoint for retrieving a video files subtitles.
     * It needs to be a separate end-point as the video player in use requires the subtitles to be loaded from a url.
     *
     * @return string
     */
    protected function getUrlSubtitles()
    {
        return Yii::app()->createAbsoluteUrl('/v1/videoFile/subtitles/' . $this->id);
    }

    /**
     * Returns absolute url to the video file thumbnail.
     *
     * @return string|null the url or null if no thumbnail media found.
     */
    protected function getUrlThumbnail()
    {
        if (empty($this->thumbnailMedia)) {
            return null;
        }
        $url = $this->thumbnailMedia->createUrl('original-public', true);
        // Rewriting so that the temporary files-api app is used to serve the profile pictures
        return str_replace(array("api/", "internal/"), "files-api/", $url);
    }

    /**
     * Returns absolute url to the video file in mp4 format.
     *
     * @return string|null the url or null if video media not found.
     */
    protected function getUrlMp4()
    {
        if (empty($this->clipMp4Media)) {
            return null;
        }
        $url = $this->clipMp4Media->createUrl('original-public-mp4', true);
        // Rewriting so that the temporary files-api app is used to serve the profile pictures
        return str_replace(array("api/", "internal/"), "files-api/", $url);
    }

    /**
     * Returns absolute url to the video file in webm format.
     *
     * @return string|null the url or null if video media not found.
     */
    protected function getUrlWebm()
    {
        if (empty($this->clipWebmMedia)) {
            return null;
        }
        $url = $this->clipWebmMedia->createUrl('original-public-webm', true);
        // Rewriting so that the temporary files-api app is used to serve the profile pictures
        return str_replace(array("api/", "internal/"), "files-api/", $url);
    }
}
