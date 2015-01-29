<?php

class RestApiSirTrevorBlockLinkedImage extends RestApiSirTrevorBlock
{
    /**
     * @var string the displayable title for the block.
     */
    public $title;

    /**
     * @var string the url to the linked resource.
     */
    public $link_url;

    /**
     * @var string the url to the displayable image file.
     */
    public $file_url;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            array(
                array('title', 'required'),
                array('link_url, file_url', 'url'),
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
                'link_url',
                'file_url',
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
            'link_url',
            'file_url',
        );
    }
} 