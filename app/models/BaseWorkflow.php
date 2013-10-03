<?php

/**
 * This is the model base class for the table "workflow".
 *
 * Columns in table "workflow" available as properties of the model:
 * @property string $workflow_id
 * @property string $workflow_name
 * @property string $workflow_version
 * @property integer $workflow_created
 *
 * There are no model relations.
 */
abstract class BaseWorkflow extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'workflow';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('workflow_name, workflow_created', 'required'),
                array('workflow_version', 'default', 'setOnEmpty' => true, 'value' => null),
                array('workflow_created', 'numerical', 'integerOnly' => true),
                array('workflow_name', 'length', 'max' => 255),
                array('workflow_version', 'length', 'max' => 10),
                array('workflow_id, workflow_name, workflow_version, workflow_created', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->workflow_name;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), array(
                'savedRelated' => array(
                    'class' => 'GtcSaveRelationsBehavior'
                )
            )
        );
    }

    public function relations()
    {
        return array(
        );
    }

    public function attributeLabels()
    {
        return array(
            'workflow_id' => Yii::t('crud', 'Workflow'),
            'workflow_name' => Yii::t('crud', 'Workflow Name'),
            'workflow_version' => Yii::t('crud', 'Workflow Version'),
            'workflow_created' => Yii::t('crud', 'Workflow Created'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.workflow_id', $this->workflow_id, true);
        $criteria->compare('t.workflow_name', $this->workflow_name, true);
        $criteria->compare('t.workflow_version', $this->workflow_version, true);
        $criteria->compare('t.workflow_created', $this->workflow_created);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
