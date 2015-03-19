<?php

/**
 * Custom page resource model.
 * @property string $heading
 * @property string $subheading
 * @property string $caption
 * @property string $about
 * @property string $menu_label
 *
 * @property RestApiCustomPage[] $restApiCustomPageChildren
 * @property RestApiCustomPage $restApiCustomPageParent
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 */
class RestApiCustomPage extends Page implements TranslatableResource
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
                'restApiCustomPageChildren' => array(self::HAS_MANY, 'RestApiCustomPage', 'parent_page_id'),
                'restApiCustomPageParent' => array(self::BELONGS_TO, 'RestApiCustomPage', 'parent_page_id'),
            )
        );
    }

    /**
     * The attributes that is returned by the REST api.
     *
     * @return array the response.
     */
    public function getAllAttributes()
    {
        return array(
            'node_id' => (int)$this->node_id,
            'item_type' => 'custom_page',
            'url' => $this->getRouteUrl(),
            'nav_tree_to_use' => !empty($this->nav_tree_to_use) ? $this->nav_tree_to_use : 'home',
            'attributes' => $this->getListableAttributes(),
            'root_page' => $this->getRootPageHierarchy(),
            'contributors' => ContributorItems::getItems($this->node_id),
            'related' => RelatedItems::getItems($this->node_id),
            'groups' => $this->getGroupData(),
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
            'composition_type' => ($this->compositionType !== null) ? $this->compositionType->ref : null,
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
     * @inheritdoc
     */
    public function getTranslationAttributes()
    {
        return array(
            'heading',
            'subheading',
            'about',
            'caption',
            'composition',
        );
    }

    /**
     * @inheritdoc
     */
    public function getTranslatedAttributes()
    {
        return array(
            'node_id' => (int)$this->node_id,
            'item_type' => 'custom_page',
            'url' =>  $this->getRouteUrl(),
            'attributes' => array(
                'heading' => $this->_heading,
                'subheading' => $this->_subheading,
                'about' => $this->_about,
                'caption' => $this->_caption,
                'composition' => SirTrevorParser::populateSirTrevorBlocks(
                    $this->composition,
                    array(
                        'localize' => false,
                        'mode' => RestApiSirTrevorBlockNode::MODE_TRANSLATION,
                        'parent' => $this
                    )
                ),
            ),
            'translations' => array(
                'heading' => $this->heading,
                'subheading' => $this->subheading,
                'about' => $this->about,
                'caption' => $this->caption,
                // We need to populate the blocks again, with localizations this time.
                'composition' => SirTrevorParser::populateSirTrevorBlocks(
                    $this->composition,
                    array(
                        'localize' => true,
                        'mode' => RestApiSirTrevorBlockNode::MODE_TRANSLATION,
                        'parent' => $this
                    )
                ),
            ),
            'labels' => array(
                // todo
//                'heading' => $this->getAttributeLabel('heading'),
//                'subheading' => $this->getAttributeLabel('subheading'),
//                'about' => $this->getAttributeLabel('about'),
//                'caption' => $this->getAttributeLabel('caption'),
            ),
        );
    }

    /**
     * @return string|null
     */
    public function getRouteUrl()
    {
        // todo: refactor with barebones
        if (empty($this->node_id)) {
            return null;
        }

        $route = Route::model()->findByAttributes(array(
            'node_id' => (int)$this->node_id,
            'canonical' => true,
            'translation_route_language' => Yii::app()->language,
        ));

        return ($route !== null) ? $route->route : null;
    }

    /**
     * @param RestApiCustomPage $page
     * @return RestApiCustomPage
     */
    public function loadRootPage($page)
    {
        if (empty($page->restApiCustomPageParent)) {
            return $page;
        }
        return $this->loadRootPage($page->restApiCustomPageParent);
    }

    /**
     * @param RestApiCustomPage $page
     * @param array $hierarchy
     */
    public function setChildren($page, &$hierarchy)
    {
        if (!empty($page->restApiCustomPageChildren)) {
            foreach ($page->restApiCustomPageChildren as $child) {
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
        // todo: refactor with barebones
        $groups = array();
        foreach ($this->node->nodeHasGroups as $gha) {
            $groups[] = $gha->group->title;
        }
        return array_unique($groups);
    }
}
