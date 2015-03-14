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
            return \barebones\Barebones::createMediaUrl($mediaId, 'original');
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
    public static function buildTree($ref)
    {

        $tree = array();
        /** @var RestApiNavigationTreeItem|NestedSetBehavior $root */
        $root = RestApiNavigationTreeItem::model()->findAll('ref = :ref', [":ref"=>$ref]);
        if (!empty($root)) {
            $treeItems = RestApiNavigationTreeItem::model()->findAll('root = :root', [":root"=>$root[0]->id]);
            $treeIncludingRoot = static::recBuildTree($treeItems);
            $tree['data'] = $treeIncludingRoot[0]["data"]["children"];
        }

        return $tree;
    }

    /**
     * Recursively build nav tree items for use in rest api responses.
     *
     * @param RestApiNavigationTreeItem $model the root menu item to recursively build from.
     * @param array $items the recursively built items.
     */
    protected static function recBuildTree($treeItems, $left = 0, $right = null)
    {
        $tree = array();
        foreach ($treeItems as $k => $treeItem) {
            $range = ['left' => $treeItem->lft, 'right' => $treeItem->rgt];
            if ($range['left'] == $left + 1 && (is_null($right) || $range['right'] < $right)) {
                $tree[$k] = self::buildTreeItem($treeItem);
                $tree[$k]["data"]["children"] = static::recBuildTree($treeItems, $range['left'], $range['right']);
                $left = $range['right'];
            }
        }
        return $tree;
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
