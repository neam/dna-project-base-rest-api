<?php

/**
 * Custom page resource model.
 * @property string $title
 * @property string $about
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 *
 * Methods made available through the ContributorBehavior class:
 * @method array getContributors()
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
                    'translationAttributes' => array('title', 'about'),
                    'languageSuffixes' => LanguageHelper::getCodes(),
                    'behaviorKey' => 'i18n-attribute-messages',
                    'displayedMessageSourceComponent' => 'displayedMessages',
                    'editedMessageSourceComponent' => 'editedMessages',
                ),
                'contributor-behavior' => array(
                    'class' => 'ContributorBehavior',
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
            'heading' => '', // todo: $this->heading,
            'subheading' => '', // todo: $this->sub_heading,
            'about' => $this->about,
            'item_type' => 'composition',
            'composition_type' => '', // todo: $this->compositionType->ref,
            'page_hierarchy' => $this->getPageHierarchy(),
            'composition' => '', // todo: json_decode($this->composition),
            'contributors' => $this->getContributors(),
            'related' => array(), // todo: $this->getRelatedItems(),
        );
    }

    /**
     * Returns the page hierarchy for the custom page.
     *
     * @return array
     */
    public function getPageHierarchy()
    {
        $hierarchy = array(
            'siblings' => array(),
            'children' => array(),
            'parent_path' => array(),
        );

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

    /**
     * Returns any related items for the custom page.
     *
     * @return array
     */
    public function getRelatedItems()
    {
        // todo: refactor and move to trait or something when we know what related types we can support and which model supports what.

        $related = array();
        foreach ($this->getRelated('related', true) as $node) {
            $item = $node->item();
            if ($item !== null && $item instanceof Composition /* todo: remove hard coded instance check once other nodes have the necessary data */) {
                $related[] = array(
                    'node_id' => $node->id,
                    'item_type' => 'composition', // todo: this is also hard coded for the composition item type.
                    'id' => $item->id,
                    'heading' => $item->heading,
                    'subheading' => $item->sub_heading,
                    'thumb' => '', // todo: $this->getItemThumbnail($item),
                    'caption' => $item->caption,
                    'slug' => $item->slug,
                    'composition_type' => $item->compositionType->ref, // todo: this is also hard coded for the composition item type.
                );
            }
        }
        return $related;
    }
} 