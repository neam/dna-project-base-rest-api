<?php

/**
 * This is the model base class for the table "chapter".
 *
 * Columns in table "chapter" available as properties of the model:
 * @property string $id
 * @property string $title_en
 * @property string $slug_en
 * @property integer $thumbnail_media_id
 * @property string $about
 * @property string $authoring_workflow_execution_id
 * @property string $created
 * @property string $modified
 * @property string $title_es
 * @property string $title_fa
 * @property string $title_hi
 * @property string $title_pt
 * @property string $title_sv
 * @property string $title_cn
 * @property string $title_de
 * @property string $slug_es
 * @property string $slug_fa
 * @property string $slug_hi
 * @property string $slug_pt
 * @property string $slug_sv
 * @property string $slug_cn
 * @property string $slug_de
 *
 * Relations of table "chapter" available as properties of the model:
 * @property P3Media $thumbnailMedia
 * @property Execution $authoringWorkflowExecution
 * @property Section[] $sections
 */
abstract class BaseChapter extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'chapter';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('title_en, slug_en, thumbnail_media_id, about, authoring_workflow_execution_id, created, modified, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('thumbnail_media_id', 'numerical', 'integerOnly' => true),
                array('title_en, slug_en, about, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'length', 'max' => 255),
                array('authoring_workflow_execution_id', 'length', 'max' => 10),
                array('created, modified', 'safe'),
                array('id, title_en, slug_en, thumbnail_media_id, about, authoring_workflow_execution_id, created, modified, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'safe', 'on' => 'search'),
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
                    'class' => '\GtcSaveRelationsBehavior'
                )
            )
        );
    }

    public function relations()
    {
        return array(
            'thumbnailMedia' => array(self::BELONGS_TO, 'P3Media', 'thumbnail_media_id'),
            'authoringWorkflowExecution' => array(self::BELONGS_TO, 'Execution', 'authoring_workflow_execution_id'),
            'sections' => array(self::HAS_MANY, 'Section', 'chapter_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'title_en' => Yii::t('model', 'Title En'),
            'slug_en' => Yii::t('model', 'Slug En'),
            'thumbnail_media_id' => Yii::t('model', 'Thumbnail Media'),
            'about' => Yii::t('model', 'About'),
            'authoring_workflow_execution_id' => Yii::t('model', 'Authoring Workflow Execution'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'title_es' => Yii::t('model', 'Title Es'),
            'title_fa' => Yii::t('model', 'Title Fa'),
            'title_hi' => Yii::t('model', 'Title Hi'),
            'title_pt' => Yii::t('model', 'Title Pt'),
            'title_sv' => Yii::t('model', 'Title Sv'),
            'title_cn' => Yii::t('model', 'Title Cn'),
            'title_de' => Yii::t('model', 'Title De'),
            'slug_es' => Yii::t('model', 'Slug Es'),
            'slug_fa' => Yii::t('model', 'Slug Fa'),
            'slug_hi' => Yii::t('model', 'Slug Hi'),
            'slug_pt' => Yii::t('model', 'Slug Pt'),
            'slug_sv' => Yii::t('model', 'Slug Sv'),
            'slug_cn' => Yii::t('model', 'Slug Cn'),
            'slug_de' => Yii::t('model', 'Slug De'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.title_en', $this->title_en, true);
        $criteria->compare('t.slug_en', $this->slug_en, true);
        $criteria->compare('t.thumbnail_media_id', $this->thumbnail_media_id);
        $criteria->compare('t.about', $this->about, true);
        $criteria->compare('t.authoring_workflow_execution_id', $this->authoring_workflow_execution_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.title_es', $this->title_es, true);
        $criteria->compare('t.title_fa', $this->title_fa, true);
        $criteria->compare('t.title_hi', $this->title_hi, true);
        $criteria->compare('t.title_pt', $this->title_pt, true);
        $criteria->compare('t.title_sv', $this->title_sv, true);
        $criteria->compare('t.title_cn', $this->title_cn, true);
        $criteria->compare('t.title_de', $this->title_de, true);
        $criteria->compare('t.slug_es', $this->slug_es, true);
        $criteria->compare('t.slug_fa', $this->slug_fa, true);
        $criteria->compare('t.slug_hi', $this->slug_hi, true);
        $criteria->compare('t.slug_pt', $this->slug_pt, true);
        $criteria->compare('t.slug_sv', $this->slug_sv, true);
        $criteria->compare('t.slug_cn', $this->slug_cn, true);
        $criteria->compare('t.slug_de', $this->slug_de, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
