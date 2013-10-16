<?php

/**
 * This is the model base class for the table "tool".
 *
 * Columns in table "tool" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $title
 * @property string $slug
 * @property string $about
 * @property string $embed_template
 * @property string $po_file_id
 * @property string $created
 * @property string $modified
 * @property string $node_id
 *
 * Relations of table "tool" available as properties of the model:
 * @property Snapshot[] $snapshots
 * @property Node $node
 * @property PoFile $poFile
 * @property Tool $clonedFrom
 * @property Tool[] $tools
 */
abstract class BaseTool extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tool';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, title, slug, about, embed_template, po_file_id, created, modified, node_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, po_file_id, node_id', 'length', 'max' => 20),
                array('title, slug', 'length', 'max' => 255),
                array('about, embed_template, created, modified', 'safe'),
                array('id, version, cloned_from_id, title, slug, about, embed_template, po_file_id, created, modified, node_id', 'safe', 'on' => 'search'),
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
            'snapshots' => array(self::HAS_MANY, 'Snapshot', 'tool_id'),
            'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
            'poFile' => array(self::BELONGS_TO, 'PoFile', 'po_file_id'),
            'clonedFrom' => array(self::BELONGS_TO, 'Tool', 'cloned_from_id'),
            'tools' => array(self::HAS_MANY, 'Tool', 'cloned_from_id'),
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
            'embed_template' => Yii::t('model', 'Embed Template'),
            'po_file_id' => Yii::t('model', 'Po File'),
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
        $criteria->compare('t.embed_template', $this->embed_template, true);
        $criteria->compare('t.po_file_id', $this->po_file_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.node_id', $this->node_id);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
