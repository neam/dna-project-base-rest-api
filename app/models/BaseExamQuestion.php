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
 * @property string $source
 * @property string $authoring_workflow_execution_id
 * @property string $created
 * @property string $modified
 *
 * Relations of table "exam_question" available as properties of the model:
 * @property Execution $authoringWorkflowExecution
 * @property VizView $clonedFrom
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
                array('version, cloned_from_id, slug, question, source, authoring_workflow_execution_id, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version', 'numerical', 'integerOnly' => true),
                array('cloned_from_id', 'length', 'max' => 20),
                array('slug, source', 'length', 'max' => 255),
                array('authoring_workflow_execution_id', 'length', 'max' => 10),
                array('question, created, modified', 'safe'),
                array('id, version, cloned_from_id, slug, question, source, authoring_workflow_execution_id, created, modified', 'safe', 'on' => 'search'),
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
            'authoringWorkflowExecution' => array(self::BELONGS_TO, 'Execution', 'authoring_workflow_execution_id'),
            'clonedFrom' => array(self::BELONGS_TO, 'VizView', 'cloned_from_id'),
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
            'source' => Yii::t('model', 'Source'),
            'authoring_workflow_execution_id' => Yii::t('model', 'Authoring Workflow Execution'),
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
        $criteria->compare('t.version', $this->version);
        $criteria->compare('t.cloned_from_id', $this->cloned_from_id);
        $criteria->compare('t.slug', $this->slug, true);
        $criteria->compare('t.question', $this->question, true);
        $criteria->compare('t.source', $this->source, true);
        $criteria->compare('t.authoring_workflow_execution_id', $this->authoring_workflow_execution_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
