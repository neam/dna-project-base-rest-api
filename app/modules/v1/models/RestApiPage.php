<?php

/**
 * Page resource model.
 */
class RestApiPage extends BaseRestApiPage
{
    /**
     * @inheritdoc
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
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
            'groups' => $this->getGroupData(),
            'home_navigation_tree' => RestApiNavigationTreeItem::buildTree(RestApiNavigationTreeItem::REF_HOME),
            'footer_navigation_tree_1' => RestApiNavigationTreeItem::buildTree(RestApiNavigationTreeItem::REF_FOOTER1),
            'footer_navigation_tree_2' => RestApiNavigationTreeItem::buildTree(RestApiNavigationTreeItem::REF_FOOTER2),
        );
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
            'composition' => SirTrevorParser::populateSirTrevorBlocks($this->composition),
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
}
