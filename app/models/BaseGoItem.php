<?php

/**
 * This is the model base class for the table "go_item".
 *
 * Columns in table "go_item" available as properties of the model:
 * @property string $node_id
 * @property string $id
 * @property string $_title
 * @property string $model_class
 *
 * There are no model relations.
 */
abstract class BaseGoItem extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'item';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('node_id, id, _title, model_class', 'default', 'setOnEmpty' => true, 'value' => null),
                array('node_id, id', 'length', 'max' => 20),
                array('_title', 'length', 'max' => 255),
                array('model_class', 'length', 'max' => 13),
                array('node_id, id, _title, model_class', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->node_id;
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
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'node_id' => Yii::t('model', 'Node'),
            'id' => Yii::t('model', 'ID'),
            '_title' => Yii::t('model', 'Title'),
            'model_class' => Yii::t('model', 'Model Class'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.node_id', $this->node_id, true);
        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t._title', $this->_title, true);
        $criteria->compare('t.model_class', $this->model_class, true);


        return $criteria;

    }

}
