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
                'composition' => $this->populateSirTrevorBlocks($this->composition)
            )),
            'contributors' => ContributorItems::getItems($this->node_id),
            'related' => RelatedItems::getItems($this->node_id),
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
                'composition_type' => $this->getCompositionTypeReference(),
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
            'composition_type' => $this->getCompositionTypeReference(),
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
     * @return string|null
     */
    public function getCompositionTypeReference()
    {
        $command = Yii::app()->getDb()->createCommand()
            ->select('ref')
            ->from('composition_type')
            ->where('id=:compositionTypeId');
        $ref = $command->queryScalar(array(':compositionTypeId' => (int)$this->composition_type_id));
        return !empty($ref) ? $ref : null;
    }

    /**
     * @return string|null
     */
    public function getRouteUrl()
    {
        // todo: enable multi lingual support once ready.
        $command = Yii::app()->getDb()->createCommand()
            ->select('route')
            ->from('route')
            ->where('canonical=1 AND node_id=:nodeId'/*translation_route_language=:lang*/);
        $route = $command->queryScalar(array(':nodeId' => (int)$this->node_id/*, ':lang' => Yii::app()->language*/));
        return !empty($route) ? $route : null;
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
}
