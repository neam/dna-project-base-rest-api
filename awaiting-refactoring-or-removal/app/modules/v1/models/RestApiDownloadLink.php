<?php

/**
 * Download link item resource.
 */
class RestApiDownloadLink extends BaseRestApiDownloadLink implements SirTrevorBlockNode
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
        return 'download_link';
    }

    /**
     * @inheritdoc
     */
    public function getCompositionAttributes()
    {
        return array(
            'title' => $this->title,
            'url' => $this->getLinkUrl(),
        );
    }
}
