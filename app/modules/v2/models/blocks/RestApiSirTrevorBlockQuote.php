<?php

class RestApiSirTrevorBlockQuote extends RestApiSirTrevorBlockText
{
    /**
     * @var string the displayable cite for the quote.
     */
    public $cite;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            array(
                array('cite', 'required'),
                array('cite', 'length', 'max' => 255),
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
                'cite'
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function getTranslatableAttributes()
    {
        return array_merge(
            parent::getTranslatableAttributes(),
            array(
                'cite'
            )
        );
    }
}
