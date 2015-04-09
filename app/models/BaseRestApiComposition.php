<?php

/**
 * Composite item resource model.
 *
 * @property int $node_id
 * @property string $composition
 * @property string $composition_type_id
 * @property string $thumb_media_id
 * @property string $_heading
 * @property string $_subheading
 * @property string $_about
 * @property string $_caption
 * @property string $source_language
 *
 * Properties made available through the I18nAttributeMessagesBehavior class:
 * @property string $heading
 * @property string $subheading
 * @property string $about
 * @property string $caption
 *
 * Properties made available through the I18nColumnsBehavior class:
 * @property string $slug
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 */
abstract class BaseRestApiComposition extends Composition implements RelatedResource
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
                    'heading',
                    'subheading',
                    'caption',
                    'about',
                ),
                'languageSuffixes' => LanguageHelper::getCodes(),
                'behaviorKey' => 'i18n-attribute-messages',
                'displayedMessageSourceComponent' => 'displayedMessages',
                'editedMessageSourceComponent' => 'editedMessages',
            ),
            'i18n-columns' => array(
                'class' => 'I18nColumnsBehavior',
                'translationAttributes' => array(
                    'slug',
                ),
                'multilingualRelations' => array(),
            ),
            'RestrictedAccessBehavior' => array(
                'class' => '\RestrictedAccessBehavior',
            ),
        );
    }

    /**
     * @inheritdoc
     */
    public function getRelatedAttributes()
    {
        return array(
            'node_id' => (int)$this->node_id,
            'item_type' => 'go_item',
            'url' => $this->getRouteUrl(),
            'attributes' => $this->getListableAttributes(),
        );
    }

    /**
     * Returns att "listable" attributes.
     * Listable attributes are ones that appear inside an "attributes" section for a "go_item" in any response.
     *
     * @return array
     */
    abstract public function getListableAttributes();

    /**
     * @return string|null
     */
    public function getCompositionTypeReference()
    {
        $command = \barebones\Barebones::fpdo()
            ->from('composition_type')
            ->where('id=:compositionTypeId', array(':compositionTypeId' => (int)$this->composition_type_id));
        $result = $command->fetch();
        return !empty($result) ? $result['ref'] : null;
    }

    /**
     * Returns the items `route`.
     *
     * The route is always the `canonical` route in the item's source language, regardless of what language the item
     * was requested in.
     *
     * @return string|null
     */
    public function getRouteUrl()
    {
        $command = \barebones\Barebones::fpdo()
            ->from('route')
            ->where(
                'canonical=1 AND node_id=:nodeId',
                array(':nodeId' => (int)$this->node_id)
            );
        $result = $command->fetch();

        return !empty($result) ? $result['route'] : null;
    }

    /**
     * Returns absolute url for the thumbnail image.
     *
     * @param string $preset the image preset to use.
     * @return string|null the url or null if not found.
     */
    public function getThumbUrl($preset = 'original-public')
    {
        $mediaId = $this->thumb_media_id;
        if (!empty($mediaId)) {
            return \barebones\Barebones::createMediaUrl($this->thumb_media_id, $preset);
        }
        return null;
    }

    /**
     * Gets the group data to include in the response.
     *
     * Format:
     *
     * array(
     *     'GapminderOrg',
     *     'Translators',
     *     ...
     * )
     *
     * @return array the data.
     */
    protected function getGroupData()
    {
        $groups = array();
        $command = \barebones\Barebones::fpdo()
            ->from('`group`')
            ->leftJoin('`node_has_group` ON `node_has_group`.`group_id`=`group`.`id`')
            ->where('`node_has_group`.`node_id`=:nodeId', array(':nodeId' => (int) $this->node_id));
        foreach ($command->fetchAll() as $row) {
            $groups[] = $row['title'];
        }
        return array_unique($groups);
    }
}
