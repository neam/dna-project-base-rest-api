<?php

/**
 * Slide show file item resource.
 */
class RestApiSlideshowFile extends BaseRestApiSlideshowFile implements SirTrevorBlockNode
{
    /**
     * @inheritdoc
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @inheritdoc
     */
    public function getCompositionItemType()
    {
        return 'slideshow_file';
    }

    /**
     * @inheritdoc
     */
    public function getCompositionAttributes()
    {
        return array(
            'google_docs_id' => $this->google_docs_id,
            'slideshare_id' => $this->slideshare_id,
        );
    }
}
