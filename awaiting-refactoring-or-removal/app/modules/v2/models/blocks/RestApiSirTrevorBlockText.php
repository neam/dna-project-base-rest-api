<?php

class RestApiSirTrevorBlockText extends RestApiSirTrevorBlock
{
    /**
     * @var string the displayable text for the block.
     */
    public $text;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            array(
                array('text', 'required'),
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
                'text'
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function getTranslatableAttributes()
    {
        return array('text');
    }
}
