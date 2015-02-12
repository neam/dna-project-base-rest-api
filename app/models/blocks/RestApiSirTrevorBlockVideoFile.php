<?php

class RestApiSirTrevorBlockVideoFile extends RestApiSirTrevorBlockNode
{
    // todo: subtitles

    public $title;
    public $about;
    public $caption;
    public $slug;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            array(
                array('title, about, caption, slug', 'safe'),
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function attributeNames()
    {
        return array_merge(
            parent::attributeNames(),
            array(
                'title',
                'about',
                'caption',
                'slug',
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function getTranslatableAttributes()
    {
        return array(
            'title',
            'about',
            'caption',
            'slug',
        );
    }

    /**
     * @inheritdoc
     */
    public function getItemType()
    {
       return 'video_file';
    }

    /**
     * @inheritdoc
     */
    public function getListableAttributes(array $options = array())
    {
        /** @var RestApiVideoFile $model */
        $model = $this->loadReferredModel($this->nodeId);

        if (isset($options['mode']) && $options['mode'] === self::MODE_TRANSLATION) {
            return array(
                'title' => $model->title,
                'about' => $model->about,
                'caption' => $model->caption,
                'slug' => $model->slug,
                'subtitles' => $model->translateSubtitles($model->getParsedSubtitles()),
            );
        } else {
            return array(
                'title' => $model->title,
                'about' => $model->about,
                'caption' => $model->caption,
                'slug' => $model->slug,
                'url_mp4' => $model->getUrlMp4(),
                'url_webm' => $model->getUrlWebm(),
                'url_youtube' => $model->youtube_url,
                'url_subtitles' => $model->getUrlSubtitles(),
                'thumb' => array(
                    'original' => $model->getThumbUrl('original-public'),
                    '735x444' => $model->getThumbUrl('735x444'),
                    '160x96' => $model->getThumbUrl('160x96'),
                    '110x66' => $model->getThumbUrl('110x66'),
                ),
            );
        }
    }
}
