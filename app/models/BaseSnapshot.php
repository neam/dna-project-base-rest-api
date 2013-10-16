<?php

/**
 * This is the model base class for the table "snapshot".
 *
 * Columns in table "snapshot" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $title_en
 * @property string $slug
 * @property string $about
 * @property string $link
 * @property string $embed_override
 * @property string $tool_id
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
 * Relations of table "snapshot" available as properties of the model:
 * @property DataSource[] $dataSources
 * @property ExamQuestion[] $examQuestions
 * @property SectionContent[] $sectionContents
 * @property Node $node
 * @property Snapshot $clonedFrom
 * @property Snapshot[] $snapshots
 * @property Tool $tool
 * @property EzcExecution $authoringWorkflowExecution
 */
abstract class BaseSnapshot extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'snapshot';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, title_en, slug, about, link, embed_override, tool_id, authoring_workflow_execution_id, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, tool_id, node_id', 'length', 'max' => 20),
                array('title_en, slug, link, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de', 'length', 'max' => 255),
                array('authoring_workflow_execution_id', 'length', 'max' => 10),
                array('about, embed_override, created, modified', 'safe'),
                array('id, version, cloned_from_id, title_en, slug, about, link, embed_override, tool_id, authoring_workflow_execution_id, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de', 'safe', 'on' => 'search'),
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
            'dataSources' => array(self::HAS_MANY, 'DataSource', 'cloned_from_id'),
            'examQuestions' => array(self::HAS_MANY, 'ExamQuestion', 'cloned_from_id'),
            'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'viz_view_id'),
            'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
            'clonedFrom' => array(self::BELONGS_TO, 'Snapshot', 'cloned_from_id'),
            'snapshots' => array(self::HAS_MANY, 'Snapshot', 'cloned_from_id'),
            'tool' => array(self::BELONGS_TO, 'Tool', 'tool_id'),
            'authoringWorkflowExecution' => array(self::BELONGS_TO, 'EzcExecution', 'authoring_workflow_execution_id'),
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
            'link' => Yii::t('model', 'Link'),
            'embed_override' => Yii::t('model', 'Embed Override'),
            'tool_id' => Yii::t('model', 'Tool'),
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
        $criteria->compare('t.link', $this->link, true);
        $criteria->compare('t.embed_override', $this->embed_override, true);
        $criteria->compare('t.tool_id', $this->tool_id);
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
