<?php

/**
 * This is the model base class for the table "exam_question".
 *
 * Columns in table "exam_question" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $slug_en
 * @property string $question_en
 * @property string $source_node_id
 * @property string $authoring_workflow_execution_id
 * @property string $created
 * @property string $modified
 * @property string $node_id
 * @property string $slug_es
 * @property string $slug_fa
 * @property string $slug_hi
 * @property string $slug_pt
 * @property string $slug_sv
 * @property string $slug_cn
 * @property string $slug_de
 * @property string $question_es
 * @property string $question_fa
 * @property string $question_hi
 * @property string $question_pt
 * @property string $question_sv
 * @property string $question_cn
 * @property string $question_de
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
                array('version, cloned_from_id, slug_en, question_en, source_node_id, authoring_workflow_execution_id, created, modified, node_id, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, question_es, question_fa, question_hi, question_pt, question_sv, question_cn, question_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, source_node_id, node_id', 'length', 'max' => 20),
                array('slug_en, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'length', 'max' => 255),
                array('authoring_workflow_execution_id', 'length', 'max' => 10),
                array('question_en, created, modified, question_es, question_fa, question_hi, question_pt, question_sv, question_cn, question_de', 'safe'),
                array('id, version, cloned_from_id, slug_en, question_en, source_node_id, authoring_workflow_execution_id, created, modified, node_id, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, question_es, question_fa, question_hi, question_pt, question_sv, question_cn, question_de', 'safe', 'on' => 'search'),
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
            'slug_en' => Yii::t('model', 'Slug En'),
            'question_en' => Yii::t('model', 'Question En'),
            'source_node_id' => Yii::t('model', 'Source Node'),
            'authoring_workflow_execution_id' => Yii::t('model', 'Authoring Workflow Execution'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'node_id' => Yii::t('model', 'Node'),
            'slug_es' => Yii::t('model', 'Slug Es'),
            'slug_fa' => Yii::t('model', 'Slug Fa'),
            'slug_hi' => Yii::t('model', 'Slug Hi'),
            'slug_pt' => Yii::t('model', 'Slug Pt'),
            'slug_sv' => Yii::t('model', 'Slug Sv'),
            'slug_cn' => Yii::t('model', 'Slug Cn'),
            'slug_de' => Yii::t('model', 'Slug De'),
            'question_es' => Yii::t('model', 'Question Es'),
            'question_fa' => Yii::t('model', 'Question Fa'),
            'question_hi' => Yii::t('model', 'Question Hi'),
            'question_pt' => Yii::t('model', 'Question Pt'),
            'question_sv' => Yii::t('model', 'Question Sv'),
            'question_cn' => Yii::t('model', 'Question Cn'),
            'question_de' => Yii::t('model', 'Question De'),
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
        $criteria->compare('t.slug_en', $this->slug_en, true);
        $criteria->compare('t.question_en', $this->question_en, true);
        $criteria->compare('t.source_node_id', $this->source_node_id);
        $criteria->compare('t.authoring_workflow_execution_id', $this->authoring_workflow_execution_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.slug_es', $this->slug_es, true);
        $criteria->compare('t.slug_fa', $this->slug_fa, true);
        $criteria->compare('t.slug_hi', $this->slug_hi, true);
        $criteria->compare('t.slug_pt', $this->slug_pt, true);
        $criteria->compare('t.slug_sv', $this->slug_sv, true);
        $criteria->compare('t.slug_cn', $this->slug_cn, true);
        $criteria->compare('t.slug_de', $this->slug_de, true);
        $criteria->compare('t.question_es', $this->question_es, true);
        $criteria->compare('t.question_fa', $this->question_fa, true);
        $criteria->compare('t.question_hi', $this->question_hi, true);
        $criteria->compare('t.question_pt', $this->question_pt, true);
        $criteria->compare('t.question_sv', $this->question_sv, true);
        $criteria->compare('t.question_cn', $this->question_cn, true);
        $criteria->compare('t.question_de', $this->question_de, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
