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
class RestApiComposition extends Composition implements RelatedResource, TranslatableResource
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
    public function getAllAttributes()
    {
        return array(
            'node_id' => (int)$this->node_id,
            'item_type' => 'go_item',
            'url' => $this->getRouteUrl(),
            'attributes' => array_merge($this->getListableAttributes(), array(
                'composition' => $this->populateSirTrevorBlocks($this->composition, array('localize' => true))
            )),
            'contributors' => $this->getContributors(),
            'related' => $this->getRelatedItems(),
            'groups' => $this->getGroupData(),
        );
    }

    /**
     * @inheritdoc
     */
    public function getRelatedAttributes()
    {
        return array(
            'node_id' => (int)$this->node_id,
            'item_type' => 'go_item',
            'url' => $this->getRouteUrl(),
            'attributes' =>  array(
                'composition_type' => ($this->compositionType !== null) ? $this->compositionType->ref : null,
                'heading' => $this->heading,
                'subheading' => $this->subheading,
                'about' => $this->about,
                'caption' => $this->caption,
                'slug' => $this->slug,
                'thumb' => array(
                    'original' => $this->getThumbUrl('original-public'),
                    '735x444' => $this->getThumbUrl('735x444'),
                    '160x96' => $this->getThumbUrl('160x96'),
                    '110x66' => $this->getThumbUrl('110x66'),
                )
            )
        );
    }

    /**
     * Returns att "listable" attributes.
     * Listable attributes are ones that appear inside an "attributes" section for a "go_item" in any response.
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
            'slug' => $this->slug,
            'thumb' => array(
                'original' => $this->getThumbUrl('original-public'),
                '735x444' => $this->getThumbUrl('735x444'),
                '160x96' => $this->getThumbUrl('160x96'),
                '110x66' => $this->getThumbUrl('110x66'),
            ),
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
            'item_type' => 'go_item',
            'url' =>  $this->getRouteUrl(),
            'attributes' => array(
                'heading' => $this->_heading,
                'subheading' => $this->_subheading,
                'about' => $this->_about,
                'caption' => $this->_caption,
                'composition' => $this->populateSirTrevorBlocks(
                        $this->composition,
                        array(
                            'localize' => false,
                            'mode' => RestApiSirTrevorBlockNode::MODE_TRANSLATION,
                        )
                    ),
            ),
            'translations' => array(
                'heading' => $this->heading,
                'subheading' => $this->subheading,
                'about' => $this->about,
                'caption' => $this->caption,
                // We need to populate the blocks again, with localizations this time.
                'composition' => $this->populateSirTrevorBlocks(
                        $this->composition,
                        array(
                            'localize' => true,
                            'mode' => RestApiSirTrevorBlockNode::MODE_TRANSLATION,
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
     * @todo move to trait or behavior or something. also thing about moving TranslatableResource to trait or behavior.
     *
     * @param string $attribute
     * @return int
     */
    protected function getAttributeTranslationProgress($attribute)
    {
        return ($this->{"_{$attribute}"} !== $this->{$attribute}) ? 100 : 0;
    }

    /**
     * @return string|null
     */
    public function getRouteUrl()
    {
        if (empty($this->node_id)) {
            return null;
        }

        $route = Route::model()->findByAttributes(array(
            'node_id' => (int)$this->node_id,
            'canonical' => true,
            'translation_route_language' => Yii::app()->language,
        ));

        return ($route !== null) ? $route->route : null;
    }

    /**
     * Returns absolute url for the thumbnail image.
     *
     * @param string $preset the image preset to use.
     * @return string|null the url or null if not found.
     */
    public function getThumbUrl($preset = 'original-public')
    {
        if (empty($this->thumbMedia)) {
            return null;
        }
        $url = $this->thumbMedia->createUrl($preset, true);
        // Rewriting so that the temporary files-api app is used to serve the url.
        return str_replace(array("api/", "internal/"), "files-api/", $url);
    }

    /**
     * Gets the group data to include in the response.
     *
     * Format:
     *
     * array(
     *     'GapminderOrg',
     *     'Translators',
     *     ...
     * )
     *
     * @return array the data.
     */
    protected function getGroupData()
    {
        $groups = array();
        foreach ($this->node->nodeHasGroups as $gha) {
            $groups[] = $gha->group->title;
        }
        return array_unique($groups);
    }
}
