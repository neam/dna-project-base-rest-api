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
                'RestrictedAccessBehavior' => array(
                    'class' => '\RestrictedAccessBehavior',
                ),
                'i18n-attribute-messages' => array(
                    'class' => 'I18nAttributeMessagesBehavior',
                    'translationAttributes' => array('title'),
                    'languageSuffixes' => LanguageHelper::getCodes(),
                    'behaviorKey' => 'i18n-attribute-messages',
                    'displayedMessageSourceComponent' => 'displayedMessages',
                    'editedMessageSourceComponent' => 'editedMessages',
                ),
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function getCompositionAttributes()
    {
        return array(
            'id' => $this->id,
            'title' => $this->title,
            'url' => $this->getLinkUrl(),
        );
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
        // Rewriting so that the temporary files-api app is used to serve the profile pictures
        return str_replace(array("api/", "internal/"), "files-api/", $url);
    }
}
