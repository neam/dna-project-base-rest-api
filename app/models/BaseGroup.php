<?php

/**
 * This is the model base class for the table "group".
 *
 * Columns in table "group" available as properties of the model:
 * @property string $id
 * @property string $title
 * @property string $created
 * @property string $modified
 *
 * Relations of table "group" available as properties of the model:
 * @property GroupHasAccount[] $groupHasAccounts
 * @property NodeHasGroup[] $nodeHasGroups
 */
abstract class BaseGroup extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'group';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('title, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('title', 'length', 'max' => 255),
                array('created, modified', 'safe'),
                array('id, title, created, modified', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->title;
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
                'groupHasAccounts' => array(self::HAS_MANY, 'GroupHasAccount', 'group_id'),
                'nodeHasGroups' => array(self::HAS_MANY, 'NodeHasGroup', 'group_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'title' => Yii::t('model', 'Title'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.title', $this->title, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);


        return $criteria;

    }

}
