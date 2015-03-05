<?php

/**
 * Download link item resource.
 *
 * Properties made available through the I18nAttributeMessagesBehavior class:
 * @property string $title
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 *
 * Methods made available through the WRestModelBehavior class:
 * @method array getAllAttributes
 * @method array getCreateAttributes
 * @method array getUpdateAttributes
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
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array(
                'rest-model-behavior' => array(
                    'class' => 'WRestModelBehavior',
                ),
            )
        );
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
        if (empty($this->fileMedia)) {
            return null;
        }
        $url = $this->fileMedia->createUrl('original', true);
        // Rewriting so that the temporary files-api app is used to serve the url.
        return str_replace(array("api/", "internal/"), "files-api/", $url);
    }
}
