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
 * @property integer $file_media_id
 * @property string $authoring_workflow_execution_id
 * @property string $created
 * @property string $modified
 *
 * Relations of table "vector_graphic" available as properties of the model:
 * @property DataChunk[] $dataChunks
 * @property Execution $authoringWorkflowExecution
 * @property P3Media $fileMedia
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
                array('version, cloned_from_id, title, slug, about, file_media_id, authoring_workflow_execution_id, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, file_media_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id', 'length', 'max' => 20),
                array('title, slug, about', 'length', 'max' => 255),
                array('authoring_workflow_execution_id', 'length', 'max' => 10),
                array('created, modified', 'safe'),
                array('id, version, cloned_from_id, title, slug, about, file_media_id, authoring_workflow_execution_id, created, modified', 'safe', 'on' => 'search'),
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
            'authoringWorkflowExecution' => array(self::BELONGS_TO, 'Execution', 'authoring_workflow_execution_id'),
            'fileMedia' => array(self::BELONGS_TO, 'P3Media', 'file_media_id'),
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
            'file_media_id' => Yii::t('model', 'File Media'),
            'authoring_workflow_execution_id' => Yii::t('model', 'Authoring Workflow Execution'),
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
        $criteria->compare('t.version', $this->version);
        $criteria->compare('t.cloned_from_id', $this->cloned_from_id);
        $criteria->compare('t.title', $this->title, true);
        $criteria->compare('t.slug', $this->slug, true);
        $criteria->compare('t.about', $this->about, true);
        $criteria->compare('t.file_media_id', $this->file_media_id);
        $criteria->compare('t.authoring_workflow_execution_id', $this->authoring_workflow_execution_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
