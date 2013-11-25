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
 * @property integer $owner_id
 * @property string $node_id
 * @property integer $processed_media_id_es
 * @property integer $processed_media_id_hi
 * @property integer $processed_media_id_pt
 * @property integer $processed_media_id_sv
 * @property integer $processed_media_id_de
 * @property string $po_file_qa_state_id
 * @property integer $processed_media_id_zh
 * @property integer $processed_media_id_ar
 * @property integer $processed_media_id_bg
 * @property integer $processed_media_id_ca
 * @property integer $processed_media_id_cs
 * @property integer $processed_media_id_da
 * @property integer $processed_media_id_en_gb
 * @property integer $processed_media_id_en_us
 * @property integer $processed_media_id_el
 * @property integer $processed_media_id_fi
 * @property integer $processed_media_id_fil
 * @property integer $processed_media_id_fr
 * @property integer $processed_media_id_hr
 * @property integer $processed_media_id_hu
 * @property integer $processed_media_id_id
 * @property integer $processed_media_id_iw
 * @property integer $processed_media_id_it
 * @property integer $processed_media_id_ja
 * @property integer $processed_media_id_ko
 * @property integer $processed_media_id_lt
 * @property integer $processed_media_id_lv
 * @property integer $processed_media_id_nl
 * @property integer $processed_media_id_no
 * @property integer $processed_media_id_pl
 * @property integer $processed_media_id_pt_br
 * @property integer $processed_media_id_pt_pt
 * @property integer $processed_media_id_ro
 * @property integer $processed_media_id_ru
 * @property integer $processed_media_id_sk
 * @property integer $processed_media_id_sl
 * @property integer $processed_media_id_sr
 * @property integer $processed_media_id_th
 * @property integer $processed_media_id_tr
 * @property integer $processed_media_id_uk
 * @property integer $processed_media_id_vi
 * @property integer $processed_media_id_zh_cn
 * @property integer $processed_media_id_zh_tw
 *
 * Relations of table "po_file" available as properties of the model:
 * @property P3Media $processedMediaIdZhTw
 * @property Node $node
 * @property P3Media $originalMedia
 * @property P3Media $processedMediaIdEn
 * @property P3Media $processedMediaIdAr
 * @property P3Media $processedMediaIdBg
 * @property P3Media $processedMediaIdCa
 * @property P3Media $processedMediaIdCs
 * @property P3Media $processedMediaIdDa
 * @property P3Media $processedMediaIdDe
 * @property P3Media $processedMediaIdEl
 * @property P3Media $processedMediaIdEnGb
 * @property P3Media $processedMediaIdEnUs
 * @property P3Media $processedMediaIdEs
 * @property P3Media $processedMediaIdFi
 * @property P3Media $processedMediaIdFil
 * @property P3Media $processedMediaIdFr
 * @property P3Media $processedMediaIdHi
 * @property P3Media $processedMediaIdHr
 * @property P3Media $processedMediaIdHu
 * @property P3Media $processedMediaId
 * @property P3Media $processedMediaIdIt
 * @property P3Media $processedMediaIdIw
 * @property P3Media $processedMediaIdJa
 * @property P3Media $processedMediaIdKo
 * @property P3Media $processedMediaIdLt
 * @property P3Media $processedMediaIdLv
 * @property P3Media $processedMediaIdNl
 * @property P3Media $processedMediaIdNo
 * @property P3Media $processedMediaIdPl
 * @property P3Media $processedMediaIdPt
 * @property P3Media $processedMediaIdPtBr
 * @property P3Media $processedMediaIdPtPt
 * @property P3Media $processedMediaIdRo
 * @property P3Media $processedMediaIdRu
 * @property P3Media $processedMediaIdSk
 * @property P3Media $processedMediaIdSl
 * @property P3Media $processedMediaIdSr
 * @property P3Media $processedMediaIdSv
 * @property P3Media $processedMediaIdTh
 * @property P3Media $processedMediaIdTr
 * @property P3Media $processedMediaIdUk
 * @property P3Media $processedMediaIdVi
 * @property P3Media $processedMediaIdZh
 * @property P3Media $processedMediaIdZhCn
 * @property PoFile $clonedFrom
 * @property PoFile[] $poFiles
 * @property Users $owner
 * @property PoFileQaState $poFileQaState
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
                array('version, cloned_from_id, title, about, original_media_id, processed_media_id_en, created, modified, owner_id, node_id, processed_media_id_es, processed_media_id_hi, processed_media_id_pt, processed_media_id_sv, processed_media_id_de, po_file_qa_state_id, processed_media_id_zh, processed_media_id_ar, processed_media_id_bg, processed_media_id_ca, processed_media_id_cs, processed_media_id_da, processed_media_id_en_gb, processed_media_id_en_us, processed_media_id_el, processed_media_id_fi, processed_media_id_fil, processed_media_id_fr, processed_media_id_hr, processed_media_id_hu, processed_media_id_id, processed_media_id_iw, processed_media_id_it, processed_media_id_ja, processed_media_id_ko, processed_media_id_lt, processed_media_id_lv, processed_media_id_nl, processed_media_id_no, processed_media_id_pl, processed_media_id_pt_br, processed_media_id_pt_pt, processed_media_id_ro, processed_media_id_ru, processed_media_id_sk, processed_media_id_sl, processed_media_id_sr, processed_media_id_th, processed_media_id_tr, processed_media_id_uk, processed_media_id_vi, processed_media_id_zh_cn, processed_media_id_zh_tw', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, original_media_id, processed_media_id_en, owner_id, processed_media_id_es, processed_media_id_hi, processed_media_id_pt, processed_media_id_sv, processed_media_id_de, processed_media_id_zh, processed_media_id_ar, processed_media_id_bg, processed_media_id_ca, processed_media_id_cs, processed_media_id_da, processed_media_id_en_gb, processed_media_id_en_us, processed_media_id_el, processed_media_id_fi, processed_media_id_fil, processed_media_id_fr, processed_media_id_hr, processed_media_id_hu, processed_media_id_id, processed_media_id_iw, processed_media_id_it, processed_media_id_ja, processed_media_id_ko, processed_media_id_lt, processed_media_id_lv, processed_media_id_nl, processed_media_id_no, processed_media_id_pl, processed_media_id_pt_br, processed_media_id_pt_pt, processed_media_id_ro, processed_media_id_ru, processed_media_id_sk, processed_media_id_sl, processed_media_id_sr, processed_media_id_th, processed_media_id_tr, processed_media_id_uk, processed_media_id_vi, processed_media_id_zh_cn, processed_media_id_zh_tw', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, node_id, po_file_qa_state_id', 'length', 'max' => 20),
                array('title', 'length', 'max' => 255),
                array('about, created, modified', 'safe'),
                array('id, version, cloned_from_id, title, about, original_media_id, processed_media_id_en, created, modified, owner_id, node_id, processed_media_id_es, processed_media_id_hi, processed_media_id_pt, processed_media_id_sv, processed_media_id_de, po_file_qa_state_id, processed_media_id_zh, processed_media_id_ar, processed_media_id_bg, processed_media_id_ca, processed_media_id_cs, processed_media_id_da, processed_media_id_en_gb, processed_media_id_en_us, processed_media_id_el, processed_media_id_fi, processed_media_id_fil, processed_media_id_fr, processed_media_id_hr, processed_media_id_hu, processed_media_id_id, processed_media_id_iw, processed_media_id_it, processed_media_id_ja, processed_media_id_ko, processed_media_id_lt, processed_media_id_lv, processed_media_id_nl, processed_media_id_no, processed_media_id_pl, processed_media_id_pt_br, processed_media_id_pt_pt, processed_media_id_ro, processed_media_id_ru, processed_media_id_sk, processed_media_id_sl, processed_media_id_sr, processed_media_id_th, processed_media_id_tr, processed_media_id_uk, processed_media_id_vi, processed_media_id_zh_cn, processed_media_id_zh_tw', 'safe', 'on' => 'search'),
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
                'processedMediaIdZhTw' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_zh_tw'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'originalMedia' => array(self::BELONGS_TO, 'P3Media', 'original_media_id'),
                'processedMediaIdEn' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_en'),
                'processedMediaIdAr' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_ar'),
                'processedMediaIdBg' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_bg'),
                'processedMediaIdCa' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_ca'),
                'processedMediaIdCs' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_cs'),
                'processedMediaIdDa' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_da'),
                'processedMediaIdDe' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_de'),
                'processedMediaIdEl' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_el'),
                'processedMediaIdEnGb' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_en_gb'),
                'processedMediaIdEnUs' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_en_us'),
                'processedMediaIdEs' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_es'),
                'processedMediaIdFi' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_fi'),
                'processedMediaIdFil' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_fil'),
                'processedMediaIdFr' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_fr'),
                'processedMediaIdHi' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_hi'),
                'processedMediaIdHr' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_hr'),
                'processedMediaIdHu' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_hu'),
                'processedMediaId' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_id'),
                'processedMediaIdIt' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_it'),
                'processedMediaIdIw' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_iw'),
                'processedMediaIdJa' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_ja'),
                'processedMediaIdKo' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_ko'),
                'processedMediaIdLt' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_lt'),
                'processedMediaIdLv' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_lv'),
                'processedMediaIdNl' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_nl'),
                'processedMediaIdNo' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_no'),
                'processedMediaIdPl' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_pl'),
                'processedMediaIdPt' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_pt'),
                'processedMediaIdPtBr' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_pt_br'),
                'processedMediaIdPtPt' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_pt_pt'),
                'processedMediaIdRo' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_ro'),
                'processedMediaIdRu' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_ru'),
                'processedMediaIdSk' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_sk'),
                'processedMediaIdSl' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_sl'),
                'processedMediaIdSr' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_sr'),
                'processedMediaIdSv' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_sv'),
                'processedMediaIdTh' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_th'),
                'processedMediaIdTr' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_tr'),
                'processedMediaIdUk' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_uk'),
                'processedMediaIdVi' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_vi'),
                'processedMediaIdZh' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_zh'),
                'processedMediaIdZhCn' => array(self::BELONGS_TO, 'P3Media', 'processed_media_id_zh_cn'),
                'clonedFrom' => array(self::BELONGS_TO, 'PoFile', 'cloned_from_id'),
                'poFiles' => array(self::HAS_MANY, 'PoFile', 'cloned_from_id'),
                'owner' => array(self::BELONGS_TO, 'Users', 'owner_id'),
                'poFileQaState' => array(self::BELONGS_TO, 'PoFileQaState', 'po_file_qa_state_id'),
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
            'owner_id' => Yii::t('model', 'Owner'),
            'node_id' => Yii::t('model', 'Node'),
            'processed_media_id_es' => Yii::t('model', 'Processed Media Id Es'),
            'processed_media_id_hi' => Yii::t('model', 'Processed Media Id Hi'),
            'processed_media_id_pt' => Yii::t('model', 'Processed Media Id Pt'),
            'processed_media_id_sv' => Yii::t('model', 'Processed Media Id Sv'),
            'processed_media_id_de' => Yii::t('model', 'Processed Media Id De'),
            'po_file_qa_state_id' => Yii::t('model', 'Po File Qa State'),
            'processed_media_id_zh' => Yii::t('model', 'Processed Media Id Zh'),
            'processed_media_id_ar' => Yii::t('model', 'Processed Media Id Ar'),
            'processed_media_id_bg' => Yii::t('model', 'Processed Media Id Bg'),
            'processed_media_id_ca' => Yii::t('model', 'Processed Media Id Ca'),
            'processed_media_id_cs' => Yii::t('model', 'Processed Media Id Cs'),
            'processed_media_id_da' => Yii::t('model', 'Processed Media Id Da'),
            'processed_media_id_en_gb' => Yii::t('model', 'Processed Media Id En Gb'),
            'processed_media_id_en_us' => Yii::t('model', 'Processed Media Id En Us'),
            'processed_media_id_el' => Yii::t('model', 'Processed Media Id El'),
            'processed_media_id_fi' => Yii::t('model', 'Processed Media Id Fi'),
            'processed_media_id_fil' => Yii::t('model', 'Processed Media Id Fil'),
            'processed_media_id_fr' => Yii::t('model', 'Processed Media Id Fr'),
            'processed_media_id_hr' => Yii::t('model', 'Processed Media Id Hr'),
            'processed_media_id_hu' => Yii::t('model', 'Processed Media Id Hu'),
            'processed_media_id_id' => Yii::t('model', 'Processed Media Id'),
            'processed_media_id_iw' => Yii::t('model', 'Processed Media Id Iw'),
            'processed_media_id_it' => Yii::t('model', 'Processed Media Id It'),
            'processed_media_id_ja' => Yii::t('model', 'Processed Media Id Ja'),
            'processed_media_id_ko' => Yii::t('model', 'Processed Media Id Ko'),
            'processed_media_id_lt' => Yii::t('model', 'Processed Media Id Lt'),
            'processed_media_id_lv' => Yii::t('model', 'Processed Media Id Lv'),
            'processed_media_id_nl' => Yii::t('model', 'Processed Media Id Nl'),
            'processed_media_id_no' => Yii::t('model', 'Processed Media Id No'),
            'processed_media_id_pl' => Yii::t('model', 'Processed Media Id Pl'),
            'processed_media_id_pt_br' => Yii::t('model', 'Processed Media Id Pt Br'),
            'processed_media_id_pt_pt' => Yii::t('model', 'Processed Media Id Pt Pt'),
            'processed_media_id_ro' => Yii::t('model', 'Processed Media Id Ro'),
            'processed_media_id_ru' => Yii::t('model', 'Processed Media Id Ru'),
            'processed_media_id_sk' => Yii::t('model', 'Processed Media Id Sk'),
            'processed_media_id_sl' => Yii::t('model', 'Processed Media Id Sl'),
            'processed_media_id_sr' => Yii::t('model', 'Processed Media Id Sr'),
            'processed_media_id_th' => Yii::t('model', 'Processed Media Id Th'),
            'processed_media_id_tr' => Yii::t('model', 'Processed Media Id Tr'),
            'processed_media_id_uk' => Yii::t('model', 'Processed Media Id Uk'),
            'processed_media_id_vi' => Yii::t('model', 'Processed Media Id Vi'),
            'processed_media_id_zh_cn' => Yii::t('model', 'Processed Media Id Zh Cn'),
            'processed_media_id_zh_tw' => Yii::t('model', 'Processed Media Id Zh Tw'),
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
        $criteria->compare('t.owner_id', $this->owner_id);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.processed_media_id_es', $this->processed_media_id_es);
        $criteria->compare('t.processed_media_id_hi', $this->processed_media_id_hi);
        $criteria->compare('t.processed_media_id_pt', $this->processed_media_id_pt);
        $criteria->compare('t.processed_media_id_sv', $this->processed_media_id_sv);
        $criteria->compare('t.processed_media_id_de', $this->processed_media_id_de);
        $criteria->compare('t.po_file_qa_state_id', $this->po_file_qa_state_id);
        $criteria->compare('t.processed_media_id_zh', $this->processed_media_id_zh);
        $criteria->compare('t.processed_media_id_ar', $this->processed_media_id_ar);
        $criteria->compare('t.processed_media_id_bg', $this->processed_media_id_bg);
        $criteria->compare('t.processed_media_id_ca', $this->processed_media_id_ca);
        $criteria->compare('t.processed_media_id_cs', $this->processed_media_id_cs);
        $criteria->compare('t.processed_media_id_da', $this->processed_media_id_da);
        $criteria->compare('t.processed_media_id_en_gb', $this->processed_media_id_en_gb);
        $criteria->compare('t.processed_media_id_en_us', $this->processed_media_id_en_us);
        $criteria->compare('t.processed_media_id_el', $this->processed_media_id_el);
        $criteria->compare('t.processed_media_id_fi', $this->processed_media_id_fi);
        $criteria->compare('t.processed_media_id_fil', $this->processed_media_id_fil);
        $criteria->compare('t.processed_media_id_fr', $this->processed_media_id_fr);
        $criteria->compare('t.processed_media_id_hr', $this->processed_media_id_hr);
        $criteria->compare('t.processed_media_id_hu', $this->processed_media_id_hu);
        $criteria->compare('t.processed_media_id_id', $this->processed_media_id_id);
        $criteria->compare('t.processed_media_id_iw', $this->processed_media_id_iw);
        $criteria->compare('t.processed_media_id_it', $this->processed_media_id_it);
        $criteria->compare('t.processed_media_id_ja', $this->processed_media_id_ja);
        $criteria->compare('t.processed_media_id_ko', $this->processed_media_id_ko);
        $criteria->compare('t.processed_media_id_lt', $this->processed_media_id_lt);
        $criteria->compare('t.processed_media_id_lv', $this->processed_media_id_lv);
        $criteria->compare('t.processed_media_id_nl', $this->processed_media_id_nl);
        $criteria->compare('t.processed_media_id_no', $this->processed_media_id_no);
        $criteria->compare('t.processed_media_id_pl', $this->processed_media_id_pl);
        $criteria->compare('t.processed_media_id_pt_br', $this->processed_media_id_pt_br);
        $criteria->compare('t.processed_media_id_pt_pt', $this->processed_media_id_pt_pt);
        $criteria->compare('t.processed_media_id_ro', $this->processed_media_id_ro);
        $criteria->compare('t.processed_media_id_ru', $this->processed_media_id_ru);
        $criteria->compare('t.processed_media_id_sk', $this->processed_media_id_sk);
        $criteria->compare('t.processed_media_id_sl', $this->processed_media_id_sl);
        $criteria->compare('t.processed_media_id_sr', $this->processed_media_id_sr);
        $criteria->compare('t.processed_media_id_th', $this->processed_media_id_th);
        $criteria->compare('t.processed_media_id_tr', $this->processed_media_id_tr);
        $criteria->compare('t.processed_media_id_uk', $this->processed_media_id_uk);
        $criteria->compare('t.processed_media_id_vi', $this->processed_media_id_vi);
        $criteria->compare('t.processed_media_id_zh_cn', $this->processed_media_id_zh_cn);
        $criteria->compare('t.processed_media_id_zh_tw', $this->processed_media_id_zh_tw);


        return $criteria;

    }

}
