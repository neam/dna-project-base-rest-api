<?php

class RestApiSirTrevorBlockHtmlChunk extends RestApiSirTrevorBlockNode
{
    /**
     * @var string the displayable markup for the block.
     */
    public $markup;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            array(
                array('markup', 'safe'),
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
                'markup',
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function getTranslatableAttributes()
    {
        return array(
            'markup',
        );
    }

    /**
     * @inheritdoc
     */
    public function getItemType()
    {
        return 'html_chunk';
    }

    /**
     * @inheritdoc
     */
    public function applyData()
    {
        /** @var RestApiHtmlChunk $model */
        $model = $this->loadReferredModel($this->nodeId);
        if (is_null($model)) {
            return;
        }

        $this->markup = $model->_markup;
    }

    /**
     * @inheritdoc
     */
    protected function getBlockData()
    {
        /** @var RestApiHtmlChunk $model */
        $model = $this->loadReferredModel($this->nodeId);
        if (is_null($model)) {
            return array();
        }

        return array(
            'markup' => $this->markup,
        );
    }

    /**
     * @inheritdoc
     */
    protected function applyTranslations()
    {
        /** @var RestApiHtmlChunk $model */
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
