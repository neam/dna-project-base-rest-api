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
                'i18n-columns' => array(
                    'class' => 'I18nColumnsBehavior',
                    'translationAttributes' => array('slug'),
                ),
            )
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
            'attributes' => $this->getListableAttributes(),
            'related' => RelatedItems::getItems($this->node_id),
        );
    }

    /**
     * @inheritdoc
     */
    public function getCompositionAttributes()
    {
        return $this->getListableAttributes();
    }

    /**
     * Returns att "listable" attributes.
     * Listable attributes are ones that appear inside an "attributes" section for a "video_file" in any response.
     *
     * @return array
     */
    public function getListableAttributes()
    {
        return array(
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
        );
    }

    /**
     * @inheritdoc
     */
    public function getCompositionItemType()
    {
        return 'video_file';
    }

    /**
     * @return string|null
     */
    public function getRouteUrl()
    {
        // todo: enable multi lingual support once ready.
        $command = Yii::app()->getDb()->createCommand()
            ->select('route')
            ->from('route')
            ->where('canonical=1 AND node_id=:nodeId'/*translation_route_language=:lang*/);
        $route = $command->queryScalar(array(':nodeId' => (int)$this->node_id/*, ':lang' => Yii::app()->language*/));
        return !empty($route) ? $route : null;
    }

    /**
     * Returns absolute url to the api endpoint for retrieving a video files subtitles.
     * It needs to be a separate end-point as the video player in use requires the subtitles to be loaded from a url.
     *
     * @return string
     */
    protected function getUrlSubtitles()
    {
        return \barebones\Barebones::createAbsoluteUrl('/v1/videoFile/subtitles/' . $this->id, ["lang"=>Yii::app()->language]);
    }

    /**
     * Returns absolute url to the video file thumbnail.
     *
     * @param string $preset the image preset to use.
     * @return string|null the url or null if no thumbnail media found.
     */
    protected function getThumbUrl($preset)
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
    protected function getUrlMp4()
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
    protected function getUrlWebm()
    {
        $mediaId = $this->clip_webm_media_id;
        if (!empty($mediaId)) {
            return \barebones\Barebones::createMediaUrl($mediaId, 'original-public-webm');
        }
        return null;
    }
}
