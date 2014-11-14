<?php

/**
 * Custom page resource model.
 * @property string $heading
 * @property string $sub_heading
 * @property string $caption
 * @property string $about
 * @property string $menu_label
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 *
 * Methods made available through the ContributorBehavior class:
 * @method array getContributors()
 *
 * Methods made available through the RelatedBehavior class:
 * @method array getRelatedItems()
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
                    'translationAttributes' => array('heading', 'sub_heading', 'caption', 'about', 'menu_label'),
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
            'heading' => $this->heading,
            'subheading' => $this->sub_heading,
            'about' => $this->about,
            'item_type' => 'composition',
            'composition_type' => $this->compositionType->ref,
            'page_hierarchy' => $this->getPageHierarchy(),
            'composition' => json_decode($this->composition),
            'contributors' => $this->getContributors(),
            'related' => $this->getRelatedItems(),
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

//        foreach ($this->siblings as $sibling) {
//            $hierarchy['siblings'][] = array(
//                'node_id' => $sibling->node_id,
//                'menu_label' => $sibling->menu_label,
//                'caption' => $sibling->caption,
//                'url' => '', // todo
//            );
//        }
//
//        foreach ($this->children as $child) {
//            $hierarchy['children'][] = array(
//                'node_id' => $child->node_id,
//                'menu_label' => $child->menu_label,
//                'caption' => $child->caption,
//                'url' => '', // todo
//            );
//        }

        foreach ($this->pages as $page) {
            $hierarchy['parent_path'][] = array(
                'node_id' => $page->node_id,
                'menu_label' => $page->menu_label,
                'caption' => $page->caption,
                'url' => '', // todo
            );
        }

        return $hierarchy;

//        {
//        "siblings": [
//            {
//                "node_id": 34,
//                "menu_label": "Short name",
//                "caption": "asffd asdfsdsfaasf",
//                "url": "/ebola/dashboard/sdfdsf/"
//            },
//            {
//                "node_id": 2324,
//                "menu_label": "dfgdfg name",
//                "caption": "asffd asdfsdsfaasf ",
//                "url": "/ebola/dashboard/fdfgdg/"
//            }
//        ],
//        "children": [
//            {
//                "node_id": 34,
//                "menu_label": "Short name",
//                "caption": "asffd asdfsdsfaasf ",
//                "url": "/ebola/dashboard/sdfdsf/sdfsdf"
//            }
//        ],
//        "parent_path": [
//            {
//                "node_id": 1024,
//                "menu_label": "Ebola dashboard",
//                "caption": "asffd asdfsdsfaasf ",
//                "url": "/ebola/dashboard/"
//            },
//            {
//                "node_id": 23434,
//                "menu_label": "Short name",
//                "caption": "asffd asdfsdsfaasf ",
//                "url": "/ebola/"
//            }
//        ]
//        }
    }
}
