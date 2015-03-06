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
 */
class RestApiCustomPage extends Page
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
     * Returns "all" attributes for this resource.
     *
     * @return array
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
            'heading' => $this->heading,
            'subheading' => $this->subheading,
            'about' => $this->about,
            'caption' => $this->caption,
            'composition' => SirTrevorParser::populateSirTrevorBlocks($this->composition),
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
     * @return string|null
     */
    public function getCompositionTypeReference()
    {
        $command = Yii::app()->getDb()->createCommand()
            ->select('ref')
            ->from('composition_type')
            ->where('id=:compositionTypeId');
        $ref = $command->queryScalar(array(':compositionTypeId' => (int)$this->composition_type_id));
        return !empty($ref) ? $ref : null;
    }

    /**
     * @return string|null
     */
    public function getRouteUrl()
    {
        // todo: enable multi lingual support once ready.
        $command = Yii::app()->getDb()->createCommand()
            ->select('route')
            ->from('route')
            ->where('canonical=1 AND node_id=:nodeId'/*translation_route_language=:lang*/);
        $route = $command->queryScalar(array(':nodeId' => (int)$this->node_id/*, ':lang' => Yii::app()->language*/));
        return !empty($route) ? $route : null;
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
}
