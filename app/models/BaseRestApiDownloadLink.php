<?php

/**
 * Download link item resource.
 * @property string $_title
 *
 * Properties made available through the I18nAttributeMessagesBehavior class:
 * @property string $title
 * @property string $slug
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 */
abstract class BaseRestApiDownloadLink extends DownloadLink
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        // Implement only the behaviors we need instead of inheriting them to increase performance.
        return array(
            'i18n-attribute-messages' => array(
                'class' => 'I18nAttributeMessagesBehavior',
                'translationAttributes' => array(
                    'title',
                    'slug',
                ),
                'languageSuffixes' => LanguageHelper::getCodes(),
                'behaviorKey' => 'i18n-attribute-messages',
                'displayedMessageSourceComponent' => 'displayedMessages',
                'editedMessageSourceComponent' => 'editedMessages',
            ),
            'RestrictedAccessBehavior' => array(
                'class' => '\RestrictedAccessBehavior',
            ),
        );
    }

    /**
     * Returns the absolute download link url.
     *
     * @return string|null the url or null if not found.
     */
    public function getLinkUrl()
    {
        $mediaId = $this->file_media_id;
        if (!empty($mediaId)) {
            return \barebones\Barebones::createMediaUrl($mediaId, 'original');
        }
        return null;
    }
}
