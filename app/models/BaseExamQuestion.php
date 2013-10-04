<?php

/**
 * This is the model base class for the table "exam_question".
 *
 * Columns in table "exam_question" available as properties of the model:
 * @property string $id
 * @property string $slug
 * @property string $question
 * @property string $source
 * @property string $created
 * @property string $modified
 *
 * Relations of table "exam_question" available as properties of the model:
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
                array('slug, question, source, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('slug, source', 'length', 'max' => 255),
                array('question, created, modified', 'safe'),
                array('id, slug, question, source, created, modified', 'safe', 'on' => 'search'),
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
            'examQuestionAlternatives' => array(self::HAS_MANY, 'ExamQuestionAlternative', 'exam_question_id'),
            'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'exam_question_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'slug' => Yii::t('model', 'Slug'),
            'question' => Yii::t('model', 'Question'),
            'source' => Yii::t('model', 'Source'),
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
        $criteria->compare('t.slug', $this->slug, true);
        $criteria->compare('t.question', $this->question, true);
        $criteria->compare('t.source', $this->source, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
