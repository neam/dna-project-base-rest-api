<?php

/**
 * Download link item resource.
 *
 * Properties made available through the I18nAttributeMessagesBehavior class:
 * @property string $title
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 */
class RestApiDownloadLink extends DownloadLink implements SirTrevorBlock
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
    public function getCompositionAttributes()
    {
        return $this->getListableAttributes();
    }

    /**
     * Returns att "listable" attributes.
     * Listable attributes are ones that appear inside an "attributes" section for a "download_link" in any response.
     *
     * @return array
     */
    public function getListableAttributes()
    {
        return array(
            'title' => $this->title,
            'url' => $this->getLinkUrl(),
        );
    }

    /**
     * @inheritdoc
     */
    public function getCompositionItemType()
    {
        return 'download_link';
    }

    /**
     * Returns the absolute download link url.
     *
     * @return string|null the url or null if not found.
     */
    protected function getLinkUrl()
    {
        if (!empty($this->file_media_id)) {
            return \barebones\Barebones::createMediaUrl($this->file_media_id, 'original');
        }
        return null;
    }
}
