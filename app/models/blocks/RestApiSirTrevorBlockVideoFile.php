<?php

class RestApiSirTrevorBlockVideoFile extends RestApiSirTrevorBlockNode
{
    /**
     * @var string the video file title.
     */
    public $title;

    /**
     * @var string the video file about text.
     */
    public $about;

    /**
     * @var string the video file caption.
     */
    public $caption;

    /**
     * @var string the video fle slug.
     */
    public $slug;

    /**
     * @var array the video file subtitles.
     */
    public $subtitles = array();

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            array(
                array('title, about, caption, slug, subtitles', 'safe'),
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
                'subtitles',
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
            'subtitles',
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
        if (is_null($model)) {
            return array();
        }

        $this->title = $model->_title;
        $this->about = $model->_about;
        $this->caption = $model->_caption;
        $this->slug = $model->{"slug_".Yii::app()->sourceLanguage};

        $subtitles = $model->getParsedSubtitles();
        $this->subtitles = array();
        if (!empty($subtitles)) {
            foreach ($subtitles as $subtitle) {
                $this->subtitles[] = array(
                    'id' => (int)$subtitle->id,
                    'sourceMessage' => $subtitle->sourceMessage,
                );
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function translate(array $block)
    {
        /** @var RestApiVideoFile $model */
        $model = $this->loadReferredModel($this->nodeId);
        if (is_null($model)) {
            return;
        }

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
                 * "the translated text"
                 *
                 * While the `subtitles` attribute as a value structured like:
                 * array( array( "message" => "the translated text" ... ) ... )
                 */
                if ($attr === 'subtitles' && is_array($value)) {
                    $this->translateSubtitles($value);
                } elseif (isset($model->{$attr}) && is_string($value)) {
                    // regular model attributes are translated via the `I18nAttributeMessagesBehavior` behavior.
                    $model->{$attr} = $value;
                }
            }
            if (!$model->save()) {
                throw new \CException(
                    'Failed to save video file translation. Errors: ' . print_r($model->errors, true)
                );
            }
        }
    }

    /**
     * Returns the progress of translation for this block.
     *
     * @return int the progress percent as an integer.
     */
    public function getTranslationProgress()
    {
        $attributes = $this->getTranslatableAttributes();
        $countAttributes = count($attributes) - 1 /* subtitles attribute */ + count($this->subtitles);
        $countTranslated = $this->countTranslated;
        if ($countTranslated > 0) {
            return (int)round(($countTranslated / $countAttributes) * 100);
        }
        return 0;
    }

    /**
     * @inheritdoc
     */
    protected function applyTranslations()
    {
        /** @var RestApiVideoFile $model */
        $model = $this->loadReferredModel($this->nodeId);
        if ($model !== null) {
            foreach ($this->getTranslatableAttributes() as $attr) {
                if ($attr === 'subtitles') {
                    $this->subtitles = $this->getParsedTranslatedSubtitles();
                } else if (isset($this->{$attr}, $model->{$attr})) {
                    if ($model->{$attr} !== $this->{$attr}) {
                        $this->{$attr} = $model->{$attr};
                        $this->countTranslated++;
                    }
                }
            }
        }
    }

    /**
     * @inheritdoc
     */
    protected function getBlockData()
    {
        /** @var RestApiVideoFile $model */
        $model = $this->loadReferredModel($this->nodeId);
        if ($model === null) {
            return array();
        }

        if ($this->mode === self::MODE_TRANSLATION) {
            return array(
                'title' => $this->title,
                'about' => $this->about,
                'caption' => $this->caption,
                'slug' => $this->slug,
                'subtitles' => $this->subtitles,
            );
        } else {
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
    }

    /**
     * Saves the subtitle translations to the db.
     *
     * Expected format of $translations:
     *
     * array(
     *     array( "id" => 1, "message" => "the translated subtitle" ),
     *     ...
     * )
     *
     * @param array $translations the subtitle translations to save.
     * @throws CException if the translations cannot be saved.
     */
    protected function translateSubtitles(array $translations)
    {
        if (empty($translations)) {
            return;
        }

        // Parse the original subtitles.
        /** @var RestApiVideoFile $model */
        $model = $this->loadReferredModel($this->nodeId);
        $subtitles = $model->getParsedSubtitles();
        if (empty($subtitles)) {
            return;
        }

        // Create a map of source => translation based on the subtitle id.
        $translationMap = array();
        foreach ($subtitles as $subtitle) {
            foreach ($translations as $translation) {
                if (isset($translation['id'], $translation['message'])
                    && (int)$translation['id'] === (int)$subtitle->id
                ) {
                    $translationMap[$subtitle->sourceMessage] = $translation['message'];
                    break;
                }
            }
        }
        if (empty($translationMap)) {
            return;
        }

        // Create or update the translation models.
        foreach ($translationMap as $sourceMessage => $message) {
            $sourceMessageModel = \SourceMessage::ensureSourceMessage(
                $model->getTranslationCategory('subtitles'),
                $sourceMessage,
                Yii::app()->sourceLanguage
            );
            $messageModel = \Message::model()
                ->findByAttributes(array('id' => $sourceMessageModel->id, 'language' => Yii::app()->language));

            $dirty = false;
            if ($messageModel === null) {
                if ($sourceMessage !== $message) {
                    $messageModel = new Message();
                    $messageModel->id = $sourceMessageModel->id;
                    $messageModel->language = Yii::app()->language;
                    $messageModel->translation = $message;
                    $dirty = true;
                }
            } else if ($messageModel->translation !== $message) {
                $messageModel->translation = $message;
                $dirty = true;
            }

            if ($dirty && !$messageModel->save()) {
                throw new \CException(
                    'Failed to save block translation. Errors: ' . print_r($messageModel->errors, true)
                );
            }
        }
    }

    /**
     * Returns the translated parsed subtitles.
     *
     * Format:
     *
     * array(
     *     array( "id" => 1, "message" => "the translated subtitle" ),
     *     ...
     * )
     *
     * @return array the translated subtitles.
     */
    protected function getParsedTranslatedSubtitles()
    {
        $translated = array();

        /** @var RestApiVideoFile $model */
        $model = $this->loadReferredModel($this->nodeId);
        foreach ($this->subtitles as $subtitle) {
            $message = Yii::t(
                $model->getTranslationCategory('subtitles'),
                $subtitle['sourceMessage'],
                array(),
                'displayedMessages',
                Yii::app()->language
            );
            if ($message !== $subtitle['sourceMessage']) {
                $this->countTranslated++;
            }
            $translated[] = array(
                'id' => (int)$subtitle['id'],
                'message' => $message,
            );
        }

        return $translated;
    }
}
