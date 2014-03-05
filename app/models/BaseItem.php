<?php

/**
 * This is the model base class for the table "item".
 *
 * Columns in table "item" available as properties of the model:
 * @property string $node_id
 * @property string $id
 * @property string $_title
 * @property string $status
 * @property string $preview_validation_progress
 * @property string $public_validation_progress
 * @property string $approval_progress
 * @property string $proofing_progress
 * @property string $translate_into_en_validation_progress
 * @property string $translate_into_ar_validation_progress
 * @property string $translate_into_bg_validation_progress
 * @property string $translate_into_ca_validation_progress
 * @property string $translate_into_cs_validation_progress
 * @property string $translate_into_da_validation_progress
 * @property string $translate_into_de_validation_progress
 * @property string $translate_into_en_gb_validation_progress
 * @property string $translate_into_en_us_validation_progress
 * @property string $translate_into_el_validation_progress
 * @property string $translate_into_es_validation_progress
 * @property string $translate_into_fi_validation_progress
 * @property string $translate_into_fil_validation_progress
 * @property string $translate_into_fr_validation_progress
 * @property string $translate_into_hi_validation_progress
 * @property string $translate_into_hr_validation_progress
 * @property string $translate_into_hu_validation_progress
 * @property string $translate_into_id_validation_progress
 * @property string $translate_into_iw_validation_progress
 * @property string $translate_into_it_validation_progress
 * @property string $translate_into_ja_validation_progress
 * @property string $translate_into_ko_validation_progress
 * @property string $translate_into_lt_validation_progress
 * @property string $translate_into_lv_validation_progress
 * @property string $translate_into_nl_validation_progress
 * @property string $translate_into_no_validation_progress
 * @property string $translate_into_pl_validation_progress
 * @property string $translate_into_pt_validation_progress
 * @property string $translate_into_pt_br_validation_progress
 * @property string $translate_into_pt_pt_validation_progress
 * @property string $translate_into_ro_validation_progress
 * @property string $translate_into_ru_validation_progress
 * @property string $translate_into_sk_validation_progress
 * @property string $translate_into_sl_validation_progress
 * @property string $translate_into_sr_validation_progress
 * @property string $translate_into_sv_validation_progress
 * @property string $translate_into_th_validation_progress
 * @property string $translate_into_tr_validation_progress
 * @property string $translate_into_uk_validation_progress
 * @property string $translate_into_vi_validation_progress
 * @property string $translate_into_zh_validation_progress
 * @property string $translate_into_zh_cn_validation_progress
 * @property string $translate_into_zh_tw_validation_progress
 * @property string $model_class
 * @property string $item_type
 * @property string $created
 * @property string $modified
 *
 * There are no model relations.
 */
