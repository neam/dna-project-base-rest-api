<?php

/**
 * Composite item resource model.
 *
 * Properties made available through the I18nAttributeMessagesBehavior class:
 * @property string heading
 * @property string sub_heading
 * @property string about
 *
 * Properties made available through the RestrictedAccessBehavior class:
 * @property boolean $enableRestriction
 *
 * Methods made available through the WRestModelBehavior class:
 * @method array getCreateAttributes
 * @method array getUpdateAttributes
 */
class RestApiComposition extends Composition
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
                    'translationAttributes' => array('heading', 'sub_heading', 'caption', 'about'),
                    'languageSuffixes' => LanguageHelper::getCodes(),
                    'behaviorKey' => 'i18n-attribute-messages',
                    'displayedMessageSourceComponent' => 'displayedMessages',
                    'editedMessageSourceComponent' => 'editedMessages',
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
            'composition' => json_decode($this->composition),
            'contributors' => $this->getContributorsItems(),
            'related' => $this->getRelatedItems(),
        );
    }

    /**
     * Returns any related items for the composition.
     *
     * @return array
     */
    public function getRelatedItems()
    {
        $related = array();
        foreach ($this->getRelated('related', true/* todo: we have to force refresh, why??*/) as $node) {
            // todo: this might need some refactoring once we have other supported related items than "Composition" ones.
            $item = $node->item();
            if ($item !== null && $item instanceof Composition /* todo: remove ard coded instance check once other nodes have the necessary data */) {
                $related[] = array(
                    'node_id' => $node->id,
                    'item_type' => 'composition', // todo: this is also hard coded for the composition item type.
                    'id' => $item->id,
                    'heading' => $item->heading,
                    'subheading' => $item->sub_heading,
                    'thumb' => $this->getItemThumbnail($item),
                    'caption' => $item->caption,
                    'slug' => $item->slug,
                    'composition_type' => $item->compositionType->ref, // todo: this is also hard coded for the composition item type.
                );
            }
        }
        return $related;
    }

    /**
     * Returns the url for the item thumbnail image.
     *
     * @param object $item the item object to get the url for.
     * @return string|null the absolute url or null if not found.
     */
    public function getItemThumbnail($item)
    {
        $url = ($item->thumbMedia !== null)
            ? $item->thumbMedia->createUrl('item-thumbnail', true)
            : null;
        // todo: provide a fallback profile picture when it is done/exists
        // Rewriting so that the temporary files-api app is used to serve the profile pictures
        return is_string($url) ? str_replace(array("api/", "internal/"), "files-api/", $url) : $url;
    }

    /**
     * Returns a list of contributors for the composition.
     * These are parsed into a format that can be used directly int he response.
     *
     * @return array
     */
    public function getContributorsItems()
    {
        $contributors = array();
        foreach ($this->node->changesets as $changeset) {
            $account = $changeset->user;
            if ($account !== null && !isset($contributors[$account->id])) {
                $contributors[$account->id] = array(
                    'user_id' => $account->id,
                    'username' => $account->username,
                    'thumbnail_url' => ($account->profile !== null) ? $account->profile->getPictureUrl() : null,
                );
            }
        }
        // The use of array_values gets rid of the account id key in the array, which is used to filter unique items.
        return array_values($contributors);
    }
} 