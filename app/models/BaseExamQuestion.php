<?php

/**
 * This is the model base class for the table "exam_question".
 *
 * Columns in table "exam_question" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $slug_en
 * @property string $_question
 * @property string $source_node_id
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
 * @property string $exam_question_qa_state_id_en
 * @property string $exam_question_qa_state_id_es
 * @property string $exam_question_qa_state_id_fa
 * @property string $exam_question_qa_state_id_hi
 * @property string $exam_question_qa_state_id_pt
 * @property string $exam_question_qa_state_id_sv
 * @property string $exam_question_qa_state_id_cn
 * @property string $exam_question_qa_state_id_de
 *
 * Relations of table "exam_question" available as properties of the model:
 * @property ExamQuestionQaState $examQuestionQaStateIdEn
 * @property ExamQuestionQaState $examQuestionQaStateIdCn
 * @property ExamQuestionQaState $examQuestionQaStateIdDe
 * @property ExamQuestionQaState $examQuestionQaStateIdEs
 * @property ExamQuestionQaState $examQuestionQaStateIdFa
 * @property ExamQuestionQaState $examQuestionQaStateIdHi
 * @property ExamQuestionQaState $examQuestionQaStateIdPt
 * @property ExamQuestionQaState $examQuestionQaStateIdSv
 * @property Snapshot $clonedFrom
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
                array('version, cloned_from_id, slug_en, _question, source_node_id, created, modified, node_id, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, exam_question_qa_state_id_en, exam_question_qa_state_id_es, exam_question_qa_state_id_fa, exam_question_qa_state_id_hi, exam_question_qa_state_id_pt, exam_question_qa_state_id_sv, exam_question_qa_state_id_cn, exam_question_qa_state_id_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, source_node_id, node_id, exam_question_qa_state_id_en, exam_question_qa_state_id_es, exam_question_qa_state_id_fa, exam_question_qa_state_id_hi, exam_question_qa_state_id_pt, exam_question_qa_state_id_sv, exam_question_qa_state_id_cn, exam_question_qa_state_id_de', 'length', 'max' => 20),
                array('slug_en, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'length', 'max' => 255),
                array('_question, created, modified', 'safe'),
                array('id, version, cloned_from_id, slug_en, _question, source_node_id, created, modified, node_id, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, exam_question_qa_state_id_en, exam_question_qa_state_id_es, exam_question_qa_state_id_fa, exam_question_qa_state_id_hi, exam_question_qa_state_id_pt, exam_question_qa_state_id_sv, exam_question_qa_state_id_cn, exam_question_qa_state_id_de', 'safe', 'on' => 'search'),
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
        return array_merge(
            parent::relations(), array(
                'examQuestionQaStateIdEn' => array(self::BELONGS_TO, 'ExamQuestionQaState', 'exam_question_qa_state_id_en'),
                'examQuestionQaStateIdCn' => array(self::BELONGS_TO, 'ExamQuestionQaState', 'exam_question_qa_state_id_cn'),
                'examQuestionQaStateIdDe' => array(self::BELONGS_TO, 'ExamQuestionQaState', 'exam_question_qa_state_id_de'),
                'examQuestionQaStateIdEs' => array(self::BELONGS_TO, 'ExamQuestionQaState', 'exam_question_qa_state_id_es'),
                'examQuestionQaStateIdFa' => array(self::BELONGS_TO, 'ExamQuestionQaState', 'exam_question_qa_state_id_fa'),
                'examQuestionQaStateIdHi' => array(self::BELONGS_TO, 'ExamQuestionQaState', 'exam_question_qa_state_id_hi'),
                'examQuestionQaStateIdPt' => array(self::BELONGS_TO, 'ExamQuestionQaState', 'exam_question_qa_state_id_pt'),
                'examQuestionQaStateIdSv' => array(self::BELONGS_TO, 'ExamQuestionQaState', 'exam_question_qa_state_id_sv'),
                'clonedFrom' => array(self::BELONGS_TO, 'Snapshot', 'cloned_from_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'sourceNode' => array(self::BELONGS_TO, 'Node', 'source_node_id'),
                'examQuestionAlternatives' => array(self::HAS_MANY, 'ExamQuestionAlternative', 'exam_question_id'),
                'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'exam_question_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'cloned_from_id' => Yii::t('model', 'Cloned From'),
            'slug_en' => Yii::t('model', 'Slug En'),
            '_question' => Yii::t('model', 'Question'),
            'source_node_id' => Yii::t('model', 'Source Node'),
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
            'exam_question_qa_state_id_en' => Yii::t('model', 'Exam Question Qa State Id En'),
            'exam_question_qa_state_id_es' => Yii::t('model', 'Exam Question Qa State Id Es'),
            'exam_question_qa_state_id_fa' => Yii::t('model', 'Exam Question Qa State Id Fa'),
            'exam_question_qa_state_id_hi' => Yii::t('model', 'Exam Question Qa State Id Hi'),
            'exam_question_qa_state_id_pt' => Yii::t('model', 'Exam Question Qa State Id Pt'),
            'exam_question_qa_state_id_sv' => Yii::t('model', 'Exam Question Qa State Id Sv'),
            'exam_question_qa_state_id_cn' => Yii::t('model', 'Exam Question Qa State Id Cn'),
            'exam_question_qa_state_id_de' => Yii::t('model', 'Exam Question Qa State Id De'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.version', $this->version);
        $criteria->compare('t.cloned_from_id', $this->cloned_from_id);
        $criteria->compare('t.slug_en', $this->slug_en, true);
        $criteria->compare('t._question', $this->_question, true);
        $criteria->compare('t.source_node_id', $this->source_node_id);
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
        $criteria->compare('t.exam_question_qa_state_id_en', $this->exam_question_qa_state_id_en);
        $criteria->compare('t.exam_question_qa_state_id_es', $this->exam_question_qa_state_id_es);
        $criteria->compare('t.exam_question_qa_state_id_fa', $this->exam_question_qa_state_id_fa);
        $criteria->compare('t.exam_question_qa_state_id_hi', $this->exam_question_qa_state_id_hi);
        $criteria->compare('t.exam_question_qa_state_id_pt', $this->exam_question_qa_state_id_pt);
        $criteria->compare('t.exam_question_qa_state_id_sv', $this->exam_question_qa_state_id_sv);
        $criteria->compare('t.exam_question_qa_state_id_cn', $this->exam_question_qa_state_id_cn);
        $criteria->compare('t.exam_question_qa_state_id_de', $this->exam_question_qa_state_id_de);


        return $criteria;

    }

}
