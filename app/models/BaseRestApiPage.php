<?php

/**
 * Page resource model.
 *
 * Attributes:
 * @property string $heading
 * @property string $subheading
 * @property string $caption
 * @property string $about
 * @property string $menu_label
 * @property string $nav_tree_to_use
 * @property string $composition
 * @property int $node_id
 * @property int $composition_type_id
 * @property int $icon_media_id
 * @property string $source_language
 *
 * Relations:
 * @property RestApiPage[] $restApiCustomPageChildren
 * @property RestApiPage $restApiCustomPageParent
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 */
abstract class BaseRestApiPage extends Page
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
                    'menu_label',
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
    public function relations()
    {
        return array_merge(
            parent::relations(),
            array(
                'restApiCustomPageChildren' => array(self::HAS_MANY, 'RestApiPage', 'parent_page_id'),
                'restApiCustomPageParent' => array(self::BELONGS_TO, 'RestApiPage', 'parent_page_id'),
            )
        );
    }

    /**
     * @return array
     */
    public function getRootPageHierarchy()
    {
        $hierarchy = array();
        $rootPage = $this->loadRootPage($this);
        if ($rootPage !== null) {
            $hierarchy = $rootPage->getHierarchyAttributes();
            $rootPage->setChildren($rootPage, $hierarchy);
        }
        return $hierarchy;
    }

    /**
     * Returns att "listable" attributes.
     * Listable attributes are ones that appear inside an "attributes" section for a "custom_page" in any response.
     *
     * @return array
     */
    public function getListableAttributes()
    {
        return array(
            'composition_type' => $this->getCompositionTypeReference(),
            'icon_url' => $this->getIconUrl(),
            'heading' => $this->heading,
            'subheading' => $this->subheading,
            'about' => $this->about,
            'caption' => $this->caption,
            'composition' => SirTrevorParser::populateSirTrevorBlocks($this->composition, array('localize' => true, 'parent' => $this)),
        );
    }

    /**
     * The attributes that are returned by the REST api when this resource acts as an hierarchy item.
     *
     * @return array
     */
    public function getHierarchyAttributes()
    {
        return array(
            'node_id' => (int)$this->node_id,
            'item_type' => 'custom_page',
            'menu_label' => $this->menu_label,
            'url' => $this->getRouteUrl(),
            'children' => array(),
        );
    }

    /**
     * Returns the pages composition reference key.
     *
     * @return string|null the ref or null if not found.
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
     * @param RestApiPage $page
     * @return RestApiPage
     */
    public function loadRootPage($page)
    {
        $parent = $page->restApiCustomPageParent;
        if (empty($parent)) {
            return $page;
        }
        return $this->loadRootPage($page->restApiCustomPageParent);
    }

    /**
     * @param RestApiPage $page
     * @param array $hierarchy
     */
    public function setChildren($page, &$hierarchy)
    {
        $children = $page->restApiCustomPageChildren;
        if (!empty($children)) {
            foreach ($children as $child) {
                $childHierarchy = $child->getHierarchyAttributes();
                $child->setChildren($child, $childHierarchy);
                $hierarchy['children'][] = $childHierarchy;
            }
        }
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
            ->select('`title`')
            ->leftJoin('`node_has_group` ON `node_has_group`.`group_id`=`group`.`id`')
            ->where('`node_has_group`.`node_id`=:nodeId', array(':nodeId' => (int) $this->node_id));
        foreach ($command->fetchAll() as $row) {
            $groups[] = $row['title'];
        }
        return array_unique($groups);
    }

    /**
     * Returns the page icon url.
     *
     * @return null|string the url.
     */
    public function getIconUrl()
    {
        $mediaId = $this->icon_media_id;
        if (!empty($mediaId)) {
            return \barebones\Barebones::createMediaUrl($mediaId, 'icon-80');
        }
        return null;
    }
}
