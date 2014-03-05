<?php

/**
 * This is the model base class for the table "exam_question_alternative".
 *
 * Columns in table "exam_question_alternative" available as properties of the model:
 * @property string $id
 * @property string $slug
 * @property string $_markup
 * @property integer $correct
 * @property string $exam_question_id
 * @property string $created
 * @property string $modified
 * @property integer $owner_id
 * @property string $node_id
 * @property string $exam_question_alternative_qa_state_id
 *
 * Relations of table "exam_question_alternative" available as properties of the model:
 * @property ExamQuestionAlternativeQaState $examQuestionAlternativeQaState
 * @property ExamQuestion $examQuestion
 * @property Node $node
 * @property Users $owner
 */
abstract class BaseExamQuestionAlternative extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'exam_question_alternative';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('slug, _markup, correct, exam_question_id, created, modified, owner_id, node_id, exam_question_alternative_qa_state_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('correct, owner_id', 'numerical', 'integerOnly' => true),
                array('slug', 'length', 'max' => 255),
                array('exam_question_id, node_id, exam_question_alternative_qa_state_id', 'length', 'max' => 20),
                array('_markup, created, modified', 'safe'),
                array('id, slug, _markup, correct, exam_question_id, created, modified, owner_id, node_id, exam_question_alternative_qa_state_id', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->slug;
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
                'examQuestionAlternativeQaState' => array(self::BELONGS_TO, 'ExamQuestionAlternativeQaState', 'exam_question_alternative_qa_state_id'),
                'examQuestion' => array(self::BELONGS_TO, 'ExamQuestion', 'exam_question_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'owner' => array(self::BELONGS_TO, 'Users', 'owner_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'slug' => Yii::t('model', 'Slug'),
            '_markup' => Yii::t('model', 'Markup'),
            'correct' => Yii::t('model', 'Correct'),
            'exam_question_id' => Yii::t('model', 'Exam Question'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'owner_id' => Yii::t('model', 'Owner'),
            'node_id' => Yii::t('model', 'Node'),
            'exam_question_alternative_qa_state_id' => Yii::t('model', 'Exam Question Alternative Qa State'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.slug', $this->slug, true);
        $criteria->compare('t._markup', $this->_markup, true);
        $criteria->compare('t.correct', $this->correct);
        $criteria->compare('t.exam_question_id', $this->exam_question_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.owner_id', $this->owner_id);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.exam_question_alternative_qa_state_id', $this->exam_question_alternative_qa_state_id);


        return $criteria;

    }

}
