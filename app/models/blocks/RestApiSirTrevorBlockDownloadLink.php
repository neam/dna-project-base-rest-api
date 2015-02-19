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
        if ($model !== null) {
            $this->title = $model->_title;
        }
    }

    /**
     * @inheritdoc
     */
    public function getTranslatedBlockData()
    {
        /** @var RestApiDownloadLink $model */
        $model = $this->loadReferredModel($this->nodeId);
        if ($model === null) {
            return array();
        }

        $this->title = $model->title;
        return array(
            'title' => $this->title,
            'url' => $model->getLinkUrl(),
        );
    }

    /**
     * @inheritdoc
     */
    public function getRawBlockData()
    {
        /** @var RestApiDownloadLink $model */
        $model = $this->loadReferredModel($this->nodeId);
        if ($model === null) {
            return array();
        }

        return array(
            'title' => $this->title,
            'url' => $model->getLinkUrl(),
        );
    }
}
