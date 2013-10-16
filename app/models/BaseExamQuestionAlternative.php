<?php

/**
 * This is the model base class for the table "exam_question_alternative".
 *
 * Columns in table "exam_question_alternative" available as properties of the model:
 * @property string $id
 * @property string $slug
 * @property string $markup
 * @property integer $correct
 * @property string $exam_question_id
 * @property string $created
 * @property string $modified
 * @property string $node_id
 *
 * Relations of table "exam_question_alternative" available as properties of the model:
 * @property ExamQuestion $examQuestion
 * @property Node $node
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
                array('slug, markup, correct, exam_question_id, created, modified, node_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('correct', 'numerical', 'integerOnly' => true),
                array('slug', 'length', 'max' => 255),
                array('exam_question_id, node_id', 'length', 'max' => 20),
                array('markup, created, modified', 'safe'),
                array('id, slug, markup, correct, exam_question_id, created, modified, node_id', 'safe', 'on' => 'search'),
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
        return array(
            'examQuestion' => array(self::BELONGS_TO, 'ExamQuestion', 'exam_question_id'),
            'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'slug' => Yii::t('model', 'Slug'),
            'markup' => Yii::t('model', 'Markup'),
            'correct' => Yii::t('model', 'Correct'),
            'exam_question_id' => Yii::t('model', 'Exam Question'),
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
        $criteria->compare('t.slug', $this->slug, true);
        $criteria->compare('t.markup', $this->markup, true);
        $criteria->compare('t.correct', $this->correct);
        $criteria->compare('t.exam_question_id', $this->exam_question_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.node_id', $this->node_id);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
