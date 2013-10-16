<?php

/**
 * This is the model base class for the table "vector_graphic".
 *
 * Columns in table "vector_graphic" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $title
 * @property string $slug
 * @property string $about
 * @property integer $original_media_id
 * @property integer $processed_media_id
 * @property string $authoring_workflow_execution_id
 * @property string $created
 * @property string $modified
 * @property string $node_id
 *
 * Relations of table "vector_graphic" available as properties of the model:
 * @property DataChunk[] $dataChunks
 * @property EzcExecution $authoringWorkflowExecution
 * @property Node $node
 * @property P3Media $originalMedia
 * @property P3Media $processedMedia
 * @property VectorGraphic $clonedFrom
 * @property VectorGraphic[] $vectorGraphics
 */
abstract class BaseVectorGraphic extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'vector_graphic';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, title, slug, about, original_media_id, processed_media_id, authoring_workflow_execution_id, created, modified, node_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, original_media_id, processed_media_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, node_id', 'length', 'max' => 20),
                array('title, slug', 'length', 'max' => 255),
                array('authoring_workflow_execution_id', 'length', 'max' => 10),
                array('about, created, modified', 'safe'),
                array('id, version, cloned_from_id, title, slug, about, original_media_id, processed_media_id, authoring_workflow_execution_id, created, modified, node_id', 'safe', 'on' => 'search'),
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
            'dataChunks' => array(self::HAS_MANY, 'DataChunk', 'vector_graphic_id'),
            'authoringWorkflowExecution' => array(self::BELONGS_TO, 'EzcExecution', 'authoring_workflow_execution_id'),
            'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
            'originalMedia' => array(self::BELONGS_TO, 'P3Media', 'original_media_id'),
            'processedMedia' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id'),
            'clonedFrom' => array(self::BELONGS_TO, 'VectorGraphic', 'cloned_from_id'),
            'vectorGraphics' => array(self::HAS_MANY, 'VectorGraphic', 'cloned_from_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'cloned_from_id' => Yii::t('model', 'Cloned From'),
            'title' => Yii::t('model', 'Title'),
            'slug' => Yii::t('model', 'Slug'),
            'about' => Yii::t('model', 'About'),
            'original_media_id' => Yii::t('model', 'Original Media'),
            'processed_media_id' => Yii::t('model', 'Processed Media'),
            'authoring_workflow_execution_id' => Yii::t('model', 'Authoring Workflow Execution'),
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
        $criteria->compare('t.version', $this->version);
        $criteria->compare('t.cloned_from_id', $this->cloned_from_id);
        $criteria->compare('t.title', $this->title, true);
        $criteria->compare('t.slug', $this->slug, true);
        $criteria->compare('t.about', $this->about, true);
        $criteria->compare('t.original_media_id', $this->original_media_id);
        $criteria->compare('t.processed_media_id', $this->processed_media_id);
        $criteria->compare('t.authoring_workflow_execution_id', $this->authoring_workflow_execution_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.node_id', $this->node_id);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
