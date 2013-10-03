<?php

/**
 * This is the model base class for the table "execution".
 *
 * Columns in table "execution" available as properties of the model:
 * @property string $workflow_id
 * @property string $execution_id
 * @property string $execution_parent
 * @property integer $execution_started
 * @property integer $execution_suspended
 * @property string $execution_variables
 * @property string $execution_waiting_for
 * @property string $execution_threads
 * @property string $execution_next_thread_id
 *
 * Relations of table "execution" available as properties of the model:
 * @property VideoFile[] $videoFiles
 * @property VideoFile[] $videoFiles1
 * @property VideoFile[] $videoFiles2
 * @property VideoFile[] $videoFiles3
 * @property VideoFile[] $videoFiles4
 * @property VideoFile[] $videoFiles5
 * @property VideoFile[] $videoFiles6
 * @property VideoFile[] $videoFiles7
 * @property VideoFile[] $videoFiles8
 */
abstract class BaseExecution extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'execution';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('workflow_id, execution_started, execution_next_thread_id', 'required'),
                array('execution_parent, execution_suspended, execution_variables, execution_waiting_for, execution_threads', 'default', 'setOnEmpty' => true, 'value' => null),
                array('execution_started, execution_suspended', 'numerical', 'integerOnly' => true),
                array('workflow_id, execution_parent, execution_next_thread_id', 'length', 'max' => 10),
                array('execution_variables, execution_waiting_for, execution_threads', 'safe'),
                array('workflow_id, execution_id, execution_parent, execution_started, execution_suspended, execution_variables, execution_waiting_for, execution_threads, execution_next_thread_id', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->workflow_id;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), array(
                'savedRelated' => array(
                    'class' => 'vendor.schmunk42.relation.behaviors.GtcSaveRelationsBehavior'
                )
            )
        );
    }

    public function relations()
    {
        return array(
            'videoFiles' => array(self::HAS_MANY, 'VideoFile', 'translation_workflow_execution_id_de'),
            'videoFiles1' => array(self::HAS_MANY, 'VideoFile', 'translation_workflow_execution_id_en'),
            'videoFiles2' => array(self::HAS_MANY, 'VideoFile', 'translation_workflow_execution_id_cn'),
            'videoFiles3' => array(self::HAS_MANY, 'VideoFile', 'translation_workflow_execution_id_es'),
            'videoFiles4' => array(self::HAS_MANY, 'VideoFile', 'translation_workflow_execution_id_fa'),
            'videoFiles5' => array(self::HAS_MANY, 'VideoFile', 'translation_workflow_execution_id_hi'),
            'videoFiles6' => array(self::HAS_MANY, 'VideoFile', 'translation_workflow_execution_id_pt'),
            'videoFiles7' => array(self::HAS_MANY, 'VideoFile', 'translation_workflow_execution_id_sv'),
            'videoFiles8' => array(self::HAS_MANY, 'VideoFile', 'authoring_workflow_execution_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'workflow_id' => Yii::t('crud', 'Workflow'),
            'execution_id' => Yii::t('crud', 'Execution'),
            'execution_parent' => Yii::t('crud', 'Execution Parent'),
            'execution_started' => Yii::t('crud', 'Execution Started'),
            'execution_suspended' => Yii::t('crud', 'Execution Suspended'),
            'execution_variables' => Yii::t('crud', 'Execution Variables'),
            'execution_waiting_for' => Yii::t('crud', 'Execution Waiting For'),
            'execution_threads' => Yii::t('crud', 'Execution Threads'),
            'execution_next_thread_id' => Yii::t('crud', 'Execution Next Thread'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.workflow_id', $this->workflow_id, true);
        $criteria->compare('t.execution_id', $this->execution_id, true);
        $criteria->compare('t.execution_parent', $this->execution_parent, true);
        $criteria->compare('t.execution_started', $this->execution_started);
        $criteria->compare('t.execution_suspended', $this->execution_suspended);
        $criteria->compare('t.execution_variables', $this->execution_variables, true);
        $criteria->compare('t.execution_waiting_for', $this->execution_waiting_for, true);
        $criteria->compare('t.execution_threads', $this->execution_threads, true);
        $criteria->compare('t.execution_next_thread_id', $this->execution_next_thread_id, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
