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
 * @method array populateSirTrevorBlocks()
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
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array(
                'rest-model-behavior' => array(
                    'class' => 'WRestModelBehavior',
                ),
                'RestrictedAccessBehavior' => array(
                    'class' => '\RestrictedAccessBehavior',
                ),
                'i18n-attribute-messages' => array(
                    'class' => 'I18nAttributeMessagesBehavior',
                    'translationAttributes' => array('heading', 'subheading', 'caption', 'about', 'menu_label'),
                    'languageSuffixes' => LanguageHelper::getCodes(),
                    'behaviorKey' => 'i18n-attribute-messages',
                    'displayedMessageSourceComponent' => 'displayedMessages',
                    'editedMessageSourceComponent' => 'editedMessages',
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
                'outEdges' => array(self::HAS_MANY, 'Edge', array('id' => 'from_node_id'), 'through' => 'node'),
                'outNodes' => array(self::HAS_MANY, 'Node', array('to_node_id' => 'id'), 'through' => 'outEdges'),
                'inEdges' => array(self::HAS_MANY, 'Edge', array('id' => 'to_node_id'), 'through' => 'node'),
                'inNodes' => array(self::HAS_MANY, 'Node', array('from_node_id' => 'id'), 'through' => 'inEdges'),
                'children' => array(self::HAS_MANY, 'RestApiCustomPage', 'parent_page_id'),
                'parent' => array(self::BELONGS_TO, 'RestApiCustomPage', 'parent_page_id'),
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
            'url' => null, // todo: how to build it??
            'attributes' => $this->getListableAttributes(),
            'page_hierarchy' => $this->getPageHierarchy(),
            'composition' => $this->populateSirTrevorBlocks($this->composition),
            'contributors' => $this->getContributors(),
            'related' => $this->getRelatedItems(),
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
            'composition_type' => ($this->compositionType !== null) ? $this->compositionType->ref : null,
            'heading' => $this->heading,
            'subheading' => $this->subheading,
            'about' => $this->about,
            'caption' => $this->caption,
        );
    }

    /**
     * The attributes that are returned by the REST api when this resource acts as an hierarchy item.
     *
     * @return array
     */
    public function getHierarchyAttributes()
    {
        $route = null;
        if (!empty($this->node_id)) {
            $route = Route::model()->findByAttributes(array(
                'node_id' => (int)$this->node_id,
                'language' => Yii::app()->language,
            ));
        }
        return array(
            'node_id' => (int)$this->node_id,
            'menu_label' => $this->menu_label,
            'caption' => $this->caption,
            'url' => !empty($route) ? $route->route : null,
        );
    }

    /**
     * Returns the page hierarchy for the custom page.
     *
     * @return array
     */
    protected function getPageHierarchy()
    {
        $hierarchy = array(
            'siblings' => array(),
            'children' => array(),
            'parent_path' => array(),
        );

        foreach ($this->siblings as $page) {
            $hierarchy['siblings'][] = $page->getHierarchyAttributes();
        }

        foreach ($this->children as $page) {
            $hierarchy['children'][] = $page->getHierarchyAttributes();
        }

        foreach ($this->recParentPages as $page) {
            $hierarchy['parent_path'][] = $page->getHierarchyAttributes();
        }

        return $hierarchy;
    }

    /**
     * Recursively finds all parent page models for given page.
     *
     * @return RestApiCustomPage[] the parent pages.
     */
    public function getRecParentPages()
    {
        $pages = array();
        if ($this->parent !== null) {
            $pages[] = $this->parent;
            $tmp = $this->parent->getRecParentPages();
            if (!empty($tmp)) {
                $pages = array_merge($pages, $tmp);
            }
        }
        return $pages;
    }

    /**
     * Returns a list of all siblings for this page.
     *
     * @return RestApiCustomPage[] the sibling pages.
     */
    public function getSiblings()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('`t`.`parent_page_id`=:parentPageId');
        $criteria->addCondition('`t`.`id`!=:id');
        $criteria->params[':parentPageId'] = (int)$this->parent_page_id;
        $criteria->params[':id'] = (int)$this->id;
        return RestApiCustomPage::model()->findAll($criteria);
    }
}
