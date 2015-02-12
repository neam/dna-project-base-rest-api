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
    public function getListableAttributes(array $options = array())
    {
        /** @var RestApiHtmlChunk $model */
        $model = $this->loadReferredModel($this->nodeId);

        return array(
            'markup' => $model->markup,
        );
    }
}
