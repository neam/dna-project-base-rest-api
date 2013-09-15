<?php

/**
 * This is the model base class for the table "video_file".
 *
 * Columns in table "video_file" available as properties of the model:
 * @property string $id
 * @property string $title_en
 * @property string $subtitles_en
 * @property integer $original_media_id
 * @property integer $generate_processed_media
 * @property integer $processed_media_id_en
 * @property string $authoring_workflow_execution_id
 * @property string $translation_workflow_execution_id_en
 * @property string $created
 * @property string $modified
 * @property string $title_es
 * @property string $title_fa
 * @property string $title_hi
 * @property string $title_pt
 * @property string $title_sv
 * @property string $title_cn
 * @property string $title_de
 * @property string $subtitles_es
 * @property string $subtitles_fa
 * @property string $subtitles_hi
 * @property string $subtitles_pt
 * @property string $subtitles_sv
 * @property string $subtitles_cn
 * @property string $subtitles_de
 * @property integer $processed_media_id_es
 * @property integer $processed_media_id_fa
 * @property integer $processed_media_id_hi
 * @property integer $processed_media_id_pt
 * @property integer $processed_media_id_sv
 * @property integer $processed_media_id_cn
 * @property integer $processed_media_id_de
 * @property string $translation_workflow_execution_id_es
 * @property string $translation_workflow_execution_id_fa
 * @property string $translation_workflow_execution_id_hi
 * @property string $translation_workflow_execution_id_pt
 * @property string $translation_workflow_execution_id_sv
 * @property string $translation_workflow_execution_id_cn
 * @property string $translation_workflow_execution_id_de
 *
 * Relations of table "video_file" available as properties of the model:
 * @property SectionContent[] $sectionContents
 * @property Execution $translationWorkflowExecutionIdDe
 * @property Execution $translationWorkflowExecutionIdEn
 * @property Execution $translationWorkflowExecutionIdCn
 * @property Execution $translationWorkflowExecutionIdEs
 * @property Execution $translationWorkflowExecutionIdFa
 * @property Execution $translationWorkflowExecutionIdHi
 * @property Execution $translationWorkflowExecutionIdPt
 * @property Execution $translationWorkflowExecutionIdSv
 * @property Execution $authoringWorkflowExecution
 * @property P3Media $originalMedia
 * @property P3Media $processedMediaIdEn
 * @property P3Media $processedMediaIdCn
 * @property P3Media $processedMediaIdDe
 * @property P3Media $processedMediaIdEs
 * @property P3Media $processedMediaIdFa
 * @property P3Media $processedMediaIdHi
 * @property P3Media $processedMediaIdPt
 * @property P3Media $processedMediaIdSv
 */
