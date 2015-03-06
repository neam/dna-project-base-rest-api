<?php

/**
 * Slide show file item resource.
 *
 * Properties made available through the I18nAttributeMessagesBehavior class:
 * @property string $title
 * @property string $about
 * @property string $google_docs_id
 * @property string $slideshare_id
 */
class RestApiSlideshowFile extends SlideshowFile implements SirTrevorBlock
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
        // Implement only the behaviors we need instead of inheriting them to increase performance.
        return array(
            'i18n-attribute-messages' => array(
                'class' => 'I18nAttributeMessagesBehavior',
                'translationAttributes' => array(
                    'slideshare_id',
                    'google_docs_id',
                    'processedFile',
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
     * @inheritdoc
     */
    public function getCompositionAttributes()
    {
        return array(
            'google_docs_id' => $this->google_docs_id,
            'slideshare_id' => $this->slideshare_id,
        );
    }

    /**
     * @inheritdoc
     */
    public function getCompositionItemType()
    {
        return 'slideshow_file';
    }
}
