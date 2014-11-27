<?php

/**
 * Composite item resource model.
 *
 * Properties made available through the I18nAttributeMessagesBehavior class:
 * @property string heading
 * @property string subheading
 * @property string about
 * @property string caption
 *
 * Properties made available through the I18nColumnsBehavior class:
 * @property string $slug
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 *
 * Methods made available through the WRestModelBehavior class:
 * @method array getCreateAttributes
 * @method array getUpdateAttributes
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
class RestApiComposition extends Composition implements RelatedResource
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
                    'translationAttributes' => array('heading', 'subheading', 'caption', 'about'),
                    'languageSuffixes' => LanguageHelper::getCodes(),
                    'behaviorKey' => 'i18n-attribute-messages',
                    'displayedMessageSourceComponent' => 'displayedMessages',
                    'editedMessageSourceComponent' => 'editedMessages',
                ),
                'i18n-columns' => array(
                    'class' => 'I18nColumnsBehavior',
                    'translationAttributes' => array('slug'),
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
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function getAllAttributes()
    {
        return array(
            'heading' => $this->heading,
            'subheading' => $this->subheading,
            'about' => $this->about,
            'item_type' => 'composition',
            'composition_type' => ($this->compositionType !== null) ? $this->compositionType->ref : null,
            'composition' => $this->populateSirTrevorBlocks($this->composition),
            'contributors' => $this->getContributors(),
            'related' => $this->getRelatedItems(),
        );
    }

    /**
     * @inheritdoc
     */
    public function getRelatedAttributes()
    {
        // todo: new structure, define in apiary as well.

//{
//"node_id": 357,
//"item_type": "go_item",
//“url”: “//www.gapminder.org/exercises/item-1207”,
//“attributes”: {
//"composition_type": "exercise",
//"heading": "The heading of #1207",
//"subheading": "This is an example item.",
///* "thumb": "http://placehold.it/200x120", */
//“thumb”: {
//  “200x120”: "http://placehold.it/200x120.png",
//	“400x240”: "http://placehold.it/400x240.png",
//	“600x360”: "http://placehold.it/400x360.png",
//	“original”: “"http://placehold.it/original.png”
//},
//"caption": “a caption”,
//"slug": "item-1205",
//}
//}

        return array(
            'node_id' => $this->node_id,
            'item_type' => 'composition',
            'id' => $this->id,
            'heading' => $this->heading,
            'subheading' => $this->subheading,
            'thumb' => $this->getThumbnailUrl(),
            'caption' => $this->caption,
            'slug' => $this->slug,
            'composition_type' => $this->compositionType->ref,
        );
    }

    /**
     * Returns absolute url for the thumbnail image.
     *
     * @return string|null the url or null if not found.
     */
    public function getThumbnailUrl()
    {
        if (empty($this->thumbMedia)) {
            return null;
        }
        $url = $this->thumbMedia->createUrl('item-thumbnail', true);
        // Rewriting so that the temporary files-api app is used to serve the profile pictures
        return str_replace(array("api/", "internal/"), "files-api/", $url);
    }
} 