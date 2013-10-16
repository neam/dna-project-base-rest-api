<?php

/**
 * This is the model base class for the table "download_link".
 *
 * Columns in table "download_link" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $title_en
 * @property integer $file_media_id
 * @property string $authoring_workflow_execution_id_en
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
 * @property string $authoring_workflow_execution_id_es
 * @property string $authoring_workflow_execution_id_fa
 * @property string $authoring_workflow_execution_id_hi
 * @property string $authoring_workflow_execution_id_pt
 * @property string $authoring_workflow_execution_id_sv
 * @property string $authoring_workflow_execution_id_cn
 * @property string $authoring_workflow_execution_id_de
 *
 * Relations of table "download_link" available as properties of the model:
 * @property EzcExecution $authoringWorkflowExecutionIdDe
 * @property DownloadLink $clonedFrom
 * @property DownloadLink[] $downloadLinks
 * @property EzcExecution $authoringWorkflowExecutionIdEn
 * @property EzcExecution $authoringWorkflowExecutionIdCn
 * @property EzcExecution $authoringWorkflowExecutionIdEs
 * @property EzcExecution $authoringWorkflowExecutionIdFa
 * @property EzcExecution $authoringWorkflowExecutionIdHi
 * @property EzcExecution $authoringWorkflowExecutionIdPt
 * @property EzcExecution $authoringWorkflowExecutionIdSv
 * @property Node $node
 * @property P3Media $fileMedia
 * @property SectionContent[] $sectionContents
 */
abstract class BaseDownloadLink extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'download_link';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, title_en, file_media_id, authoring_workflow_execution_id_en, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, authoring_workflow_execution_id_es, authoring_workflow_execution_id_fa, authoring_workflow_execution_id_hi, authoring_workflow_execution_id_pt, authoring_workflow_execution_id_sv, authoring_workflow_execution_id_cn, authoring_workflow_execution_id_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, file_media_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, node_id', 'length', 'max' => 20),
                array('title_en, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de', 'length', 'max' => 255),
                array('authoring_workflow_execution_id_en, authoring_workflow_execution_id_es, authoring_workflow_execution_id_fa, authoring_workflow_execution_id_hi, authoring_workflow_execution_id_pt, authoring_workflow_execution_id_sv, authoring_workflow_execution_id_cn, authoring_workflow_execution_id_de', 'length', 'max' => 10),
                array('created, modified', 'safe'),
                array('id, version, cloned_from_id, title_en, file_media_id, authoring_workflow_execution_id_en, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, authoring_workflow_execution_id_es, authoring_workflow_execution_id_fa, authoring_workflow_execution_id_hi, authoring_workflow_execution_id_pt, authoring_workflow_execution_id_sv, authoring_workflow_execution_id_cn, authoring_workflow_execution_id_de', 'safe', 'on' => 'search'),
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
            'authoringWorkflowExecutionIdDe' => array(self::BELONGS_TO, 'EzcExecution', 'authoring_workflow_execution_id_de'),
            'clonedFrom' => array(self::BELONGS_TO, 'DownloadLink', 'cloned_from_id'),
            'downloadLinks' => array(self::HAS_MANY, 'DownloadLink', 'cloned_from_id'),
            'authoringWorkflowExecutionIdEn' => array(self::BELONGS_TO, 'EzcExecution', 'authoring_workflow_execution_id_en'),
            'authoringWorkflowExecutionIdCn' => array(self::BELONGS_TO, 'EzcExecution', 'authoring_workflow_execution_id_cn'),
            'authoringWorkflowExecutionIdEs' => array(self::BELONGS_TO, 'EzcExecution', 'authoring_workflow_execution_id_es'),
            'authoringWorkflowExecutionIdFa' => array(self::BELONGS_TO, 'EzcExecution', 'authoring_workflow_execution_id_fa'),
            'authoringWorkflowExecutionIdHi' => array(self::BELONGS_TO, 'EzcExecution', 'authoring_workflow_execution_id_hi'),
            'authoringWorkflowExecutionIdPt' => array(self::BELONGS_TO, 'EzcExecution', 'authoring_workflow_execution_id_pt'),
            'authoringWorkflowExecutionIdSv' => array(self::BELONGS_TO, 'EzcExecution', 'authoring_workflow_execution_id_sv'),
            'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
            'fileMedia' => array(self::BELONGS_TO, 'P3Media', 'file_media_id'),
            'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'download_link_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'cloned_from_id' => Yii::t('model', 'Cloned From'),
            'title_en' => Yii::t('model', 'Title En'),
            'file_media_id' => Yii::t('model', 'File Media'),
            'authoring_workflow_execution_id_en' => Yii::t('model', 'Authoring Workflow Execution Id En'),
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
            'authoring_workflow_execution_id_es' => Yii::t('model', 'Authoring Workflow Execution Id Es'),
            'authoring_workflow_execution_id_fa' => Yii::t('model', 'Authoring Workflow Execution Id Fa'),
            'authoring_workflow_execution_id_hi' => Yii::t('model', 'Authoring Workflow Execution Id Hi'),
            'authoring_workflow_execution_id_pt' => Yii::t('model', 'Authoring Workflow Execution Id Pt'),
            'authoring_workflow_execution_id_sv' => Yii::t('model', 'Authoring Workflow Execution Id Sv'),
            'authoring_workflow_execution_id_cn' => Yii::t('model', 'Authoring Workflow Execution Id Cn'),
            'authoring_workflow_execution_id_de' => Yii::t('model', 'Authoring Workflow Execution Id De'),
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
        $criteria->compare('t.file_media_id', $this->file_media_id);
        $criteria->compare('t.authoring_workflow_execution_id_en', $this->authoring_workflow_execution_id_en);
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
        $criteria->compare('t.authoring_workflow_execution_id_es', $this->authoring_workflow_execution_id_es);
        $criteria->compare('t.authoring_workflow_execution_id_fa', $this->authoring_workflow_execution_id_fa);
        $criteria->compare('t.authoring_workflow_execution_id_hi', $this->authoring_workflow_execution_id_hi);
        $criteria->compare('t.authoring_workflow_execution_id_pt', $this->authoring_workflow_execution_id_pt);
        $criteria->compare('t.authoring_workflow_execution_id_sv', $this->authoring_workflow_execution_id_sv);
        $criteria->compare('t.authoring_workflow_execution_id_cn', $this->authoring_workflow_execution_id_cn);
        $criteria->compare('t.authoring_workflow_execution_id_de', $this->authoring_workflow_execution_id_de);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
