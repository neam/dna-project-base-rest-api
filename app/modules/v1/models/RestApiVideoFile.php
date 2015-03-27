<?php

/**
 * Video file resource.
 */
class RestApiVideoFile extends BaseRestApiVideoFile implements SirTrevorBlockNode
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
    public function getCompositionItemType()
    {
        return 'video_file';
    }

    /**
     * @inheritdoc
     */
    public function getCompositionAttributes()
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
}
