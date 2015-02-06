<?php

/**
 * Custom page resource model.
 * @property string $heading
 * @property string $subheading
 * @property string $caption
 * @property string $about
 * @property string $menu_label
 *
 * @property RestApiCustomPage[] $children
 * @property RestApiCustomPage[] $siblings
 * @property RestApiCustomPage[] $recParentPages
 * @property RestApiCustomPage $parent
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 *
 * Methods made available through the ContributorBehavior class:
 * @method array getContributors()
 *
 * Methods made available through the RelatedBehavior class:
 * @method array getRelatedItems()
 *
 * Methods made available through the SirTrevorBehavior class:
 * @method array populateSirTrevorBlocks($composition)
 * @method array|bool getSirTrevorBlockById($blockId)
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
        return array_merge(
            parent::behaviors(),
            array(
                'rest-model-behavior' => array(
                    'class' => 'WRestModelBehavior',
                ),
                'contributor-behavior' => array(
                    'class' => 'ContributorBehavior',
                ),
                'related-behavior' => array(
                    'class' => 'RelatedBehavior',
                ),
                'sir-trevor-behavior' => array(
                    'class' => 'SirTrevorBehavior',
                ),
            )
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
            'contributors' => $this->getContributors(),
            'related' => $this->getRelatedItems(),
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
            'composition' => $this->populateSirTrevorBlocks($this->composition, array('localize' => true)),
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
                'heading' => array(
                    'label' => $this->getAttributeLabel('heading'),
                    'value' => $this->_heading,
                ),
                'subheading' => array(
                    'label' => $this->getAttributeLabel('subheading'),
                    'value' => $this->_subheading,
                ),
                'about' => array(
                    'label' => $this->getAttributeLabel('about'),
                    'value' => $this->_about,
                ),
                'caption' => array(
                    'label' => $this->getAttributeLabel('caption'),
                    'value' => $this->_caption,
                ),
                // todo: what about translatable strings, like the video file subtitles, which are not included in the block data by default? Pass options array to populateSirTrevorBlocks method?
                'composition' => $this->populateSirTrevorBlocks($this->composition, array('localize' => false)),
            ),
            'translations' => array(
                'heading' => array(
                    'value' => $this->heading,
                    'progress' => $this->getAttributeTranslationProgress('heading'),
                ),
                'subheading' => array(
                    'value' => $this->subheading,
                    'progress' => $this->getAttributeTranslationProgress('subheading'),
                ),
                'about' => array(
                    'value' => $this->about,
                    'progress' => $this->getAttributeTranslationProgress('about'),
                ),
                'caption' => array(
                    'value' => $this->caption,
                    'progress' => $this->getAttributeTranslationProgress('caption'),
                ),
                // We need to populate the blocks again, with localizations this time.
                'composition' => $this->populateSirTrevorBlocks($this->composition, array('localize' => true)),
            ),
        );
    }

    /**
     * @todo move to trait or behavior or something. also thing about moving TranslatableResource to trait or behavior.
     *
     * @param string $attribute
     * @return int
     */
    protected function getAttributeTranslationProgress($attribute)
    {
        return ($this->{"_{$attribute}"} !== $this->{$attribute}) ? 100 : 0;
    }

    /**
     * @return string|null
     */
    public function getRouteUrl()
    {
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
        $groups = array();
        foreach ($this->node->nodeHasGroups as $gha) {
            $groups[] = $gha->group->title;
        }
        return array_unique($groups);
    }
}
