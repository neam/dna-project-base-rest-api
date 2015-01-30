<?php

class RestApiSirTrevorBlockHtmlChunk extends RestApiSirTrevorBlock
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
                array('markup', 'required'),
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
}
