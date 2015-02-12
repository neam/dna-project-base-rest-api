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
class RestApiVideoFile extends VideoFile
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
            'related' => $this->getRelatedItems(),
        );
    }

    /**
     * @return string|null
     */
    public function getRouteUrl()
    {
        if (empty($this->node_id)) {
            return null;
        }

        $route = Route::model()->findByAttributes(array(
            'node_id' => (int)$this->node_id,
            'canonical' => true,
            'translation_route_language' => Yii::app()->language,
        ));

        return ($route !== null) ? $route->route : null;
    }

    /**
     * @param array|null $subtitles
     * @return mixed
     */
    public function translateSubtitles($subtitles)
    {
        if (!empty($subtitles) && Yii::app()->language !== Yii::app()->sourceLanguage) {
            foreach ($subtitles as $subtitle) {
                $subtitle->message = Yii::t("video-{$this->id}-subtitles", $subtitle->sourceMessage, array(), 'displayedMessages', Yii::app()->language);
                unset($subtitle->sourceMessage);
            }
        }
        return $subtitles;
    }

    /**
     * Returns absolute url to the api endpoint for retrieving a video files subtitles.
     * It needs to be a separate end-point as the video player in use requires the subtitles to be loaded from a url.
     *
     * @return string
     */
    public function getUrlSubtitles()
    {
        return Yii::app()->createAbsoluteUrl('/v1/videoFile/subtitles/' . $this->id);
    }

    /**
     * Returns absolute url to the video file thumbnail.
     *
     * @param string $preset the image preset to use.
     * @return string|null the url or null if no thumbnail media found.
     */
    public function getThumbUrl($preset)
    {
        if (empty($this->thumbnailMedia)) {
            return null;
        }
        $url = $this->thumbnailMedia->createUrl($preset, true);
        // Rewriting so that the temporary files-api app is used to serve the url.
        return str_replace(array("api/", "internal/"), "files-api/", $url);
    }

    /**
     * Returns absolute url to the video file in mp4 format.
     *
     * @return string|null the url or null if video media not found.
     */
    public function getUrlMp4()
    {
        if (empty($this->clipMp4Media)) {
            return null;
        }
        $url = $this->clipMp4Media->createUrl('original-public-mp4', true);
        // Rewriting so that the temporary files-api app is used to serve the url.
        return str_replace(array("api/", "internal/"), "files-api/", $url);
    }

    /**
     * Returns absolute url to the video file in webm format.
     *
     * @return string|null the url or null if video media not found.
     */
    public function getUrlWebm()
    {
        if (empty($this->clipWebmMedia)) {
            return null;
        }
        $url = $this->clipWebmMedia->createUrl('original-public-webm', true);
        // Rewriting so that the temporary files-api app is used to serve the url.
        return str_replace(array("api/", "internal/"), "files-api/", $url);
    }
}
