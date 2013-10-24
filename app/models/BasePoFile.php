<?php

/**
 * This is the model base class for the table "po_file".
 *
 * Columns in table "po_file" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $title
 * @property string $about
 * @property integer $original_media_id
 * @property integer $processed_media_id_en
 * @property string $created
 * @property string $modified
 * @property string $node_id
 * @property integer $processed_media_id_es
 * @property integer $processed_media_id_fa
 * @property integer $processed_media_id_hi
 * @property integer $processed_media_id_pt
 * @property integer $processed_media_id_sv
 * @property integer $processed_media_id_cn
 * @property integer $processed_media_id_de
 * @property string $po_file_qa_state_id_en
 * @property string $po_file_qa_state_id_es
 * @property string $po_file_qa_state_id_fa
 * @property string $po_file_qa_state_id_hi
 * @property string $po_file_qa_state_id_pt
 * @property string $po_file_qa_state_id_sv
 * @property string $po_file_qa_state_id_cn
 * @property string $po_file_qa_state_id_de
 *
 * Relations of table "po_file" available as properties of the model:
 * @property Node $node
 * @property P3Media $originalMedia
 * @property P3Media $processedMediaIdEn
 * @property P3Media $processedMediaIdCn
 * @property P3Media $processedMediaIdDe
 * @property P3Media $processedMediaIdEs
 * @property P3Media $processedMediaIdFa
 * @property P3Media $processedMediaIdHi
 * @property P3Media $processedMediaIdPt
 * @property P3Media $processedMediaIdSv
 * @property PoFile $clonedFrom
 * @property PoFile[] $poFiles
 * @property PoFileQaState $poFileQaStateIdEn
 * @property PoFileQaState $poFileQaStateIdCn
 * @property PoFileQaState $poFileQaStateIdDe
 * @property PoFileQaState $poFileQaStateIdEs
 * @property PoFileQaState $poFileQaStateIdFa
 * @property PoFileQaState $poFileQaStateIdHi
 * @property PoFileQaState $poFileQaStateIdPt
 * @property PoFileQaState $poFileQaStateIdSv
 * @property Tool[] $tools
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
                array('version, cloned_from_id, title, about, original_media_id, processed_media_id_en, created, modified, node_id, processed_media_id_es, processed_media_id_fa, processed_media_id_hi, processed_media_id_pt, processed_media_id_sv, processed_media_id_cn, processed_media_id_de, po_file_qa_state_id_en, po_file_qa_state_id_es, po_file_qa_state_id_fa, po_file_qa_state_id_hi, po_file_qa_state_id_pt, po_file_qa_state_id_sv, po_file_qa_state_id_cn, po_file_qa_state_id_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, original_media_id, processed_media_id_en, processed_media_id_es, processed_media_id_fa, processed_media_id_hi, processed_media_id_pt, processed_media_id_sv, processed_media_id_cn, processed_media_id_de', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, node_id, po_file_qa_state_id_en, po_file_qa_state_id_es, po_file_qa_state_id_fa, po_file_qa_state_id_hi, po_file_qa_state_id_pt, po_file_qa_state_id_sv, po_file_qa_state_id_cn, po_file_qa_state_id_de', 'length', 'max' => 20),
                array('title', 'length', 'max' => 255),
                array('about, created, modified', 'safe'),
                array('id, version, cloned_from_id, title, about, original_media_id, processed_media_id_en, created, modified, node_id, processed_media_id_es, processed_media_id_fa, processed_media_id_hi, processed_media_id_pt, processed_media_id_sv, processed_media_id_cn, processed_media_id_de, po_file_qa_state_id_en, po_file_qa_state_id_es, po_file_qa_state_id_fa, po_file_qa_state_id_hi, po_file_qa_state_id_pt, po_file_qa_state_id_sv, po_file_qa_state_id_cn, po_file_qa_state_id_de', 'safe', 'on' => 'search'),
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
        return array_merge(
            parent::relations(), array(
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'originalMedia' => array(self::BELONGS_TO, 'P3Media', 'original_media_id'),
                'processedMediaIdEn' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_en'),
                'processedMediaIdCn' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_cn'),
                'processedMediaIdDe' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_de'),
                'processedMediaIdEs' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_es'),
                'processedMediaIdFa' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_fa'),
                'processedMediaIdHi' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_hi'),
                'processedMediaIdPt' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_pt'),
                'processedMediaIdSv' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_sv'),
                'clonedFrom' => array(self::BELONGS_TO, 'PoFile', 'cloned_from_id'),
                'poFiles' => array(self::HAS_MANY, 'PoFile', 'cloned_from_id'),
                'poFileQaStateIdEn' => array(self::BELONGS_TO, 'PoFileQaState', 'po_file_qa_state_id_en'),
                'poFileQaStateIdCn' => array(self::BELONGS_TO, 'PoFileQaState', 'po_file_qa_state_id_cn'),
                'poFileQaStateIdDe' => array(self::BELONGS_TO, 'PoFileQaState', 'po_file_qa_state_id_de'),
                'poFileQaStateIdEs' => array(self::BELONGS_TO, 'PoFileQaState', 'po_file_qa_state_id_es'),
                'poFileQaStateIdFa' => array(self::BELONGS_TO, 'PoFileQaState', 'po_file_qa_state_id_fa'),
                'poFileQaStateIdHi' => array(self::BELONGS_TO, 'PoFileQaState', 'po_file_qa_state_id_hi'),
                'poFileQaStateIdPt' => array(self::BELONGS_TO, 'PoFileQaState', 'po_file_qa_state_id_pt'),
                'poFileQaStateIdSv' => array(self::BELONGS_TO, 'PoFileQaState', 'po_file_qa_state_id_sv'),
                'tools' => array(self::HAS_MANY, 'Tool', 'po_file_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'cloned_from_id' => Yii::t('model', 'Cloned From'),
            'title' => Yii::t('model', 'Title'),
            'about' => Yii::t('model', 'About'),
            'original_media_id' => Yii::t('model', 'Original Media'),
            'processed_media_id_en' => Yii::t('model', 'Processed Media Id En'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'node_id' => Yii::t('model', 'Node'),
            'processed_media_id_es' => Yii::t('model', 'Processed Media Id Es'),
            'processed_media_id_fa' => Yii::t('model', 'Processed Media Id Fa'),
            'processed_media_id_hi' => Yii::t('model', 'Processed Media Id Hi'),
            'processed_media_id_pt' => Yii::t('model', 'Processed Media Id Pt'),
            'processed_media_id_sv' => Yii::t('model', 'Processed Media Id Sv'),
            'processed_media_id_cn' => Yii::t('model', 'Processed Media Id Cn'),
            'processed_media_id_de' => Yii::t('model', 'Processed Media Id De'),
            'po_file_qa_state_id_en' => Yii::t('model', 'Po File Qa State Id En'),
            'po_file_qa_state_id_es' => Yii::t('model', 'Po File Qa State Id Es'),
            'po_file_qa_state_id_fa' => Yii::t('model', 'Po File Qa State Id Fa'),
            'po_file_qa_state_id_hi' => Yii::t('model', 'Po File Qa State Id Hi'),
            'po_file_qa_state_id_pt' => Yii::t('model', 'Po File Qa State Id Pt'),
            'po_file_qa_state_id_sv' => Yii::t('model', 'Po File Qa State Id Sv'),
            'po_file_qa_state_id_cn' => Yii::t('model', 'Po File Qa State Id Cn'),
            'po_file_qa_state_id_de' => Yii::t('model', 'Po File Qa State Id De'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.version', $this->version);
        $criteria->compare('t.cloned_from_id', $this->cloned_from_id);
        $criteria->compare('t.title', $this->title, true);
        $criteria->compare('t.about', $this->about, true);
        $criteria->compare('t.original_media_id', $this->original_media_id);
        $criteria->compare('t.processed_media_id_en', $this->processed_media_id_en);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.processed_media_id_es', $this->processed_media_id_es);
        $criteria->compare('t.processed_media_id_fa', $this->processed_media_id_fa);
        $criteria->compare('t.processed_media_id_hi', $this->processed_media_id_hi);
        $criteria->compare('t.processed_media_id_pt', $this->processed_media_id_pt);
        $criteria->compare('t.processed_media_id_sv', $this->processed_media_id_sv);
        $criteria->compare('t.processed_media_id_cn', $this->processed_media_id_cn);
        $criteria->compare('t.processed_media_id_de', $this->processed_media_id_de);
        $criteria->compare('t.po_file_qa_state_id_en', $this->po_file_qa_state_id_en);
        $criteria->compare('t.po_file_qa_state_id_es', $this->po_file_qa_state_id_es);
        $criteria->compare('t.po_file_qa_state_id_fa', $this->po_file_qa_state_id_fa);
        $criteria->compare('t.po_file_qa_state_id_hi', $this->po_file_qa_state_id_hi);
        $criteria->compare('t.po_file_qa_state_id_pt', $this->po_file_qa_state_id_pt);
        $criteria->compare('t.po_file_qa_state_id_sv', $this->po_file_qa_state_id_sv);
        $criteria->compare('t.po_file_qa_state_id_cn', $this->po_file_qa_state_id_cn);
        $criteria->compare('t.po_file_qa_state_id_de', $this->po_file_qa_state_id_de);


        return $criteria;

    }

}
