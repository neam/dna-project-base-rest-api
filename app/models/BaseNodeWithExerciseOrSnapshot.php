<?php

/**
 * This is the model base class for the table "node_with_exercise_or_snapshot".
 *
 * Columns in table "node_with_exercise_or_snapshot" available as properties of the model:
 * @property string $id
 * @property string $exercise_id
 * @property string $exercise_title
 * @property string $snapshot_id
 * @property string $snapshot_title
 * @property string $_title
 * @property string $model_class
 *
 * There are no model relations.
 */
abstract class BaseNodeWithExerciseOrSnapshot extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'node_with_exercise_or_snapshot';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('id, exercise_id, exercise_title, snapshot_id, snapshot_title, _title, model_class', 'default', 'setOnEmpty' => true, 'value' => null),
                array('id, exercise_id, snapshot_id', 'length', 'max' => 20),
                array('exercise_title, snapshot_title, _title', 'length', 'max' => 255),
                array('model_class', 'length', 'max' => 8),
                array('id, exercise_id, exercise_title, snapshot_id, snapshot_title, _title, model_class', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->id;
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
            'id' => Yii::t('model', 'ID'),
            'exercise_id' => Yii::t('model', 'Exercise'),
            'exercise_title' => Yii::t('model', 'Exercise Title'),
            'snapshot_id' => Yii::t('model', 'Snapshot'),
            'snapshot_title' => Yii::t('model', 'Snapshot Title'),
            '_title' => Yii::t('model', 'Title'),
            'model_class' => Yii::t('model', 'Model Class'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.exercise_id', $this->exercise_id, true);
        $criteria->compare('t.exercise_title', $this->exercise_title, true);
        $criteria->compare('t.snapshot_id', $this->snapshot_id, true);
        $criteria->compare('t.snapshot_title', $this->snapshot_title, true);
        $criteria->compare('t._title', $this->_title, true);
        $criteria->compare('t.model_class', $this->model_class, true);


        return $criteria;

    }

}
