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
 * @property Chapter[] $chapters
 * @property Chapter[] $chapters1
 * @property Chapter[] $chapters2
 * @property Chapter[] $chapters3
 * @property Chapter[] $chapters4
 * @property Chapter[] $chapters5
 * @property Chapter[] $chapters6
 * @property Chapter[] $chapters7
 * @property Workflow $workflow
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
                    'class' => '\GtcSaveRelationsBehavior'
                )
            )
        );
    }

    public function relations()
    {
        return array(
            'chapters' => array(self::HAS_MANY, 'Chapter', 'authoring_workflow_execution_id_de'),
            'chapters1' => array(self::HAS_MANY, 'Chapter', 'authoring_workflow_execution_id_en'),
            'chapters2' => array(self::HAS_MANY, 'Chapter', 'authoring_workflow_execution_id_cn'),
            'chapters3' => array(self::HAS_MANY, 'Chapter', 'authoring_workflow_execution_id_es'),
            'chapters4' => array(self::HAS_MANY, 'Chapter', 'authoring_workflow_execution_id_fa'),
            'chapters5' => array(self::HAS_MANY, 'Chapter', 'authoring_workflow_execution_id_hi'),
            'chapters6' => array(self::HAS_MANY, 'Chapter', 'authoring_workflow_execution_id_pt'),
            'chapters7' => array(self::HAS_MANY, 'Chapter', 'authoring_workflow_execution_id_sv'),
            'workflow' => array(self::BELONGS_TO, 'Workflow', 'workflow_id'),
            'videoFiles' => array(self::HAS_MANY, 'VideoFile', 'translation_workflow_execution_id'),
            'videoFiles1' => array(self::HAS_MANY, 'VideoFile', 'authoring_workflow_execution_id_en'),
            'videoFiles2' => array(self::HAS_MANY, 'VideoFile', 'authoring_workflow_execution_id_cn'),
            'videoFiles3' => array(self::HAS_MANY, 'VideoFile', 'authoring_workflow_execution_id_de'),
            'videoFiles4' => array(self::HAS_MANY, 'VideoFile', 'authoring_workflow_execution_id_es'),
            'videoFiles5' => array(self::HAS_MANY, 'VideoFile', 'authoring_workflow_execution_id_fa'),
            'videoFiles6' => array(self::HAS_MANY, 'VideoFile', 'authoring_workflow_execution_id_hi'),
            'videoFiles7' => array(self::HAS_MANY, 'VideoFile', 'authoring_workflow_execution_id_pt'),
            'videoFiles8' => array(self::HAS_MANY, 'VideoFile', 'authoring_workflow_execution_id_sv'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'workflow_id' => Yii::t('model', 'Workflow'),
            'execution_id' => Yii::t('model', 'Execution'),
            'execution_parent' => Yii::t('model', 'Execution Parent'),
            'execution_started' => Yii::t('model', 'Execution Started'),
            'execution_suspended' => Yii::t('model', 'Execution Suspended'),
            'execution_variables' => Yii::t('model', 'Execution Variables'),
            'execution_waiting_for' => Yii::t('model', 'Execution Waiting For'),
            'execution_threads' => Yii::t('model', 'Execution Threads'),
            'execution_next_thread_id' => Yii::t('model', 'Execution Next Thread'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.workflow_id', $this->workflow_id);
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