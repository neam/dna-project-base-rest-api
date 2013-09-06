<?php

/**
 * This is the model base class for the table "teachers_guide".
 *
 * Columns in table "teachers_guide" available as properties of the model:
 * @property string $id
 * @property string $title_en
 * @property string $created
 * @property string $modified
 * @property string $title_es
 * @property string $title_fa
 * @property string $title_hi
 * @property string $title_pt
 * @property string $title_sv
 * @property string $title_de
 * @property string $title_cn
 *
 * Relations of table "teachers_guide" available as properties of the model:
 * @property SectionContent[] $sectionContents
 */
abstract class BaseTeachersGuide extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'teachers_guide';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('title_en, created, modified, title_es, title_fa, title_hi, title_pt, title_sv, title_de, title_cn', 'default', 'setOnEmpty' => true, 'value' => null),
                array('title_en, title_es, title_fa, title_hi, title_pt, title_sv, title_de, title_cn', 'length', 'max' => 255),
                array('created, modified', 'safe'),
                array('id, title_en, created, modified, title_es, title_fa, title_hi, title_pt, title_sv, title_de, title_cn', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->title_en;
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
            'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'teachers_guide_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('crud', 'ID'),
            'title_en' => Yii::t('crud', 'Title En'),
            'created' => Yii::t('crud', 'Created'),
            'modified' => Yii::t('crud', 'Modified'),
            'title_es' => Yii::t('crud', 'Title Es'),
            'title_fa' => Yii::t('crud', 'Title Fa'),
            'title_hi' => Yii::t('crud', 'Title Hi'),
            'title_pt' => Yii::t('crud', 'Title Pt'),
            'title_sv' => Yii::t('crud', 'Title Sv'),
            'title_de' => Yii::t('crud', 'Title De'),
            'title_cn' => Yii::t('crud', 'Title Cn'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.title_en', $this->title_en, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.title_es', $this->title_es, true);
        $criteria->compare('t.title_fa', $this->title_fa, true);
        $criteria->compare('t.title_hi', $this->title_hi, true);
        $criteria->compare('t.title_pt', $this->title_pt, true);
        $criteria->compare('t.title_sv', $this->title_sv, true);
        $criteria->compare('t.title_de', $this->title_de, true);
        $criteria->compare('t.title_cn', $this->title_cn, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
