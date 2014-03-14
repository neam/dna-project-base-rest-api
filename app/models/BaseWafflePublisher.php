<?php

/**
 * This is the model base class for the table "waffle_publisher".
 *
 * Columns in table "waffle_publisher" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $ref
 * @property string $_name
 * @property string $_description
 * @property string $url
 * @property integer $image_small_media_id
 * @property integer $image_large_media_id
 * @property string $created
 * @property string $modified
 * @property integer $owner_id
 * @property string $node_id
 * @property string $waffle_publisher_qa_state_id
 *
 * Relations of table "waffle_publisher" available as properties of the model:
 * @property Waffle[] $waffles
 * @property WafflePublisherQaState $wafflePublisherQaState
 * @property Account $owner
 * @property Node $node
 * @property P3Media $imageSmallMedia
 * @property P3Media $imageLargeMedia
 * @property WafflePublisher $clonedFrom
 * @property WafflePublisher[] $wafflePublishers
 */
abstract class BaseWafflePublisher extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'waffle_publisher';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, ref, _name, _description, url, image_small_media_id, image_large_media_id, created, modified, owner_id, node_id, waffle_publisher_qa_state_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, image_small_media_id, image_large_media_id, owner_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, node_id, waffle_publisher_qa_state_id', 'length', 'max' => 20),
                array('ref, _name, _description, url', 'length', 'max' => 255),
                array('created, modified', 'safe'),
                array('id, version, cloned_from_id, ref, _name, _description, url, image_small_media_id, image_large_media_id, created, modified, owner_id, node_id, waffle_publisher_qa_state_id', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->cloned_from_id;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), array(
                'savedRelated' => array(
                    'class' => '\GtcSaveRelationsBehavior'
                )
            )
        );
    }

    public function relations()
    {
        return array_merge(
            parent::relations(), array(
                'waffles' => array(self::HAS_MANY, 'Waffle', 'waffle_publisher_id'),
                'wafflePublisherQaState' => array(self::BELONGS_TO, 'WafflePublisherQaState', 'waffle_publisher_qa_state_id'),
                'owner' => array(self::BELONGS_TO, 'Account', 'owner_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'imageSmallMedia' => array(self::BELONGS_TO, 'P3Media', 'image_small_media_id'),
                'imageLargeMedia' => array(self::BELONGS_TO, 'P3Media', 'image_large_media_id'),
                'clonedFrom' => array(self::BELONGS_TO, 'WafflePublisher', 'cloned_from_id'),
                'wafflePublishers' => array(self::HAS_MANY, 'WafflePublisher', 'cloned_from_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'cloned_from_id' => Yii::t('model', 'Cloned From'),
            'ref' => Yii::t('model', 'Ref'),
            '_name' => Yii::t('model', 'Name'),
            '_description' => Yii::t('model', 'Description'),
            'url' => Yii::t('model', 'Url'),
            'image_small_media_id' => Yii::t('model', 'Image Small Media'),
            'image_large_media_id' => Yii::t('model', 'Image Large Media'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'owner_id' => Yii::t('model', 'Owner'),
            'node_id' => Yii::t('model', 'Node'),
            'waffle_publisher_qa_state_id' => Yii::t('model', 'Waffle Publisher Qa State'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.version', $this->version);
        $criteria->compare('t.cloned_from_id', $this->cloned_from_id);
        $criteria->compare('t.ref', $this->ref, true);
        $criteria->compare('t._name', $this->_name, true);
        $criteria->compare('t._description', $this->_description, true);
        $criteria->compare('t.url', $this->url, true);
        $criteria->compare('t.image_small_media_id', $this->image_small_media_id);
        $criteria->compare('t.image_large_media_id', $this->image_large_media_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.owner_id', $this->owner_id);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.waffle_publisher_qa_state_id', $this->waffle_publisher_qa_state_id);


        return $criteria;

    }

}
