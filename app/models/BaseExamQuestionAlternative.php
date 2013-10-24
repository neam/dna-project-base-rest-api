<?php

/**
 * This is the model base class for the table "exam_question_alternative".
 *
 * Columns in table "exam_question_alternative" available as properties of the model:
 * @property string $id
 * @property string $slug
 * @property string $markup_en
 * @property integer $correct
 * @property string $exam_question_id
 * @property string $created
 * @property string $modified
 * @property string $node_id
 * @property string $markup_es
 * @property string $markup_fa
 * @property string $markup_hi
 * @property string $markup_pt
 * @property string $markup_sv
 * @property string $markup_cn
 * @property string $markup_de
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
                array('slug, markup_en, correct, exam_question_id, created, modified, node_id, markup_es, markup_fa, markup_hi, markup_pt, markup_sv, markup_cn, markup_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('correct', 'numerical', 'integerOnly' => true),
                array('slug', 'length', 'max' => 255),
                array('exam_question_id, node_id', 'length', 'max' => 20),
                array('markup_en, created, modified, markup_es, markup_fa, markup_hi, markup_pt, markup_sv, markup_cn, markup_de', 'safe'),
                array('id, slug, markup_en, correct, exam_question_id, created, modified, node_id, markup_es, markup_fa, markup_hi, markup_pt, markup_sv, markup_cn, markup_de', 'safe', 'on' => 'search'),
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
                'examQuestion' => array(self::BELONGS_TO, 'ExamQuestion', 'exam_question_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'slug' => Yii::t('model', 'Slug'),
            'markup_en' => Yii::t('model', 'Markup En'),
            'correct' => Yii::t('model', 'Correct'),
            'exam_question_id' => Yii::t('model', 'Exam Question'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'node_id' => Yii::t('model', 'Node'),
            'markup_es' => Yii::t('model', 'Markup Es'),
            'markup_fa' => Yii::t('model', 'Markup Fa'),
            'markup_hi' => Yii::t('model', 'Markup Hi'),
            'markup_pt' => Yii::t('model', 'Markup Pt'),
            'markup_sv' => Yii::t('model', 'Markup Sv'),
            'markup_cn' => Yii::t('model', 'Markup Cn'),
            'markup_de' => Yii::t('model', 'Markup De'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.slug', $this->slug, true);
        $criteria->compare('t.markup_en', $this->markup_en, true);
        $criteria->compare('t.correct', $this->correct);
        $criteria->compare('t.exam_question_id', $this->exam_question_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.markup_es', $this->markup_es, true);
        $criteria->compare('t.markup_fa', $this->markup_fa, true);
        $criteria->compare('t.markup_hi', $this->markup_hi, true);
        $criteria->compare('t.markup_pt', $this->markup_pt, true);
        $criteria->compare('t.markup_sv', $this->markup_sv, true);
        $criteria->compare('t.markup_cn', $this->markup_cn, true);
        $criteria->compare('t.markup_de', $this->markup_de, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
