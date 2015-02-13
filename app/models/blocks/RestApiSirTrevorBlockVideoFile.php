<?php

class RestApiSirTrevorBlockVideoFile extends RestApiSirTrevorBlockNode
{
    // todo: subtitles

    public $title;
    public $about;
    public $caption;
    public $slug;
    public $subtitles;

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
    public function applyData()
    {
        /** @var RestApiVideoFile $model */
        $model = $this->loadReferredModel($this->nodeId);

        $this->title = $model->_title;
        $this->about = $model->_about;
        $this->caption = $model->_caption;
        $this->slug = $model->slug_en; // todo: what is the source slug field

        $subtitles = $model->getParsedSubtitles();
        $this->subtitles = array();
        if (!empty($subtitles)) {
            foreach ($subtitles as $subtitle) {
                $this->subtitles[] = array(
                    'id' => $subtitle->id,
                    'sourceMessage' => $subtitle->sourceMessage,
                );
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function getTranslatedBlockData()
    {
        /** @var RestApiVideoFile $model */
        $model = $this->loadReferredModel($this->nodeId);

        $this->title = $model->title;
        $this->about = $model->about;
        $this->caption = $model->caption;
        $this->slug = $model->slug;

        if ($this->mode === self::MODE_TRANSLATION) {
            return array(
                'title' => array(
                    'value' => $this->title,
                    'progress' => 0,
                ),
                'about' => array(
                    'value' => $this->about,
                    'progress' => 0,
                ),
                'caption' => array(
                    'value' => $this->caption,
                    'progress' => 0,
                ),
                'slug' => array(
                    'value' => $this->slug,
                    'progress' => 0,
                ),
                'subtitles' => $this->translateSubtitles($this->subtitles),
            );
        } else {
            return $this->getModeDefaultBlockData($model);
        }
    }

    /**
     * @inheritdoc
     */
    public function getRawBlockData()
    {
        /** @var RestApiVideoFile $model */
        $model = $this->loadReferredModel($this->nodeId);

        if ($this->mode === self::MODE_TRANSLATION) {
            return array(
                'title' => array(
                    'label' => $model->getAttributeLabel('title'),
                    'value' => $this->title,
                ),
                'about' => array(
                    'label' => $model->getAttributeLabel('about'),
                    'value' => $this->about,
                ),
                'caption' => array(
                    'label' => $model->getAttributeLabel('caption'),
                    'value' => $this->caption,
                ),
                'slug' => array(
                    'label' => $model->getAttributeLabel('slug'),
                    'value' => $this->slug,
                ),
                'subtitles' => $this->subtitles,
            );
        } else {
            return $this->getModeDefaultBlockData($model);
        }
    }

    protected function getModeDefaultBlockData(RestApiVideoFile $model)
    {
        return array(
            'title' => $this->title,
            'about' => $this->about,
            'caption' => $this->caption,
            'slug' => $this->slug,
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

    /**
     * @inheritdoc
     */
    public function translate(array $block)
    {
        /** @var RestApiVideoFile $model */
        $model = $this->loadReferredModel($this->nodeId);

        if (!isset($block['data'], $block['data']['attributes']) || empty($block['data']['attributes'])) {
            throw new \CException('Invalid block data. Missing or invalid properties.');
        }

        $attributes = $this->getTranslatableAttributes();
        if (!empty($attributes)) {
            foreach ($block['data']['attributes'] as $attr => $value) {
                if (!in_array($attr, $attributes)) {
                    continue;
                }
                /*
                 * Translatable attributes have a value structured like:
                 * array( "value" => "the translated text" )
                 *
                 * While the `subtitles` attribute as a value structured like:
                 * array( array( "message" => "the translated text" ... ) ... )
                 */
                if (is_array($value)) {
                    if ($attr === 'subtitles' && is_array($value)) {
                        // sir trevor composition blocks are translated via their block models.
                        foreach ($value as $subtitle) {
                            // todo: save $subtitle['message']
                        }
                    } elseif (isset($value['value'], $model->{$attr}) && is_string($value['value'])) {
                        // regular model attributes are translated via the `I18nAttributeMessagesBehavior` behavior.
                        $model->{$attr} = $value['value'];
                    }
                }
            }
            if (!$model->save()) {
                throw new \CException('Failed to save video file translation. Errors: ' . print_r($model->errors, true));
            }
        }
    }

    /**
     * @param array|null $subtitles
     * @return mixed
     */
    protected function translateSubtitles($subtitles)
    {
        $translated = array();
        if (!empty($subtitles)) {
            /** @var RestApiVideoFile $model */
            $model = $this->loadReferredModel($this->nodeId);
            foreach ($subtitles as $subtitle) {
                $translated[] = array(
                    'id' => $subtitle['id'],
                    'message' => Yii::t("video-{$model->id}-subtitles", $subtitle['sourceMessage'], array(), 'displayedMessages', Yii::app()->language),
                );
            }
        }
        return $translated;
    }

//    /**
//     * @inheritdoc
//     */
//    public function applyTranslations(array &$block)
//    {
////        $countTranslated = 0;
//
//        $model = $this->loadReferredModel($this->nodeId);
//
//        foreach ($this->getTranslatableAttributes() as $attr) {
//            if (isset($this->{$attr}, $model->{"_{$attr}"}, $block['data']['attributes'][$attr])) {
//                /*
//                 * Blocks with node references are already translated during populate.
//                 * @see SirTrevorBehavior::recPopulateSirTrevorBlock
//                 */
//                $source = $model->{"_{$attr}"};
//                $translation = $block['data']['attributes'][$attr];
//                if ($translation !== $source) {
//                    $this->{$attr} = $translation;
////                    $countTranslated++;
//                }
//            }
//        }
//
//
////        return $countTranslated;
//    }
}
