<?php

/**
 * This is the model base class for the table "changeset".
 *
 * Columns in table "changeset" available as properties of the model:
 * @property string $id
 * @property string $contents
 * @property integer $user_id
 * @property string $node_id
 * @property integer $reward
 * @property string $created
 * @property string $modified
 *
 * Relations of table "changeset" available as properties of the model:
 * @property Node $node
 * @property Users $user
 */
abstract class BaseChangeset extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'changeset';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('user_id, node_id', 'required'),
                array('contents, reward, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('user_id, reward', 'numerical', 'integerOnly' => true),
                array('node_id', 'length', 'max' => 20),
                array('contents, created, modified', 'safe'),
                array('id, contents, user_id, node_id, reward, created, modified', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->contents;
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
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'contents' => Yii::t('model', 'Contents'),
            'user_id' => Yii::t('model', 'User'),
            'node_id' => Yii::t('model', 'Node'),
            'reward' => Yii::t('model', 'Reward'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.contents', $this->contents, true);
        $criteria->compare('t.user_id', $this->user_id);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.reward', $this->reward);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
