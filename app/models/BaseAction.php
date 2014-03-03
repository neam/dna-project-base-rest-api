<?php

/**
 * This is the model base class for the table "action".
 *
 * Columns in table "action" available as properties of the model:
 * @property string $id
 * @property string $action
 * @property string $label
 *
 * There are no model relations.
 */
abstract class BaseAction extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'action';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('action, label', 'default', 'setOnEmpty' => true, 'value' => null),
                array('action, label', 'length', 'max' => 255),
                array('id, action, label', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->action;
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
            parent::relations(), array()
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'action' => Yii::t('model', 'Action'),
            'label' => Yii::t('model', 'Label'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.action', $this->action, true);
        $criteria->compare('t.label', $this->label, true);


        return $criteria;

    }

}
