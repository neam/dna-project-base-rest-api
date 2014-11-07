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
        foreach ($this->related as $node) {
            $item = $node->item();
            if ($item !== null) {
                $related[] = array(
                    'node_id' => $node->id,
                    'item_type' => '???',
                    'id' => $item->id,
                    'heading' => $item->heading,
                    'subheading' => $item->sub_heading,
                    'thumb' => 'http://placehold.it/200x120',
                    'caption' => $item->caption,
                    'slug' => $item->slug,
                    'composition_type' => '???',
                );
            }
        }
        return $related;
    }
} 