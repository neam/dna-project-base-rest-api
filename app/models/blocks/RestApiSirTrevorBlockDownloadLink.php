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
    public function getListableAttributes(array $options = array())
    {
        /** @var RestApiDownloadLink $model */
        $model = $this->loadReferredModel($this->nodeId);

        return array(
            'title' => $model->title,
            'url' => $model->getLinkUrl(),
        );
    }
}
