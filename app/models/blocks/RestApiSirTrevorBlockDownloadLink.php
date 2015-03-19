<?php

class RestApiSirTrevorBlockDownloadLink extends RestApiSirTrevorBlockNode
{
    /**
     * @var string the displayable title for the block.
     */
    public $title;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            array(
                array('title', 'required'),
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
        );
    }

    /**
     * @inheritdoc
     */
    public function getItemType()
    {
        return 'download_link';
    }

    /**
     * @inheritdoc
     */
    public function applyData()
    {
        /** @var RestApiDownloadLink $model */
        $model = $this->loadReferredModel($this->nodeId);
        if (is_null($model)) {
            return;
        }

        $this->title = $model->_title;
    }

    /**
     * @inheritdoc
     */
    protected function getBlockData()
    {
        /** @var RestApiDownloadLink $model */
        $model = $this->loadReferredModel($this->nodeId);
        if (is_null($model)) {
            return array();
        }

        return array(
            'title' => $this->title,
            'url' => $model->getLinkUrl(),
        );
    }

    /**
     * @inheritdoc
     */
    protected function applyTranslations()
    {
        /** @var RestApiDownloadLink $model */
        $model = $this->loadReferredModel($this->nodeId);
        if (is_null($model)) {
            return;
        }

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
