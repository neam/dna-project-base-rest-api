<?php

/**
 * Video file resource.
 *
 * Properties made available through the I18nAttributeMessagesBehavior class:
 * @property string $title
 * @property string $caption
 * @property string $about
 */
class RestApiVideoFile extends VideoFile
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
                    'translationAttributes' => array('title', 'caption', 'about'),
                    'languageSuffixes' => LanguageHelper::getCodes(),
                    'behaviorKey' => 'i18n-attribute-messages',
                    'displayedMessageSourceComponent' => 'displayedMessages',
                    'editedMessageSourceComponent' => 'editedMessages',
                ),
                'i18n-columns' => array(
                    'class' => 'I18nColumnsBehavior',
                    'translationAttributes' => array('slug'),
                    'multilingualRelations' => array('processedMedia' => 'processed_media_id'),
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
            parent::relations(), array(
                'outEdges' => array(self::HAS_MANY, 'Edge', 'from_node_id'),
                'outNodes' => array(self::HAS_MANY, 'Node', array('to_node_id' => 'id'), 'through' => 'outEdges'),
                'inEdges' => array(self::HAS_MANY, 'Edge', 'to_node_id'),
                'inNodes' => array(self::HAS_MANY, 'Node', array('from_node_id' => 'id'), 'through' => 'inEdges'),
                'nodes' => array(self::HAS_MANY, 'Node', 'id'),
            )
        );
    }

    /**
     * The attributes that is returned by the REST api.
     *
     * @return object the response object as a stdClass.
     */
    public function getAllAttributes()
    {
        return array(
            'id' => $this->id,
            'title' => $this->title,
            'subheading' => '', // todo: data for this??
            'youtube_id' => '', // todo: data for this??
            'about' => $this->about,
            'contributors' => $this->getContributorsItems(),
            'related' => $this->getRelatedItems(),
        );
    }

    /**
     * Returns a list of contributors for the video file.
     * These are parsed into a format that can be used directly in the response.
     *
     * @return array
     */
    public function getContributorsItems()
    {
        $contributors = array();
        foreach ($this->node->changesets as $changeset) {
            $contributor = RestApiContributor::model()->findByPk((int)$changeset->user_id);
            if ($contributor === null) {
                continue;
            }
            if (!isset($contributors[$contributor->id])) {
                $contributors[$contributor->id] = $contributor->getAllAttributes();
            }
        }
        // The use of array_values gets rid of the account id key in the array, which is used to filter unique items.
        return array_values($contributors);
    }

    /**
     * Returns any related items for the video files.
     *
     * @return array
     */
    public function getRelatedItems()
    {
        $related = array();
        foreach ($this->getRelated('related', true) as $node) {
            $item = $node->item();
            if ($item === null) {
                continue;
            }
            // todo: what kind of related items can we have??
//                "title": "Niños nacidos por mujer por región",
//                "thumbnail_url": "http://placehold.it/200x160",
//                "item_type": "video",
//                "item_permalink": "ninos-nacidos-por-mujer-por-region",
//                "item_lang": "es"
        }
        return $related;
    }
} 