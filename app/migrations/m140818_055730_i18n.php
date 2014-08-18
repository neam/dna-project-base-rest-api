<?php

class m140818_055730_i18n extends CDbMigration
{
    public function up()
    {
        $this->addColumn('i18n_catalog', 'slug_en', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_ar', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_bg', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_ca', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_cs', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_da', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_de', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_en_gb', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_en_us', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_el', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_es', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_fa', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_fi', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_fil', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_fr', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_hi', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_hr', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_hu', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_id', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_iw', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_it', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_ja', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_ko', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_lt', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_lv', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_nl', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_no', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_pl', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_pt', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_pt_br', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_pt_pt', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_ro', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_ru', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_sk', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_sl', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_sr', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_sv', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_th', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_tr', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_uk', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_vi', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_zh', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_zh_cn', 'varchar(255) null');
        $this->addColumn('i18n_catalog', 'slug_zh_tw', 'varchar(255) null');
    }

    public function down()
    {
        $this->dropColumn('i18n_catalog', 'slug_en');
        $this->dropColumn('i18n_catalog', 'slug_ar');
        $this->dropColumn('i18n_catalog', 'slug_bg');
        $this->dropColumn('i18n_catalog', 'slug_ca');
        $this->dropColumn('i18n_catalog', 'slug_cs');
        $this->dropColumn('i18n_catalog', 'slug_da');
        $this->dropColumn('i18n_catalog', 'slug_de');
        $this->dropColumn('i18n_catalog', 'slug_en_gb');
        $this->dropColumn('i18n_catalog', 'slug_en_us');
        $this->dropColumn('i18n_catalog', 'slug_el');
        $this->dropColumn('i18n_catalog', 'slug_es');
        $this->dropColumn('i18n_catalog', 'slug_fa');
        $this->dropColumn('i18n_catalog', 'slug_fi');
        $this->dropColumn('i18n_catalog', 'slug_fil');
        $this->dropColumn('i18n_catalog', 'slug_fr');
        $this->dropColumn('i18n_catalog', 'slug_hi');
        $this->dropColumn('i18n_catalog', 'slug_hr');
        $this->dropColumn('i18n_catalog', 'slug_hu');
        $this->dropColumn('i18n_catalog', 'slug_id');
        $this->dropColumn('i18n_catalog', 'slug_iw');
        $this->dropColumn('i18n_catalog', 'slug_it');
        $this->dropColumn('i18n_catalog', 'slug_ja');
        $this->dropColumn('i18n_catalog', 'slug_ko');
        $this->dropColumn('i18n_catalog', 'slug_lt');
        $this->dropColumn('i18n_catalog', 'slug_lv');
        $this->dropColumn('i18n_catalog', 'slug_nl');
        $this->dropColumn('i18n_catalog', 'slug_no');
        $this->dropColumn('i18n_catalog', 'slug_pl');
        $this->dropColumn('i18n_catalog', 'slug_pt');
        $this->dropColumn('i18n_catalog', 'slug_pt_br');
        $this->dropColumn('i18n_catalog', 'slug_pt_pt');
        $this->dropColumn('i18n_catalog', 'slug_ro');
        $this->dropColumn('i18n_catalog', 'slug_ru');
        $this->dropColumn('i18n_catalog', 'slug_sk');
        $this->dropColumn('i18n_catalog', 'slug_sl');
        $this->dropColumn('i18n_catalog', 'slug_sr');
        $this->dropColumn('i18n_catalog', 'slug_sv');
        $this->dropColumn('i18n_catalog', 'slug_th');
        $this->dropColumn('i18n_catalog', 'slug_tr');
        $this->dropColumn('i18n_catalog', 'slug_uk');
        $this->dropColumn('i18n_catalog', 'slug_vi');
        $this->dropColumn('i18n_catalog', 'slug_zh');
        $this->dropColumn('i18n_catalog', 'slug_zh_cn');
        $this->dropColumn('i18n_catalog', 'slug_zh_tw');
    }
}
