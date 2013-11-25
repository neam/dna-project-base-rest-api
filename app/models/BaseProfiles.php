<?php

/**
 * This is the model base class for the table "profiles".
 *
 * Columns in table "profiles" available as properties of the model:
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property integer $public_profile
 * @property integer $picture_media_id
 * @property string $website
 * @property integer $others_may_contact_me
 * @property string $about
 * @property string $lives_in
 * @property integer $can_translate_to_en
 * @property integer $can_translate_to_es
 * @property integer $can_translate_to_hi
 * @property integer $can_translate_to_pt
 * @property integer $can_translate_to_sv
 * @property integer $can_translate_to_de
 * @property integer $can_translate_to_zh
 * @property integer $can_translate_to_ar
 * @property integer $can_translate_to_bg
 * @property integer $can_translate_to_ca
 * @property integer $can_translate_to_cs
 * @property integer $can_translate_to_da
 * @property integer $can_translate_to_en_gb
 * @property integer $can_translate_to_en_us
 * @property integer $can_translate_to_el
 * @property integer $can_translate_to_fi
 * @property integer $can_translate_to_fil
 * @property integer $can_translate_to_fr
 * @property integer $can_translate_to_hr
 * @property integer $can_translate_to_hu
 * @property integer $can_translate_to_id
 * @property integer $can_translate_to_iw
 * @property integer $can_translate_to_it
 * @property integer $can_translate_to_ja
 * @property integer $can_translate_to_ko
 * @property integer $can_translate_to_lt
 * @property integer $can_translate_to_lv
 * @property integer $can_translate_to_nl
 * @property integer $can_translate_to_no
 * @property integer $can_translate_to_pl
 * @property integer $can_translate_to_pt_br
 * @property integer $can_translate_to_pt_pt
 * @property integer $can_translate_to_ro
 * @property integer $can_translate_to_ru
 * @property integer $can_translate_to_sk
 * @property integer $can_translate_to_sl
 * @property integer $can_translate_to_sr
 * @property integer $can_translate_to_th
 * @property integer $can_translate_to_tr
 * @property integer $can_translate_to_uk
 * @property integer $can_translate_to_vi
 * @property integer $can_translate_to_zh_cn
 * @property integer $can_translate_to_zh_tw
 *
 * Relations of table "profiles" available as properties of the model:
 * @property P3Media $pictureMedia
 * @property Users $user
 */
