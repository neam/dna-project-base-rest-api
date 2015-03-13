<?php

/**
 * @property int $node_id
 * @property string $ref
 * @property string $url
 *
 * @property string $about
 * @property string $menu_label
 * @property string $heading
 * @property string $subheading
 */
class RestApiNavigationTreeItem extends NavigationTreeItem
{
    const REF_HOME = 'home_navigation_tree';
    const REF_FOOTER1 = 'footer_navigation_tree_1';
    const REF_FOOTER2 = 'footer_navigation_tree_2';

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
                    'about',
                    'menu_label',
                    'heading',
                    'subheading',
                ),
                'languageSuffixes' => LanguageHelper::getCodes(),
                'behaviorKey' => 'i18n-attribute-messages',
                'displayedMessageSourceComponent' => 'displayedMessages',
                'editedMessageSourceComponent' => 'editedMessages',
            ),
            'NestedSetBehavior' => array(
                'class' => '\NestedSetBehavior',
                'hasManyRoots' => true,
            ),
        );
    }

    /**
     * Returns the menu item icon url.
     *
     * @return null|string the url.
     */
    public function getIconUrl()
    {
        $mediaId = $this->icon_media_id;
        if (!empty($mediaId)) {
            return \barebones\Barebones::createMediaUrl($mediaId, 'icon-32');
        }
        return null;
    }

    /**
     * Builds a default nav tree for use in rest api responses.
     *
     * @param string $ref the ref key to find the tree root by.
     * @param boolean $inclRoot if the root nav item is to be included (defaults to false).
     * @return array the tree structure.
     */
    public static function buildTree($ref, $inclRoot = false)
    {
        // todo: this takes to long to run, ~200ms. Refactor to load all items under the root at once and then structure it in PHP.

        $tree = array();
        /** @var RestApiNavigationTreeItem|NestedSetBehavior $root */
        $root = RestApiNavigationTreeItem::model()->findByAttributes(array('ref' => $ref));
        if (!is_null($root)) {
            $tree['data'] = array();
            if ($inclRoot) {
                $item = self::buildTreeItem($root);
                self::recBuildTreeItems($root, $item['data']['children']);
                $tree['data'][] = $item;
            } else {
                self::recBuildTreeItems($root, $tree['data']);
            }
        }
        return $tree;
    }

    /**
     * Recursively build nav tree items for use in rest api responses.
     *
     * @param RestApiNavigationTreeItem $model the root menu item to recursively build from.
     * @param array $items the recursively built items.
     */
    protected static function recBuildTreeItems(RestApiNavigationTreeItem $model, &$items = array())
    {
        /** @var RestApiNavigationTreeItem|NestedSetBehavior $model */
        /** @var RestApiNavigationTreeItem[]|NestedSetBehavior[] $children */
        $children = $model->children()->findAll();
        foreach ($children as $child) {
            $item = self::buildTreeItem($child);
            self::recBuildTreeItems($child, $item['data']['children']);
            $items[] = $item;
        }
    }

    /**
     * Builds a nav tree item for use in the tree structure in rest api responses.
     *
     * @param RestApiNavigationTreeItem $model the nav menu item to build the structure from.
     * @return array the nav item structure.
     */
    protected static function buildTreeItem(RestApiNavigationTreeItem $model)
    {
        return array(
            'type' => 'navigation_tree_item',
            'data' => array(
                'node_id' => (int) $model->node_id,
                'item_type' => 'navigation_tree_item',
                'attributes' => array(
                    'ref' => $model->ref,
                    'about' => $model->about,
                    'menu_label' => $model->menu_label,
                    'heading' => $model->heading,
                    'subheading' => $model->subheading,
                    'url' => $model->url,
                    'icon_url' => $model->getIconUrl(),
                ),
                'children' => array(),
            ),
        );
    }
}
