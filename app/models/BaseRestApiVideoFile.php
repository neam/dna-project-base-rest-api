<?php

/**
 * Video file resource.
 * @property string youtube_url
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
 */
abstract class BaseRestApiVideoFile extends VideoFile
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        // Implement only the behaviors we need instead of inheriting them to increase performance.
        return array(
            'i18n-attribute-messages' => array(
                'class' => 'I18nAttributeMessagesBehavior',
                'translationAttributes' => array(
                    'title',
                    'caption',
                    'about',
                ),
                'languageSuffixes' => LanguageHelper::getCodes(),
                'behaviorKey' => 'i18n-attribute-messages',
                'displayedMessageSourceComponent' => 'displayedMessages',
                'editedMessageSourceComponent' => 'editedMessages',
            ),
            'i18n-columns' => array(
                'class' => 'I18nColumnsBehavior',
                'translationAttributes' => array('slug'),
            ),
            'RestrictedAccessBehavior' => array(
                'class' => '\RestrictedAccessBehavior',
            ),
        );
    }

    /**
     * Returns "all" attributes for this resource.
     *
     * @return array
     */
    public function getAllAttributes()
    {
        return array(
            'node_id' => (int)$this->node_id,
            'item_type' => 'video_file',
            'url' => $this->getRouteUrl(),
            'attributes' => array(
                'title' => $this->title,
                'about' => $this->about,
                'caption' => $this->caption,
                'slug' => $this->slug,
                'url_mp4' => $this->getUrlMp4(),
                'url_webm' => $this->getUrlWebm(),
                'url_youtube' => $this->youtube_url,
                'url_subtitles' => $this->getUrlSubtitles(),
                'thumb' => array(
                    'original' => $this->getThumbUrl('original-public'),
                    '735x444' => $this->getThumbUrl('735x444'),
                    '160x96' => $this->getThumbUrl('160x96'),
                    '110x66' => $this->getThumbUrl('110x66'),
                ),
            ),
            'related' => RelatedItems::getItems($this->node_id),
        );
    }

    /**
     * @return string|null
     */
    public function getRouteUrl()
    {
        $command = Yii::app()->getDb()->createCommand()
            ->select('route')
            ->from('route')
            ->where('canonical=1 AND node_id=:nodeId');
        $route = $command->queryScalar(array(':nodeId' => (int)$this->node_id));
        return !empty($route) ? $route : null;
    }

    /**
     * Returns absolute url to the api endpoint for retrieving a video files subtitles.
     * It needs to be a separate end-point as the video player in use requires the subtitles to be loaded from a url.
     *
     * @return string
     */
    public function getUrlSubtitles()
    {
        return \barebones\Barebones::createAbsoluteUrl('/v1/videoFile/subtitles/' . $this->id, ["lang"=>Yii::app()->language]);
    }

    /**
     * Returns absolute url to the video file thumbnail.
     *
     * @param string $preset the image preset to use.
     * @return string|null the url or null if no thumbnail media found.
     */
    public function getThumbUrl($preset)
    {
        $mediaId = $this->thumbnail_media_id;
        if (!empty($mediaId)) {
            return \barebones\Barebones::createMediaUrl($mediaId, $preset);
        }
        return null;
    }

    /**
     * Returns absolute url to the video file in mp4 format.
     *
     * @return string|null the url or null if video media not found.
     */
    public function getUrlMp4()
    {
        $mediaId = $this->clip_mp4_media_id;
        if (!empty($mediaId)) {
            return \barebones\Barebones::createMediaUrl($mediaId, 'original-public-mp4');
        }
        return null;
    }

    /**
     * Returns absolute url to the video file in webm format.
     *
     * @return string|null the url or null if video media not found.
     */
    public function getUrlWebm()
    {
        $mediaId = $this->clip_webm_media_id;
        if (!empty($mediaId)) {
            return \barebones\Barebones::createMediaUrl($mediaId, 'original-public-webm');
        }
        return null;
    }
}