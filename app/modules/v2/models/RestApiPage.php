<?php

/**
 * Page resource model.
 */
class RestApiPage extends BaseRestApiPage implements TranslatableResource
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
            'url_translations' => $this->getTranslatedRouteUrls(),
            'source_language' => $this->source_language,
            'requested_translation_language' => (Yii::app()->language !== $this->source_language) ? Yii::app()->language : null,
            'nav_tree_to_use' => !empty($this->nav_tree_to_use) ? $this->nav_tree_to_use : 'home',
            'attributes' => $this->getListableAttributes(),
            'root_page' => $this->getRootPageTree(),
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
            'composition' => SirTrevorParser::populateSirTrevorBlocks($this->composition, array('localize' => true, 'parent' => $this)),
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
            'url_translations' => $this->getTranslatedRouteUrls(),
            'source_language' => $this->source_language,
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
                'heading' => $this->getAttributeLabel('heading'),
                'subheading' => $this->getAttributeLabel('subheading'),
                'about' => $this->getAttributeLabel('about'),
                'caption' => $this->getAttributeLabel('caption'),
            ),
        );
    }

    /**
     * Returns the items `route` in all available languages.
     *
     * First choice is the `canonical` route for the specific language. Second choice is the `latest` added route for
     * the language. If neither is found, we have no route for that language and it wont be included in the result.
     *
     * @return array the language specific routes with language code as key and route as value.
     */
    public function getTranslatedRouteUrls()
    {
        $command = \barebones\Barebones::fpdo()
            ->from('route')
            ->where('node_id=:nodeId', array(':nodeId' => (int)$this->node_id))
            ->groupBy(array('canonical', 'translation_route_language'));
        $result = $command->fetchAll();

        $routes = array();
        foreach (LanguageHelper::getCodes() as $language) {
            foreach ($result as $row) {
                if ($row['translation_route_language'] !== $language) {
                    continue;
                }
                if ((int) $row['canonical'] === 1 || !isset($routes[$language])) {
                    $routes[$language] = $row['route'];
                }
            }
        }

        return $routes;
    }

    /**
     * Returns the pages root tree.
     *
     * Format:
     *
     * [
     *   "data" => [
     *     [
     *       "type" => "custom_page",
     *       "data" => [
     *         "node_id" => 4,
     *         "item_type" => "custom_page",
     *         "attributes" => [
     *           "ref" => null,
     *           "about" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
     *           "menu_label" => "Test page",
     *           "heading" => "Test heading",
     *           "subheading" => null,
     *           "url" => "/test-page-slug/",
     *           "icon_url" => "http://web/files-api/p3media/file/image?id=5&preset=icon-80&title=media&extension=.jpg"
     *         ],
     *         "children" => [
     *           [
     *             "type" => "custom_page",
     *             "data" => [
     *               "node_id" => 5,
     *               "item_type" => "custom_page",
     *               "attributes" => [
     *                 "ref" => null,
     *                 "about" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
     *                 "menu_label" => "Test page 2",
     *                 "heading" => "Test heading 2",
     *                 "subheading" => null,
     *                 "url" => "/test-page2-slug/",
     *                 "icon_url" => "http://web/files-api/p3media/file/image?id=6&preset=icon-80&title=media&extension=.jpg"
     *               ],
     *               "children" => [ ]
     *             ]
     *           ]
     *         ]
     *       ]
     *     ]
     *   ]
     * ]
     *
     * @return array
     */
    public function getRootPageTree()
    {
        $tree = array();
        $rootPage = $this->loadRootPage($this);
        if (!is_null($rootPage)) {
            $treeItem = $rootPage->getRootPageTreeItem();
            $rootPage->recBuildRootPageTree($rootPage, $treeItem);
            $tree['data'] = array($treeItem);
        }
        return $tree;
    }

    /**
     * Recursively builds the pages root tree by traversing all children.
     *
     * @param RestApiPage $page the model to start from.
     * @param array $treeItem the start models tree structure to add data to.
     */
    protected function recBuildRootPageTree($page, &$treeItem)
    {
        $children = $page->restApiCustomPageChildren;
        if (!empty($children)) {
            foreach ($children as $child) {
                $childTreeItem = $child->getRootPageTreeItem();
                $child->recBuildRootPageTree($child, $childTreeItem);
                $treeItem['data']['children'][] = $childTreeItem;
            }
        }
    }

    /**
     * Returns one root tree items data.
     *
     * @return array the data.
     */
    protected function getRootPageTreeItem()
    {
        return array(
            'type' => 'custom_page',
            'data' => array(
                'node_id' => (int) $this->node_id,
                'item_type' => 'custom_page',
                'attributes' => array(
                    'ref' => null, // todo: do we have this? do we need this?
                    'about' => $this->about,
                    'menu_label' => $this->menu_label,
                    'heading' => $this->heading,
                    'subheading' => $this->subheading,
                    'url' => $this->getRouteUrl(),
                    'icon_url' => $this->getIconUrl(),
                ),
                'children' => array(),
            ),
        );
    }
}
