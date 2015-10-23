<?php

class RestApiSirTrevorBlockSlideshowFile extends RestApiSirTrevorBlockNode
{
    /**
     * @var string the google docs id for the slideshow file.
     */
    public $google_docs_id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            array(
                array('google_docs_id', 'required'),
                // todo: can we validate the google docs id format?
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
                'google_docs_id',
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function getTranslatableAttributes()
    {
        return array(
            'google_docs_id'
        );
    }

    /**
     * @inheritdoc
     */
    public function getItemType()
    {
        return 'slideshow_file';
    }

    /**
     * @inheritdoc
     */
    public function applyData()
    {
        /** @var RestApiSlideshowFile $model */
        $model = $this->loadReferredModel($this->nodeId);
        if (is_null($model)) {
            return;
        }

        $this->google_docs_id = $model->_google_docs_id;
    }

    /**
     * @inheritdoc
     */
    protected function applyTranslations()
    {
        /** @var RestApiSlideshowFile $model */
        $model = $this->loadReferredModel($this->nodeId);
        if (!is_null($model)) {
            foreach ($this->getTranslatableAttributes() as $attr) {
                if (isset($this->{$attr}, $model->{$attr})) {
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
        /** @var RestApiSlideshowFile $model */
        $model = $this->loadReferredModel($this->nodeId);
        if (is_null($model)) {
            return array();
        }

        if ($this->mode === self::MODE_TRANSLATION) {
            return array(
                'google_docs_id' => $this->google_docs_id,
            );
        } else {
            return array(
                'google_docs_id' => $this->google_docs_id,
                'slideshare_id' => $model->slideshare_id,
            );
        }
    }
}