abstract class BaseProfiles extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'profiles';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('first_name, last_name, public_profile, picture_media_id, website, others_may_contact_me, about, lives_in, can_translate_to_en, can_translate_to_es, can_translate_to_hi, can_translate_to_pt, can_translate_to_sv, can_translate_to_de, can_translate_to_zh, can_translate_to_ar, can_translate_to_bg, can_translate_to_ca, can_translate_to_cs, can_translate_to_da, can_translate_to_en_gb, can_translate_to_en_us, can_translate_to_el, can_translate_to_fi, can_translate_to_fil, can_translate_to_fr, can_translate_to_hr, can_translate_to_hu, can_translate_to_id, can_translate_to_iw, can_translate_to_it, can_translate_to_ja, can_translate_to_ko, can_translate_to_lt, can_translate_to_lv, can_translate_to_nl, can_translate_to_no, can_translate_to_pl, can_translate_to_pt_br, can_translate_to_pt_pt, can_translate_to_ro, can_translate_to_ru, can_translate_to_sk, can_translate_to_sl, can_translate_to_sr, can_translate_to_th, can_translate_to_tr, can_translate_to_uk, can_translate_to_vi, can_translate_to_zh_cn, can_translate_to_zh_tw', 'default', 'setOnEmpty' => true, 'value' => null),
                array('public_profile, picture_media_id, others_may_contact_me, can_translate_to_en, can_translate_to_es, can_translate_to_hi, can_translate_to_pt, can_translate_to_sv, can_translate_to_de, can_translate_to_zh, can_translate_to_ar, can_translate_to_bg, can_translate_to_ca, can_translate_to_cs, can_translate_to_da, can_translate_to_en_gb, can_translate_to_en_us, can_translate_to_el, can_translate_to_fi, can_translate_to_fil, can_translate_to_fr, can_translate_to_hr, can_translate_to_hu, can_translate_to_id, can_translate_to_iw, can_translate_to_it, can_translate_to_ja, can_translate_to_ko, can_translate_to_lt, can_translate_to_lv, can_translate_to_nl, can_translate_to_no, can_translate_to_pl, can_translate_to_pt_br, can_translate_to_pt_pt, can_translate_to_ro, can_translate_to_ru, can_translate_to_sk, can_translate_to_sl, can_translate_to_sr, can_translate_to_th, can_translate_to_tr, can_translate_to_uk, can_translate_to_vi, can_translate_to_zh_cn, can_translate_to_zh_tw', 'numerical', 'integerOnly' => true),
                array('first_name, last_name, website, lives_in', 'length', 'max' => 255),
                array('about', 'safe'),
                array('user_id, first_name, last_name, public_profile, picture_media_id, website, others_may_contact_me, about, lives_in, can_translate_to_en, can_translate_to_es, can_translate_to_hi, can_translate_to_pt, can_translate_to_sv, can_translate_to_de, can_translate_to_zh, can_translate_to_ar, can_translate_to_bg, can_translate_to_ca, can_translate_to_cs, can_translate_to_da, can_translate_to_en_gb, can_translate_to_en_us, can_translate_to_el, can_translate_to_fi, can_translate_to_fil, can_translate_to_fr, can_translate_to_hr, can_translate_to_hu, can_translate_to_id, can_translate_to_iw, can_translate_to_it, can_translate_to_ja, can_translate_to_ko, can_translate_to_lt, can_translate_to_lv, can_translate_to_nl, can_translate_to_no, can_translate_to_pl, can_translate_to_pt_br, can_translate_to_pt_pt, can_translate_to_ro, can_translate_to_ru, can_translate_to_sk, can_translate_to_sl, can_translate_to_sr, can_translate_to_th, can_translate_to_tr, can_translate_to_uk, can_translate_to_vi, can_translate_to_zh_cn, can_translate_to_zh_tw', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->first_name;
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
                'pictureMedia' => array(self::BELONGS_TO, 'P3Media', 'picture_media_id'),
                'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'user_id' => Yii::t('model', 'User'),
            'first_name' => Yii::t('model', 'First Name'),
            'last_name' => Yii::t('model', 'Last Name'),
            'public_profile' => Yii::t('model', 'Public Profile'),
            'picture_media_id' => Yii::t('model', 'Picture Media'),
            'website' => Yii::t('model', 'Website'),
            'others_may_contact_me' => Yii::t('model', 'Others May Contact Me'),
            'about' => Yii::t('model', 'About'),
            'lives_in' => Yii::t('model', 'Lives In'),
            'can_translate_to_en' => Yii::t('model', 'Can Translate To En'),
            'can_translate_to_es' => Yii::t('model', 'Can Translate To Es'),
            'can_translate_to_hi' => Yii::t('model', 'Can Translate To Hi'),
            'can_translate_to_pt' => Yii::t('model', 'Can Translate To Pt'),
            'can_translate_to_sv' => Yii::t('model', 'Can Translate To Sv'),
            'can_translate_to_de' => Yii::t('model', 'Can Translate To De'),
            'can_translate_to_zh' => Yii::t('model', 'Can Translate To Zh'),
            'can_translate_to_ar' => Yii::t('model', 'Can Translate To Ar'),
            'can_translate_to_bg' => Yii::t('model', 'Can Translate To Bg'),
            'can_translate_to_ca' => Yii::t('model', 'Can Translate To Ca'),
            'can_translate_to_cs' => Yii::t('model', 'Can Translate To Cs'),
            'can_translate_to_da' => Yii::t('model', 'Can Translate To Da'),
            'can_translate_to_en_gb' => Yii::t('model', 'Can Translate To En Gb'),
            'can_translate_to_en_us' => Yii::t('model', 'Can Translate To En Us'),
            'can_translate_to_el' => Yii::t('model', 'Can Translate To El'),
            'can_translate_to_fi' => Yii::t('model', 'Can Translate To Fi'),
            'can_translate_to_fil' => Yii::t('model', 'Can Translate To Fil'),
            'can_translate_to_fr' => Yii::t('model', 'Can Translate To Fr'),
            'can_translate_to_hr' => Yii::t('model', 'Can Translate To Hr'),
            'can_translate_to_hu' => Yii::t('model', 'Can Translate To Hu'),
            'can_translate_to_id' => Yii::t('model', 'Can Translate To'),
            'can_translate_to_iw' => Yii::t('model', 'Can Translate To Iw'),
            'can_translate_to_it' => Yii::t('model', 'Can Translate To It'),
            'can_translate_to_ja' => Yii::t('model', 'Can Translate To Ja'),
            'can_translate_to_ko' => Yii::t('model', 'Can Translate To Ko'),
            'can_translate_to_lt' => Yii::t('model', 'Can Translate To Lt'),
            'can_translate_to_lv' => Yii::t('model', 'Can Translate To Lv'),
            'can_translate_to_nl' => Yii::t('model', 'Can Translate To Nl'),
            'can_translate_to_no' => Yii::t('model', 'Can Translate To No'),
            'can_translate_to_pl' => Yii::t('model', 'Can Translate To Pl'),
            'can_translate_to_pt_br' => Yii::t('model', 'Can Translate To Pt Br'),
            'can_translate_to_pt_pt' => Yii::t('model', 'Can Translate To Pt Pt'),
            'can_translate_to_ro' => Yii::t('model', 'Can Translate To Ro'),
            'can_translate_to_ru' => Yii::t('model', 'Can Translate To Ru'),
            'can_translate_to_sk' => Yii::t('model', 'Can Translate To Sk'),
            'can_translate_to_sl' => Yii::t('model', 'Can Translate To Sl'),
            'can_translate_to_sr' => Yii::t('model', 'Can Translate To Sr'),
            'can_translate_to_th' => Yii::t('model', 'Can Translate To Th'),
            'can_translate_to_tr' => Yii::t('model', 'Can Translate To Tr'),
            'can_translate_to_uk' => Yii::t('model', 'Can Translate To Uk'),
            'can_translate_to_vi' => Yii::t('model', 'Can Translate To Vi'),
            'can_translate_to_zh_cn' => Yii::t('model', 'Can Translate To Zh Cn'),
            'can_translate_to_zh_tw' => Yii::t('model', 'Can Translate To Zh Tw'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.user_id', $this->user_id);
        $criteria->compare('t.first_name', $this->first_name, true);
        $criteria->compare('t.last_name', $this->last_name, true);
        $criteria->compare('t.public_profile', $this->public_profile);
        $criteria->compare('t.picture_media_id', $this->picture_media_id);
        $criteria->compare('t.website', $this->website, true);
        $criteria->compare('t.others_may_contact_me', $this->others_may_contact_me);
        $criteria->compare('t.about', $this->about, true);
        $criteria->compare('t.lives_in', $this->lives_in, true);
        $criteria->compare('t.can_translate_to_en', $this->can_translate_to_en);
        $criteria->compare('t.can_translate_to_es', $this->can_translate_to_es);
        $criteria->compare('t.can_translate_to_hi', $this->can_translate_to_hi);
        $criteria->compare('t.can_translate_to_pt', $this->can_translate_to_pt);
        $criteria->compare('t.can_translate_to_sv', $this->can_translate_to_sv);
        $criteria->compare('t.can_translate_to_de', $this->can_translate_to_de);
        $criteria->compare('t.can_translate_to_zh', $this->can_translate_to_zh);
        $criteria->compare('t.can_translate_to_ar', $this->can_translate_to_ar);
        $criteria->compare('t.can_translate_to_bg', $this->can_translate_to_bg);
        $criteria->compare('t.can_translate_to_ca', $this->can_translate_to_ca);
        $criteria->compare('t.can_translate_to_cs', $this->can_translate_to_cs);
        $criteria->compare('t.can_translate_to_da', $this->can_translate_to_da);
        $criteria->compare('t.can_translate_to_en_gb', $this->can_translate_to_en_gb);
        $criteria->compare('t.can_translate_to_en_us', $this->can_translate_to_en_us);
        $criteria->compare('t.can_translate_to_el', $this->can_translate_to_el);
        $criteria->compare('t.can_translate_to_fi', $this->can_translate_to_fi);
        $criteria->compare('t.can_translate_to_fil', $this->can_translate_to_fil);
        $criteria->compare('t.can_translate_to_fr', $this->can_translate_to_fr);
        $criteria->compare('t.can_translate_to_hr', $this->can_translate_to_hr);
        $criteria->compare('t.can_translate_to_hu', $this->can_translate_to_hu);
        $criteria->compare('t.can_translate_to_id', $this->can_translate_to_id);
        $criteria->compare('t.can_translate_to_iw', $this->can_translate_to_iw);
        $criteria->compare('t.can_translate_to_it', $this->can_translate_to_it);
        $criteria->compare('t.can_translate_to_ja', $this->can_translate_to_ja);
        $criteria->compare('t.can_translate_to_ko', $this->can_translate_to_ko);
        $criteria->compare('t.can_translate_to_lt', $this->can_translate_to_lt);
        $criteria->compare('t.can_translate_to_lv', $this->can_translate_to_lv);
        $criteria->compare('t.can_translate_to_nl', $this->can_translate_to_nl);
        $criteria->compare('t.can_translate_to_no', $this->can_translate_to_no);
        $criteria->compare('t.can_translate_to_pl', $this->can_translate_to_pl);
        $criteria->compare('t.can_translate_to_pt_br', $this->can_translate_to_pt_br);
        $criteria->compare('t.can_translate_to_pt_pt', $this->can_translate_to_pt_pt);
        $criteria->compare('t.can_translate_to_ro', $this->can_translate_to_ro);
        $criteria->compare('t.can_translate_to_ru', $this->can_translate_to_ru);
        $criteria->compare('t.can_translate_to_sk', $this->can_translate_to_sk);
        $criteria->compare('t.can_translate_to_sl', $this->can_translate_to_sl);
        $criteria->compare('t.can_translate_to_sr', $this->can_translate_to_sr);
        $criteria->compare('t.can_translate_to_th', $this->can_translate_to_th);
        $criteria->compare('t.can_translate_to_tr', $this->can_translate_to_tr);
        $criteria->compare('t.can_translate_to_uk', $this->can_translate_to_uk);
        $criteria->compare('t.can_translate_to_vi', $this->can_translate_to_vi);
        $criteria->compare('t.can_translate_to_zh_cn', $this->can_translate_to_zh_cn);
        $criteria->compare('t.can_translate_to_zh_tw', $this->can_translate_to_zh_tw);


        return $criteria;

    }

}
