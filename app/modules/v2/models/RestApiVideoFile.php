<?php

/**
 * Video file resource.
 */
class RestApiVideoFile extends BaseRestApiVideoFile
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
                    '130x77' => $this->getThumbUrl('130x77'),
                    '180x108' => $this->getThumbUrl('180x108'),
                    '735x444-retina' => $this->getThumbUrl('735x444-retina'),
                    '160x96-retina' => $this->getThumbUrl('160x96-retina'),
                    '110x66-retina' => $this->getThumbUrl('110x66-retina'),
                    '130x77-retina' => $this->getThumbUrl('130x77-retina'),
                    '180x108-retina' => $this->getThumbUrl('180x108-retina'),
                ),
            ),
            'related' => RelatedItems::getItems($this->node_id),
        );
    }
}
