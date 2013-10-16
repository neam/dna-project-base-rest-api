<?php

/**
 * This is the model base class for the table "data_source".
 *
 * Columns in table "data_source" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $title_en
 * @property string $slug
 * @property string $about
 * @property integer $logo_media_id
 * @property integer $mini_logo_media_id
 * @property string $link
 * @property string $authoring_workflow_execution_id
 * @property string $created
 * @property string $modified
 * @property string $node_id
 * @property string $title_es
 * @property string $title_fa
 * @property string $title_hi
 * @property string $title_pt
 * @property string $title_sv
 * @property string $title_cn
 * @property string $title_de
 *
 * Relations of table "data_source" available as properties of the model:
 * @property DataChunk[] $dataChunks
 * @property Snapshot $clonedFrom
 * @property EzcExecution $authoringWorkflowExecution
 * @property Node $node
 * @property P3Media $logoMedia
 * @property P3Media $miniLogoMedia
 * @property SpreadsheetFile[] $spreadsheetFiles
 */
abstract class BaseDataSource extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'data_source';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, title_en, slug, about, logo_media_id, mini_logo_media_id, link, authoring_workflow_execution_id, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, logo_media_id, mini_logo_media_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, node_id', 'length', 'max' => 20),
                array('title_en, slug, link, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de', 'length', 'max' => 255),
                array('authoring_workflow_execution_id', 'length', 'max' => 10),
                array('about, created, modified', 'safe'),
                array('id, version, cloned_from_id, title_en, slug, about, logo_media_id, mini_logo_media_id, link, authoring_workflow_execution_id, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de', 'safe', 'on' => 'search'),
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
            'dataChunks' => array(self::HAS_MANY, 'DataChunk', 'data_source_id'),
            'clonedFrom' => array(self::BELONGS_TO, 'Snapshot', 'cloned_from_id'),
            'authoringWorkflowExecution' => array(self::BELONGS_TO, 'EzcExecution', 'authoring_workflow_execution_id'),
            'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
            'logoMedia' => array(self::BELONGS_TO, 'P3Media', 'logo_media_id'),
            'miniLogoMedia' => array(self::BELONGS_TO, 'P3Media', 'mini_logo_media_id'),
            'spreadsheetFiles' => array(self::HAS_MANY, 'SpreadsheetFile', 'data_source_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'cloned_from_id' => Yii::t('model', 'Cloned From'),
            'title_en' => Yii::t('model', 'Title En'),
            'slug' => Yii::t('model', 'Slug'),
            'about' => Yii::t('model', 'About'),
            'logo_media_id' => Yii::t('model', 'Logo Media'),
            'mini_logo_media_id' => Yii::t('model', 'Mini Logo Media'),
            'link' => Yii::t('model', 'Link'),
            'authoring_workflow_execution_id' => Yii::t('model', 'Authoring Workflow Execution'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'node_id' => Yii::t('model', 'Node'),
            'title_es' => Yii::t('model', 'Title Es'),
            'title_fa' => Yii::t('model', 'Title Fa'),
            'title_hi' => Yii::t('model', 'Title Hi'),
            'title_pt' => Yii::t('model', 'Title Pt'),
            'title_sv' => Yii::t('model', 'Title Sv'),
            'title_cn' => Yii::t('model', 'Title Cn'),
            'title_de' => Yii::t('model', 'Title De'),
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
        $criteria->compare('t.title_en', $this->title_en, true);
        $criteria->compare('t.slug', $this->slug, true);
        $criteria->compare('t.about', $this->about, true);
        $criteria->compare('t.logo_media_id', $this->logo_media_id);
        $criteria->compare('t.mini_logo_media_id', $this->mini_logo_media_id);
        $criteria->compare('t.link', $this->link, true);
        $criteria->compare('t.authoring_workflow_execution_id', $this->authoring_workflow_execution_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.title_es', $this->title_es, true);
        $criteria->compare('t.title_fa', $this->title_fa, true);
        $criteria->compare('t.title_hi', $this->title_hi, true);
        $criteria->compare('t.title_pt', $this->title_pt, true);
        $criteria->compare('t.title_sv', $this->title_sv, true);
        $criteria->compare('t.title_cn', $this->title_cn, true);
        $criteria->compare('t.title_de', $this->title_de, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
