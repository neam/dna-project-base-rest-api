<?php

/**
 * This is the model base class for the table "tool".
 *
 * Columns in table "tool" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $_title
 * @property string $slug_en
 * @property string $_about
 * @property string $embed_template
 * @property string $i18n_catalog_id
 * @property string $created
 * @property string $modified
 * @property integer $owner_id
 * @property string $node_id
 * @property string $slug_es
 * @property string $slug_hi
 * @property string $slug_pt
 * @property string $slug_sv
 * @property string $slug_de
 * @property string $tool_qa_state_id
 * @property string $slug_zh
 * @property string $slug_ar
 * @property string $slug_bg
 * @property string $slug_ca
 * @property string $slug_cs
 * @property string $slug_da
 * @property string $slug_en_gb
 * @property string $slug_en_us
 * @property string $slug_el
 * @property string $slug_fi
 * @property string $slug_fil
 * @property string $slug_fr
 * @property string $slug_hr
 * @property string $slug_hu
 * @property string $slug_id
 * @property string $slug_iw
 * @property string $slug_it
 * @property string $slug_ja
 * @property string $slug_ko
 * @property string $slug_lt
 * @property string $slug_lv
 * @property string $slug_nl
 * @property string $slug_no
 * @property string $slug_pl
 * @property string $slug_pt_br
 * @property string $slug_pt_pt
 * @property string $slug_ro
 * @property string $slug_ru
 * @property string $slug_sk
 * @property string $slug_sl
 * @property string $slug_sr
 * @property string $slug_th
 * @property string $slug_tr
 * @property string $slug_uk
 * @property string $slug_vi
 * @property string $slug_zh_cn
 * @property string $slug_zh_tw
 *
 * Relations of table "tool" available as properties of the model:
 * @property Snapshot[] $snapshots
 * @property Node $node
 * @property I18nCatalog $i18nCatalog
 * @property Tool $clonedFrom
 * @property Tool[] $tools
 * @property Account $owner
 * @property ToolQaState $toolQaState
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
                array('version, cloned_from_id, _title, slug_en, _about, embed_template, i18n_catalog_id, created, modified, owner_id, node_id, slug_es, slug_hi, slug_pt, slug_sv, slug_de, tool_qa_state_id, slug_zh, slug_ar, slug_bg, slug_ca, slug_cs, slug_da, slug_en_gb, slug_en_us, slug_el, slug_fi, slug_fil, slug_fr, slug_hr, slug_hu, slug_id, slug_iw, slug_it, slug_ja, slug_ko, slug_lt, slug_lv, slug_nl, slug_no, slug_pl, slug_pt_br, slug_pt_pt, slug_ro, slug_ru, slug_sk, slug_sl, slug_sr, slug_th, slug_tr, slug_uk, slug_vi, slug_zh_cn, slug_zh_tw', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, owner_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, i18n_catalog_id, node_id, tool_qa_state_id', 'length', 'max' => 20),
                array('_title, slug_en, slug_es, slug_hi, slug_pt, slug_sv, slug_de, slug_zh, slug_ar, slug_bg, slug_ca, slug_cs, slug_da, slug_en_gb, slug_en_us, slug_el, slug_fi, slug_fil, slug_fr, slug_hr, slug_hu, slug_id, slug_iw, slug_it, slug_ja, slug_ko, slug_lt, slug_lv, slug_nl, slug_no, slug_pl, slug_pt_br, slug_pt_pt, slug_ro, slug_ru, slug_sk, slug_sl, slug_sr, slug_th, slug_tr, slug_uk, slug_vi, slug_zh_cn, slug_zh_tw', 'length', 'max' => 255),
                array('_about, embed_template, created, modified', 'safe'),
                array('id, version, cloned_from_id, _title, slug_en, _about, embed_template, i18n_catalog_id, created, modified, owner_id, node_id, slug_es, slug_hi, slug_pt, slug_sv, slug_de, tool_qa_state_id, slug_zh, slug_ar, slug_bg, slug_ca, slug_cs, slug_da, slug_en_gb, slug_en_us, slug_el, slug_fi, slug_fil, slug_fr, slug_hr, slug_hu, slug_id, slug_iw, slug_it, slug_ja, slug_ko, slug_lt, slug_lv, slug_nl, slug_no, slug_pl, slug_pt_br, slug_pt_pt, slug_ro, slug_ru, slug_sk, slug_sl, slug_sr, slug_th, slug_tr, slug_uk, slug_vi, slug_zh_cn, slug_zh_tw', 'safe', 'on' => 'search'),
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
                'snapshots' => array(self::HAS_MANY, 'Snapshot', 'tool_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'i18nCatalog' => array(self::BELONGS_TO, 'I18nCatalog', 'i18n_catalog_id'),
                'clonedFrom' => array(self::BELONGS_TO, 'Tool', 'cloned_from_id'),
                'tools' => array(self::HAS_MANY, 'Tool', 'cloned_from_id'),
                'owner' => array(self::BELONGS_TO, 'Account', 'owner_id'),
                'toolQaState' => array(self::BELONGS_TO, 'ToolQaState', 'tool_qa_state_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'cloned_from_id' => Yii::t('model', 'Cloned From'),
            '_title' => Yii::t('model', 'Title'),
            'slug_en' => Yii::t('model', 'Slug En'),
            '_about' => Yii::t('model', 'About'),
            'embed_template' => Yii::t('model', 'Embed Template'),
            'i18n_catalog_id' => Yii::t('model', 'I18n Catalog'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'owner_id' => Yii::t('model', 'Owner'),
            'node_id' => Yii::t('model', 'Node'),
            'slug_es' => Yii::t('model', 'Slug Es'),
            'slug_hi' => Yii::t('model', 'Slug Hi'),
            'slug_pt' => Yii::t('model', 'Slug Pt'),
            'slug_sv' => Yii::t('model', 'Slug Sv'),
            'slug_de' => Yii::t('model', 'Slug De'),
            'tool_qa_state_id' => Yii::t('model', 'Tool Qa State'),
            'slug_zh' => Yii::t('model', 'Slug Zh'),
            'slug_ar' => Yii::t('model', 'Slug Ar'),
            'slug_bg' => Yii::t('model', 'Slug Bg'),
            'slug_ca' => Yii::t('model', 'Slug Ca'),
            'slug_cs' => Yii::t('model', 'Slug Cs'),
            'slug_da' => Yii::t('model', 'Slug Da'),
            'slug_en_gb' => Yii::t('model', 'Slug En Gb'),
            'slug_en_us' => Yii::t('model', 'Slug En Us'),
            'slug_el' => Yii::t('model', 'Slug El'),
            'slug_fi' => Yii::t('model', 'Slug Fi'),
            'slug_fil' => Yii::t('model', 'Slug Fil'),
            'slug_fr' => Yii::t('model', 'Slug Fr'),
            'slug_hr' => Yii::t('model', 'Slug Hr'),
            'slug_hu' => Yii::t('model', 'Slug Hu'),
            'slug_id' => Yii::t('model', 'Slug'),
            'slug_iw' => Yii::t('model', 'Slug Iw'),
            'slug_it' => Yii::t('model', 'Slug It'),
            'slug_ja' => Yii::t('model', 'Slug Ja'),
            'slug_ko' => Yii::t('model', 'Slug Ko'),
            'slug_lt' => Yii::t('model', 'Slug Lt'),
            'slug_lv' => Yii::t('model', 'Slug Lv'),
            'slug_nl' => Yii::t('model', 'Slug Nl'),
            'slug_no' => Yii::t('model', 'Slug No'),
            'slug_pl' => Yii::t('model', 'Slug Pl'),
            'slug_pt_br' => Yii::t('model', 'Slug Pt Br'),
            'slug_pt_pt' => Yii::t('model', 'Slug Pt Pt'),
            'slug_ro' => Yii::t('model', 'Slug Ro'),
            'slug_ru' => Yii::t('model', 'Slug Ru'),
            'slug_sk' => Yii::t('model', 'Slug Sk'),
            'slug_sl' => Yii::t('model', 'Slug Sl'),
            'slug_sr' => Yii::t('model', 'Slug Sr'),
            'slug_th' => Yii::t('model', 'Slug Th'),
            'slug_tr' => Yii::t('model', 'Slug Tr'),
            'slug_uk' => Yii::t('model', 'Slug Uk'),
            'slug_vi' => Yii::t('model', 'Slug Vi'),
            'slug_zh_cn' => Yii::t('model', 'Slug Zh Cn'),
            'slug_zh_tw' => Yii::t('model', 'Slug Zh Tw'),
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
        $criteria->compare('t._title', $this->_title, true);
        $criteria->compare('t.slug_en', $this->slug_en, true);
        $criteria->compare('t._about', $this->_about, true);
        $criteria->compare('t.embed_template', $this->embed_template, true);
        $criteria->compare('t.i18n_catalog_id', $this->i18n_catalog_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.owner_id', $this->owner_id);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.slug_es', $this->slug_es, true);
        $criteria->compare('t.slug_hi', $this->slug_hi, true);
        $criteria->compare('t.slug_pt', $this->slug_pt, true);
        $criteria->compare('t.slug_sv', $this->slug_sv, true);
        $criteria->compare('t.slug_de', $this->slug_de, true);
        $criteria->compare('t.tool_qa_state_id', $this->tool_qa_state_id);
        $criteria->compare('t.slug_zh', $this->slug_zh, true);
        $criteria->compare('t.slug_ar', $this->slug_ar, true);
        $criteria->compare('t.slug_bg', $this->slug_bg, true);
        $criteria->compare('t.slug_ca', $this->slug_ca, true);
        $criteria->compare('t.slug_cs', $this->slug_cs, true);
        $criteria->compare('t.slug_da', $this->slug_da, true);
        $criteria->compare('t.slug_en_gb', $this->slug_en_gb, true);
        $criteria->compare('t.slug_en_us', $this->slug_en_us, true);
        $criteria->compare('t.slug_el', $this->slug_el, true);
        $criteria->compare('t.slug_fi', $this->slug_fi, true);
        $criteria->compare('t.slug_fil', $this->slug_fil, true);
        $criteria->compare('t.slug_fr', $this->slug_fr, true);
        $criteria->compare('t.slug_hr', $this->slug_hr, true);
        $criteria->compare('t.slug_hu', $this->slug_hu, true);
        $criteria->compare('t.slug_id', $this->slug_id, true);
        $criteria->compare('t.slug_iw', $this->slug_iw, true);
        $criteria->compare('t.slug_it', $this->slug_it, true);
        $criteria->compare('t.slug_ja', $this->slug_ja, true);
        $criteria->compare('t.slug_ko', $this->slug_ko, true);
        $criteria->compare('t.slug_lt', $this->slug_lt, true);
        $criteria->compare('t.slug_lv', $this->slug_lv, true);
        $criteria->compare('t.slug_nl', $this->slug_nl, true);
        $criteria->compare('t.slug_no', $this->slug_no, true);
        $criteria->compare('t.slug_pl', $this->slug_pl, true);
        $criteria->compare('t.slug_pt_br', $this->slug_pt_br, true);
        $criteria->compare('t.slug_pt_pt', $this->slug_pt_pt, true);
        $criteria->compare('t.slug_ro', $this->slug_ro, true);
        $criteria->compare('t.slug_ru', $this->slug_ru, true);
        $criteria->compare('t.slug_sk', $this->slug_sk, true);
        $criteria->compare('t.slug_sl', $this->slug_sl, true);
        $criteria->compare('t.slug_sr', $this->slug_sr, true);
        $criteria->compare('t.slug_th', $this->slug_th, true);
        $criteria->compare('t.slug_tr', $this->slug_tr, true);
        $criteria->compare('t.slug_uk', $this->slug_uk, true);
        $criteria->compare('t.slug_vi', $this->slug_vi, true);
        $criteria->compare('t.slug_zh_cn', $this->slug_zh_cn, true);
        $criteria->compare('t.slug_zh_tw', $this->slug_zh_tw, true);


        return $criteria;

    }

}
