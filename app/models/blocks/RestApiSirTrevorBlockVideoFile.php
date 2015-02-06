<?php

class RestApiSirTrevorBlockVideoFile extends RestApiSirTrevorBlockNode
{
    // todo: subtitles

    public $title;
    public $about;
    public $caption;
    public $slug;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            array(
                array('title, about, caption, slug', 'safe'),
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
                'about',
                'caption',
                'slug',
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
            'about',
            'caption',
            'slug',
        );
    }
}
