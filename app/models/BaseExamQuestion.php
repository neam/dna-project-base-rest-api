<?php

/**
 * This is the model base class for the table "exam_question".
 *
 * Columns in table "exam_question" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $slug
 * @property string $question
 * @property string $source_node_id
 * @property string $authoring_workflow_execution_id
 * @property string $created
 * @property string $modified
 * @property string $node_id
 *
 * Relations of table "exam_question" available as properties of the model:
 * @property Snapshot $clonedFrom
 * @property EzcExecution $authoringWorkflowExecution
 * @property Node $node
 * @property Node $sourceNode
 * @property ExamQuestionAlternative[] $examQuestionAlternatives
 * @property SectionContent[] $sectionContents
 */
abstract class BaseExamQuestion extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'exam_question';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, slug, question, source_node_id, authoring_workflow_execution_id, created, modified, node_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, source_node_id, node_id', 'length', 'max' => 20),
                array('slug', 'length', 'max' => 255),
                array('authoring_workflow_execution_id', 'length', 'max' => 10),
                array('question, created, modified', 'safe'),
                array('id, version, cloned_from_id, slug, question, source_node_id, authoring_workflow_execution_id, created, modified, node_id', 'safe', 'on' => 'search'),
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
        return array(
            'clonedFrom' => array(self::BELONGS_TO, 'Snapshot', 'cloned_from_id'),
            'authoringWorkflowExecution' => array(self::BELONGS_TO, 'EzcExecution', 'authoring_workflow_execution_id'),
            'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
            'sourceNode' => array(self::BELONGS_TO, 'Node', 'source_node_id'),
            'examQuestionAlternatives' => array(self::HAS_MANY, 'ExamQuestionAlternative', 'exam_question_id'),
            'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'exam_question_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'cloned_from_id' => Yii::t('model', 'Cloned From'),
            'slug' => Yii::t('model', 'Slug'),
            'question' => Yii::t('model', 'Question'),
            'source_node_id' => Yii::t('model', 'Source Node'),
            'authoring_workflow_execution_id' => Yii::t('model', 'Authoring Workflow Execution'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'node_id' => Yii::t('model', 'Node'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.version', $this->version);
        $criteria->compare('t.cloned_from_id', $this->cloned_from_id);
        $criteria->compare('t.slug', $this->slug, true);
        $criteria->compare('t.question', $this->question, true);
        $criteria->compare('t.source_node_id', $this->source_node_id);
        $criteria->compare('t.authoring_workflow_execution_id', $this->authoring_workflow_execution_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.node_id', $this->node_id);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
