<?php

/**
 * This is the model base class for the table "po_file".
 *
 * Columns in table "po_file" available as properties of the model:
 * @property string $id
 * @property string $title
 * @property string $about
 * @property integer $file_media_id
 * @property string $created
 * @property string $modified
 *
 * Relations of table "po_file" available as properties of the model:
 * @property P3Media $fileMedia
 */
abstract class BasePoFile extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'po_file';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('title, about, file_media_id, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('file_media_id', 'numerical', 'integerOnly' => true),
                array('title', 'length', 'max' => 255),
                array('about, created, modified', 'safe'),
                array('id, title, about, file_media_id, created, modified', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->title;
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
            'fileMedia' => array(self::BELONGS_TO, 'P3Media', 'file_media_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'title' => Yii::t('model', 'Title'),
            'about' => Yii::t('model', 'About'),
            'file_media_id' => Yii::t('model', 'File Media'),
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
        $criteria->compare('t.title', $this->title, true);
        $criteria->compare('t.about', $this->about, true);
        $criteria->compare('t.file_media_id', $this->file_media_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