abstract class BaseVideoFile extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'video_file';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('title_en, subtitles_en, original_media_id, generate_processed_media, processed_media_id_en, authoring_workflow_execution_id, translation_workflow_execution_id_en, created, modified, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, subtitles_es, subtitles_fa, subtitles_hi, subtitles_pt, subtitles_sv, subtitles_cn, subtitles_de, processed_media_id_es, processed_media_id_fa, processed_media_id_hi, processed_media_id_pt, processed_media_id_sv, processed_media_id_cn, processed_media_id_de, translation_workflow_execution_id_es, translation_workflow_execution_id_fa, translation_workflow_execution_id_hi, translation_workflow_execution_id_pt, translation_workflow_execution_id_sv, translation_workflow_execution_id_cn, translation_workflow_execution_id_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('original_media_id, generate_processed_media, processed_media_id_en, processed_media_id_es, processed_media_id_fa, processed_media_id_hi, processed_media_id_pt, processed_media_id_sv, processed_media_id_cn, processed_media_id_de', 'numerical', 'integerOnly' => true),
                array('title_en, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de', 'length', 'max' => 255),
                array('authoring_workflow_execution_id, translation_workflow_execution_id_en, translation_workflow_execution_id_es, translation_workflow_execution_id_fa, translation_workflow_execution_id_hi, translation_workflow_execution_id_pt, translation_workflow_execution_id_sv, translation_workflow_execution_id_cn, translation_workflow_execution_id_de', 'length', 'max' => 10),
                array('subtitles_en, created, modified, subtitles_es, subtitles_fa, subtitles_hi, subtitles_pt, subtitles_sv, subtitles_cn, subtitles_de', 'safe'),
                array('id, title_en, subtitles_en, original_media_id, generate_processed_media, processed_media_id_en, authoring_workflow_execution_id, translation_workflow_execution_id_en, created, modified, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, subtitles_es, subtitles_fa, subtitles_hi, subtitles_pt, subtitles_sv, subtitles_cn, subtitles_de, processed_media_id_es, processed_media_id_fa, processed_media_id_hi, processed_media_id_pt, processed_media_id_sv, processed_media_id_cn, processed_media_id_de, translation_workflow_execution_id_es, translation_workflow_execution_id_fa, translation_workflow_execution_id_hi, translation_workflow_execution_id_pt, translation_workflow_execution_id_sv, translation_workflow_execution_id_cn, translation_workflow_execution_id_de', 'safe', 'on' => 'search'),
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
            'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'video_file_id'),
            'translationWorkflowExecutionIdDe' => array(self::BELONGS_TO, 'Execution', 'translation_workflow_execution_id_de'),
            'translationWorkflowExecutionIdEn' => array(self::BELONGS_TO, 'Execution', 'translation_workflow_execution_id_en'),
            'translationWorkflowExecutionIdCn' => array(self::BELONGS_TO, 'Execution', 'translation_workflow_execution_id_cn'),
            'translationWorkflowExecutionIdEs' => array(self::BELONGS_TO, 'Execution', 'translation_workflow_execution_id_es'),
            'translationWorkflowExecutionIdFa' => array(self::BELONGS_TO, 'Execution', 'translation_workflow_execution_id_fa'),
            'translationWorkflowExecutionIdHi' => array(self::BELONGS_TO, 'Execution', 'translation_workflow_execution_id_hi'),
            'translationWorkflowExecutionIdPt' => array(self::BELONGS_TO, 'Execution', 'translation_workflow_execution_id_pt'),
            'translationWorkflowExecutionIdSv' => array(self::BELONGS_TO, 'Execution', 'translation_workflow_execution_id_sv'),
            'authoringWorkflowExecution' => array(self::BELONGS_TO, 'Execution', 'authoring_workflow_execution_id'),
            'originalMedia' => array(self::BELONGS_TO, 'P3Media', 'original_media_id'),
            'processedMediaIdEn' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_en'),
            'processedMediaIdCn' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_cn'),
            'processedMediaIdDe' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_de'),
            'processedMediaIdEs' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_es'),
            'processedMediaIdFa' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_fa'),
            'processedMediaIdHi' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_hi'),
            'processedMediaIdPt' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_pt'),
            'processedMediaIdSv' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_sv'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('crud', 'ID'),
            'title_en' => Yii::t('crud', 'Title En'),
            'subtitles_en' => Yii::t('crud', 'Subtitles En'),
            'original_media_id' => Yii::t('crud', 'Original Media'),
            'generate_processed_media' => Yii::t('crud', 'Generate Processed Media'),
            'processed_media_id_en' => Yii::t('crud', 'Processed Media Id En'),
            'authoring_workflow_execution_id' => Yii::t('crud', 'Authoring Workflow Execution'),
            'translation_workflow_execution_id_en' => Yii::t('crud', 'Translation Workflow Execution Id En'),
            'created' => Yii::t('crud', 'Created'),
            'modified' => Yii::t('crud', 'Modified'),
            'title_es' => Yii::t('crud', 'Title Es'),
            'title_fa' => Yii::t('crud', 'Title Fa'),
            'title_hi' => Yii::t('crud', 'Title Hi'),
            'title_pt' => Yii::t('crud', 'Title Pt'),
            'title_sv' => Yii::t('crud', 'Title Sv'),
            'title_cn' => Yii::t('crud', 'Title Cn'),
            'title_de' => Yii::t('crud', 'Title De'),
            'subtitles_es' => Yii::t('crud', 'Subtitles Es'),
            'subtitles_fa' => Yii::t('crud', 'Subtitles Fa'),
            'subtitles_hi' => Yii::t('crud', 'Subtitles Hi'),
            'subtitles_pt' => Yii::t('crud', 'Subtitles Pt'),
            'subtitles_sv' => Yii::t('crud', 'Subtitles Sv'),
            'subtitles_cn' => Yii::t('crud', 'Subtitles Cn'),
            'subtitles_de' => Yii::t('crud', 'Subtitles De'),
            'processed_media_id_es' => Yii::t('crud', 'Processed Media Id Es'),
            'processed_media_id_fa' => Yii::t('crud', 'Processed Media Id Fa'),
            'processed_media_id_hi' => Yii::t('crud', 'Processed Media Id Hi'),
            'processed_media_id_pt' => Yii::t('crud', 'Processed Media Id Pt'),
            'processed_media_id_sv' => Yii::t('crud', 'Processed Media Id Sv'),
            'processed_media_id_cn' => Yii::t('crud', 'Processed Media Id Cn'),
            'processed_media_id_de' => Yii::t('crud', 'Processed Media Id De'),
            'translation_workflow_execution_id_es' => Yii::t('crud', 'Translation Workflow Execution Id Es'),
            'translation_workflow_execution_id_fa' => Yii::t('crud', 'Translation Workflow Execution Id Fa'),
            'translation_workflow_execution_id_hi' => Yii::t('crud', 'Translation Workflow Execution Id Hi'),
            'translation_workflow_execution_id_pt' => Yii::t('crud', 'Translation Workflow Execution Id Pt'),
            'translation_workflow_execution_id_sv' => Yii::t('crud', 'Translation Workflow Execution Id Sv'),
            'translation_workflow_execution_id_cn' => Yii::t('crud', 'Translation Workflow Execution Id Cn'),
            'translation_workflow_execution_id_de' => Yii::t('crud', 'Translation Workflow Execution Id De'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.title_en', $this->title_en, true);
        $criteria->compare('t.subtitles_en', $this->subtitles_en, true);
        $criteria->compare('t.original_media_id', $this->original_media_id);
        $criteria->compare('t.generate_processed_media', $this->generate_processed_media);
        $criteria->compare('t.processed_media_id_en', $this->processed_media_id_en);
        $criteria->compare('t.authoring_workflow_execution_id', $this->authoring_workflow_execution_id);
        $criteria->compare('t.translation_workflow_execution_id_en', $this->translation_workflow_execution_id_en);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.title_es', $this->title_es, true);
        $criteria->compare('t.title_fa', $this->title_fa, true);
        $criteria->compare('t.title_hi', $this->title_hi, true);
        $criteria->compare('t.title_pt', $this->title_pt, true);
        $criteria->compare('t.title_sv', $this->title_sv, true);
        $criteria->compare('t.title_cn', $this->title_cn, true);
        $criteria->compare('t.title_de', $this->title_de, true);
        $criteria->compare('t.subtitles_es', $this->subtitles_es, true);
        $criteria->compare('t.subtitles_fa', $this->subtitles_fa, true);
        $criteria->compare('t.subtitles_hi', $this->subtitles_hi, true);
        $criteria->compare('t.subtitles_pt', $this->subtitles_pt, true);
        $criteria->compare('t.subtitles_sv', $this->subtitles_sv, true);
        $criteria->compare('t.subtitles_cn', $this->subtitles_cn, true);
        $criteria->compare('t.subtitles_de', $this->subtitles_de, true);
        $criteria->compare('t.processed_media_id_es', $this->processed_media_id_es);
        $criteria->compare('t.processed_media_id_fa', $this->processed_media_id_fa);
        $criteria->compare('t.processed_media_id_hi', $this->processed_media_id_hi);
        $criteria->compare('t.processed_media_id_pt', $this->processed_media_id_pt);
        $criteria->compare('t.processed_media_id_sv', $this->processed_media_id_sv);
        $criteria->compare('t.processed_media_id_cn', $this->processed_media_id_cn);
        $criteria->compare('t.processed_media_id_de', $this->processed_media_id_de);
        $criteria->compare('t.translation_workflow_execution_id_es', $this->translation_workflow_execution_id_es);
        $criteria->compare('t.translation_workflow_execution_id_fa', $this->translation_workflow_execution_id_fa);
        $criteria->compare('t.translation_workflow_execution_id_hi', $this->translation_workflow_execution_id_hi);
        $criteria->compare('t.translation_workflow_execution_id_pt', $this->translation_workflow_execution_id_pt);
        $criteria->compare('t.translation_workflow_execution_id_sv', $this->translation_workflow_execution_id_sv);
        $criteria->compare('t.translation_workflow_execution_id_cn', $this->translation_workflow_execution_id_cn);
        $criteria->compare('t.translation_workflow_execution_id_de', $this->translation_workflow_execution_id_de);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