abstract class BaseItem extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'item';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('node_id, id, _title, status, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translate_into_en_validation_progress, translate_into_ar_validation_progress, translate_into_bg_validation_progress, translate_into_ca_validation_progress, translate_into_cs_validation_progress, translate_into_da_validation_progress, translate_into_de_validation_progress, translate_into_en_gb_validation_progress, translate_into_en_us_validation_progress, translate_into_el_validation_progress, translate_into_es_validation_progress, translate_into_fi_validation_progress, translate_into_fil_validation_progress, translate_into_fr_validation_progress, translate_into_hi_validation_progress, translate_into_hr_validation_progress, translate_into_hu_validation_progress, translate_into_id_validation_progress, translate_into_iw_validation_progress, translate_into_it_validation_progress, translate_into_ja_validation_progress, translate_into_ko_validation_progress, translate_into_lt_validation_progress, translate_into_lv_validation_progress, translate_into_nl_validation_progress, translate_into_no_validation_progress, translate_into_pl_validation_progress, translate_into_pt_validation_progress, translate_into_pt_br_validation_progress, translate_into_pt_pt_validation_progress, translate_into_ro_validation_progress, translate_into_ru_validation_progress, translate_into_sk_validation_progress, translate_into_sl_validation_progress, translate_into_sr_validation_progress, translate_into_sv_validation_progress, translate_into_th_validation_progress, translate_into_tr_validation_progress, translate_into_uk_validation_progress, translate_into_vi_validation_progress, translate_into_zh_validation_progress, translate_into_zh_cn_validation_progress, translate_into_zh_tw_validation_progress, model_class, item_type, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('node_id, id', 'length', 'max' => 20),
                array('_title, status', 'length', 'max' => 255),
                array('preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translate_into_en_validation_progress, translate_into_ar_validation_progress, translate_into_bg_validation_progress, translate_into_ca_validation_progress, translate_into_cs_validation_progress, translate_into_da_validation_progress, translate_into_de_validation_progress, translate_into_en_gb_validation_progress, translate_into_en_us_validation_progress, translate_into_el_validation_progress, translate_into_es_validation_progress, translate_into_fi_validation_progress, translate_into_fil_validation_progress, translate_into_fr_validation_progress, translate_into_hi_validation_progress, translate_into_hr_validation_progress, translate_into_hu_validation_progress, translate_into_id_validation_progress, translate_into_iw_validation_progress, translate_into_it_validation_progress, translate_into_ja_validation_progress, translate_into_ko_validation_progress, translate_into_lt_validation_progress, translate_into_lv_validation_progress, translate_into_nl_validation_progress, translate_into_no_validation_progress, translate_into_pl_validation_progress, translate_into_pt_validation_progress, translate_into_pt_br_validation_progress, translate_into_pt_pt_validation_progress, translate_into_ro_validation_progress, translate_into_ru_validation_progress, translate_into_sk_validation_progress, translate_into_sl_validation_progress, translate_into_sr_validation_progress, translate_into_sv_validation_progress, translate_into_th_validation_progress, translate_into_tr_validation_progress, translate_into_uk_validation_progress, translate_into_vi_validation_progress, translate_into_zh_validation_progress, translate_into_zh_cn_validation_progress, translate_into_zh_tw_validation_progress', 'length', 'max' => 11),
                array('model_class', 'length', 'max' => 23),
                array('item_type', 'length', 'max' => 15),
                array('created, modified', 'safe'),
                array('node_id, id, _title, status, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translate_into_en_validation_progress, translate_into_ar_validation_progress, translate_into_bg_validation_progress, translate_into_ca_validation_progress, translate_into_cs_validation_progress, translate_into_da_validation_progress, translate_into_de_validation_progress, translate_into_en_gb_validation_progress, translate_into_en_us_validation_progress, translate_into_el_validation_progress, translate_into_es_validation_progress, translate_into_fi_validation_progress, translate_into_fil_validation_progress, translate_into_fr_validation_progress, translate_into_hi_validation_progress, translate_into_hr_validation_progress, translate_into_hu_validation_progress, translate_into_id_validation_progress, translate_into_iw_validation_progress, translate_into_it_validation_progress, translate_into_ja_validation_progress, translate_into_ko_validation_progress, translate_into_lt_validation_progress, translate_into_lv_validation_progress, translate_into_nl_validation_progress, translate_into_no_validation_progress, translate_into_pl_validation_progress, translate_into_pt_validation_progress, translate_into_pt_br_validation_progress, translate_into_pt_pt_validation_progress, translate_into_ro_validation_progress, translate_into_ru_validation_progress, translate_into_sk_validation_progress, translate_into_sl_validation_progress, translate_into_sr_validation_progress, translate_into_sv_validation_progress, translate_into_th_validation_progress, translate_into_tr_validation_progress, translate_into_uk_validation_progress, translate_into_vi_validation_progress, translate_into_zh_validation_progress, translate_into_zh_cn_validation_progress, translate_into_zh_tw_validation_progress, model_class, item_type, created, modified', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->node_id;
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
            parent::relations(), array()
        );
    }

    public function attributeLabels()
    {
        return array(
            'node_id' => Yii::t('model', 'Node'),
            'id' => Yii::t('model', 'ID'),
            '_title' => Yii::t('model', 'Title'),
            'status' => Yii::t('model', 'Status'),
            'preview_validation_progress' => Yii::t('model', 'Preview Validation Progress'),
            'public_validation_progress' => Yii::t('model', 'Public Validation Progress'),
            'approval_progress' => Yii::t('model', 'Approval Progress'),
            'proofing_progress' => Yii::t('model', 'Proofing Progress'),
            'translate_into_en_validation_progress' => Yii::t('model', 'Translate Into En Validation Progress'),
            'translate_into_ar_validation_progress' => Yii::t('model', 'Translate Into Ar Validation Progress'),
            'translate_into_bg_validation_progress' => Yii::t('model', 'Translate Into Bg Validation Progress'),
            'translate_into_ca_validation_progress' => Yii::t('model', 'Translate Into Ca Validation Progress'),
            'translate_into_cs_validation_progress' => Yii::t('model', 'Translate Into Cs Validation Progress'),
            'translate_into_da_validation_progress' => Yii::t('model', 'Translate Into Da Validation Progress'),
            'translate_into_de_validation_progress' => Yii::t('model', 'Translate Into De Validation Progress'),
            'translate_into_en_gb_validation_progress' => Yii::t('model', 'Translate Into En Gb Validation Progress'),
            'translate_into_en_us_validation_progress' => Yii::t('model', 'Translate Into En Us Validation Progress'),
            'translate_into_el_validation_progress' => Yii::t('model', 'Translate Into El Validation Progress'),
            'translate_into_es_validation_progress' => Yii::t('model', 'Translate Into Es Validation Progress'),
            'translate_into_fi_validation_progress' => Yii::t('model', 'Translate Into Fi Validation Progress'),
            'translate_into_fil_validation_progress' => Yii::t('model', 'Translate Into Fil Validation Progress'),
            'translate_into_fr_validation_progress' => Yii::t('model', 'Translate Into Fr Validation Progress'),
            'translate_into_hi_validation_progress' => Yii::t('model', 'Translate Into Hi Validation Progress'),
            'translate_into_hr_validation_progress' => Yii::t('model', 'Translate Into Hr Validation Progress'),
            'translate_into_hu_validation_progress' => Yii::t('model', 'Translate Into Hu Validation Progress'),
            'translate_into_id_validation_progress' => Yii::t('model', 'Translate Into Id Validation Progress'),
            'translate_into_iw_validation_progress' => Yii::t('model', 'Translate Into Iw Validation Progress'),
            'translate_into_it_validation_progress' => Yii::t('model', 'Translate Into It Validation Progress'),
            'translate_into_ja_validation_progress' => Yii::t('model', 'Translate Into Ja Validation Progress'),
            'translate_into_ko_validation_progress' => Yii::t('model', 'Translate Into Ko Validation Progress'),
            'translate_into_lt_validation_progress' => Yii::t('model', 'Translate Into Lt Validation Progress'),
            'translate_into_lv_validation_progress' => Yii::t('model', 'Translate Into Lv Validation Progress'),
            'translate_into_nl_validation_progress' => Yii::t('model', 'Translate Into Nl Validation Progress'),
            'translate_into_no_validation_progress' => Yii::t('model', 'Translate Into No Validation Progress'),
            'translate_into_pl_validation_progress' => Yii::t('model', 'Translate Into Pl Validation Progress'),
            'translate_into_pt_validation_progress' => Yii::t('model', 'Translate Into Pt Validation Progress'),
            'translate_into_pt_br_validation_progress' => Yii::t('model', 'Translate Into Pt Br Validation Progress'),
            'translate_into_pt_pt_validation_progress' => Yii::t('model', 'Translate Into Pt Pt Validation Progress'),
            'translate_into_ro_validation_progress' => Yii::t('model', 'Translate Into Ro Validation Progress'),
            'translate_into_ru_validation_progress' => Yii::t('model', 'Translate Into Ru Validation Progress'),
            'translate_into_sk_validation_progress' => Yii::t('model', 'Translate Into Sk Validation Progress'),
            'translate_into_sl_validation_progress' => Yii::t('model', 'Translate Into Sl Validation Progress'),
            'translate_into_sr_validation_progress' => Yii::t('model', 'Translate Into Sr Validation Progress'),
            'translate_into_sv_validation_progress' => Yii::t('model', 'Translate Into Sv Validation Progress'),
            'translate_into_th_validation_progress' => Yii::t('model', 'Translate Into Th Validation Progress'),
            'translate_into_tr_validation_progress' => Yii::t('model', 'Translate Into Tr Validation Progress'),
            'translate_into_uk_validation_progress' => Yii::t('model', 'Translate Into Uk Validation Progress'),
            'translate_into_vi_validation_progress' => Yii::t('model', 'Translate Into Vi Validation Progress'),
            'translate_into_zh_validation_progress' => Yii::t('model', 'Translate Into Zh Validation Progress'),
            'translate_into_zh_cn_validation_progress' => Yii::t('model', 'Translate Into Zh Cn Validation Progress'),
            'translate_into_zh_tw_validation_progress' => Yii::t('model', 'Translate Into Zh Tw Validation Progress'),
            'model_class' => Yii::t('model', 'Model Class'),
            'item_type' => Yii::t('model', 'Item Type'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.node_id', $this->node_id, true);
        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t._title', $this->_title, true);
        $criteria->compare('t.status', $this->status, true);
        $criteria->compare('t.preview_validation_progress', $this->preview_validation_progress, true);
        $criteria->compare('t.public_validation_progress', $this->public_validation_progress, true);
        $criteria->compare('t.approval_progress', $this->approval_progress, true);
        $criteria->compare('t.proofing_progress', $this->proofing_progress, true);
        $criteria->compare('t.translate_into_en_validation_progress', $this->translate_into_en_validation_progress, true);
        $criteria->compare('t.translate_into_ar_validation_progress', $this->translate_into_ar_validation_progress, true);
        $criteria->compare('t.translate_into_bg_validation_progress', $this->translate_into_bg_validation_progress, true);
        $criteria->compare('t.translate_into_ca_validation_progress', $this->translate_into_ca_validation_progress, true);
        $criteria->compare('t.translate_into_cs_validation_progress', $this->translate_into_cs_validation_progress, true);
        $criteria->compare('t.translate_into_da_validation_progress', $this->translate_into_da_validation_progress, true);
        $criteria->compare('t.translate_into_de_validation_progress', $this->translate_into_de_validation_progress, true);
        $criteria->compare('t.translate_into_en_gb_validation_progress', $this->translate_into_en_gb_validation_progress, true);
        $criteria->compare('t.translate_into_en_us_validation_progress', $this->translate_into_en_us_validation_progress, true);
        $criteria->compare('t.translate_into_el_validation_progress', $this->translate_into_el_validation_progress, true);
        $criteria->compare('t.translate_into_es_validation_progress', $this->translate_into_es_validation_progress, true);
        $criteria->compare('t.translate_into_fi_validation_progress', $this->translate_into_fi_validation_progress, true);
        $criteria->compare('t.translate_into_fil_validation_progress', $this->translate_into_fil_validation_progress, true);
        $criteria->compare('t.translate_into_fr_validation_progress', $this->translate_into_fr_validation_progress, true);
        $criteria->compare('t.translate_into_hi_validation_progress', $this->translate_into_hi_validation_progress, true);
        $criteria->compare('t.translate_into_hr_validation_progress', $this->translate_into_hr_validation_progress, true);
        $criteria->compare('t.translate_into_hu_validation_progress', $this->translate_into_hu_validation_progress, true);
        $criteria->compare('t.translate_into_id_validation_progress', $this->translate_into_id_validation_progress, true);
        $criteria->compare('t.translate_into_iw_validation_progress', $this->translate_into_iw_validation_progress, true);
        $criteria->compare('t.translate_into_it_validation_progress', $this->translate_into_it_validation_progress, true);
        $criteria->compare('t.translate_into_ja_validation_progress', $this->translate_into_ja_validation_progress, true);
        $criteria->compare('t.translate_into_ko_validation_progress', $this->translate_into_ko_validation_progress, true);
        $criteria->compare('t.translate_into_lt_validation_progress', $this->translate_into_lt_validation_progress, true);
        $criteria->compare('t.translate_into_lv_validation_progress', $this->translate_into_lv_validation_progress, true);
        $criteria->compare('t.translate_into_nl_validation_progress', $this->translate_into_nl_validation_progress, true);
        $criteria->compare('t.translate_into_no_validation_progress', $this->translate_into_no_validation_progress, true);
        $criteria->compare('t.translate_into_pl_validation_progress', $this->translate_into_pl_validation_progress, true);
        $criteria->compare('t.translate_into_pt_validation_progress', $this->translate_into_pt_validation_progress, true);
        $criteria->compare('t.translate_into_pt_br_validation_progress', $this->translate_into_pt_br_validation_progress, true);
        $criteria->compare('t.translate_into_pt_pt_validation_progress', $this->translate_into_pt_pt_validation_progress, true);
        $criteria->compare('t.translate_into_ro_validation_progress', $this->translate_into_ro_validation_progress, true);
        $criteria->compare('t.translate_into_ru_validation_progress', $this->translate_into_ru_validation_progress, true);
        $criteria->compare('t.translate_into_sk_validation_progress', $this->translate_into_sk_validation_progress, true);
        $criteria->compare('t.translate_into_sl_validation_progress', $this->translate_into_sl_validation_progress, true);
        $criteria->compare('t.translate_into_sr_validation_progress', $this->translate_into_sr_validation_progress, true);
        $criteria->compare('t.translate_into_sv_validation_progress', $this->translate_into_sv_validation_progress, true);
        $criteria->compare('t.translate_into_th_validation_progress', $this->translate_into_th_validation_progress, true);
        $criteria->compare('t.translate_into_tr_validation_progress', $this->translate_into_tr_validation_progress, true);
        $criteria->compare('t.translate_into_uk_validation_progress', $this->translate_into_uk_validation_progress, true);
        $criteria->compare('t.translate_into_vi_validation_progress', $this->translate_into_vi_validation_progress, true);
        $criteria->compare('t.translate_into_zh_validation_progress', $this->translate_into_zh_validation_progress, true);
        $criteria->compare('t.translate_into_zh_cn_validation_progress', $this->translate_into_zh_cn_validation_progress, true);
        $criteria->compare('t.translate_into_zh_tw_validation_progress', $this->translate_into_zh_tw_validation_progress, true);
        $criteria->compare('t.model_class', $this->model_class, true);
        $criteria->compare('t.item_type', $this->item_type, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);


        return $criteria;

    }

}
