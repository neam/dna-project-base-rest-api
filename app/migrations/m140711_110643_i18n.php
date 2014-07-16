<?php
class m140711_110643_i18n extends CDbMigration
{
    public function up()
    {
        $this->renameColumn('exam_question_alternative', 'slug', 'slug_en');
        $this->addColumn('exam_question_alternative', 'slug_ar', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_bg', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_ca', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_cs', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_da', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_de', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_en_gb', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_en_us', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_el', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_es', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_fa', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_fi', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_fil', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_fr', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_hi', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_hr', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_hu', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_id', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_iw', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_it', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_ja', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_ko', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_lt', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_lv', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_nl', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_no', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_pl', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_pt', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_pt_br', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_pt_pt', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_ro', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_ru', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_sk', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_sl', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_sr', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_sv', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_th', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_tr', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_uk', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_vi', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_zh', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_zh_cn', 'varchar(255) null');
        $this->addColumn('exam_question_alternative', 'slug_zh_tw', 'varchar(255) null');
    }

    public function down()
    {
      $this->renameColumn('exam_question_alternative', 'slug_en', 'slug');
      $this->dropColumn('exam_question_alternative', 'slug_ar');
      $this->dropColumn('exam_question_alternative', 'slug_bg');
      $this->dropColumn('exam_question_alternative', 'slug_ca');
      $this->dropColumn('exam_question_alternative', 'slug_cs');
      $this->dropColumn('exam_question_alternative', 'slug_da');
      $this->dropColumn('exam_question_alternative', 'slug_de');
      $this->dropColumn('exam_question_alternative', 'slug_en_gb');
      $this->dropColumn('exam_question_alternative', 'slug_en_us');
      $this->dropColumn('exam_question_alternative', 'slug_el');
      $this->dropColumn('exam_question_alternative', 'slug_es');
      $this->dropColumn('exam_question_alternative', 'slug_fa');
      $this->dropColumn('exam_question_alternative', 'slug_fi');
      $this->dropColumn('exam_question_alternative', 'slug_fil');
      $this->dropColumn('exam_question_alternative', 'slug_fr');
      $this->dropColumn('exam_question_alternative', 'slug_hi');
      $this->dropColumn('exam_question_alternative', 'slug_hr');
      $this->dropColumn('exam_question_alternative', 'slug_hu');
      $this->dropColumn('exam_question_alternative', 'slug_id');
      $this->dropColumn('exam_question_alternative', 'slug_iw');
      $this->dropColumn('exam_question_alternative', 'slug_it');
      $this->dropColumn('exam_question_alternative', 'slug_ja');
      $this->dropColumn('exam_question_alternative', 'slug_ko');
      $this->dropColumn('exam_question_alternative', 'slug_lt');
      $this->dropColumn('exam_question_alternative', 'slug_lv');
      $this->dropColumn('exam_question_alternative', 'slug_nl');
      $this->dropColumn('exam_question_alternative', 'slug_no');
      $this->dropColumn('exam_question_alternative', 'slug_pl');
      $this->dropColumn('exam_question_alternative', 'slug_pt');
      $this->dropColumn('exam_question_alternative', 'slug_pt_br');
      $this->dropColumn('exam_question_alternative', 'slug_pt_pt');
      $this->dropColumn('exam_question_alternative', 'slug_ro');
      $this->dropColumn('exam_question_alternative', 'slug_ru');
      $this->dropColumn('exam_question_alternative', 'slug_sk');
      $this->dropColumn('exam_question_alternative', 'slug_sl');
      $this->dropColumn('exam_question_alternative', 'slug_sr');
      $this->dropColumn('exam_question_alternative', 'slug_sv');
      $this->dropColumn('exam_question_alternative', 'slug_th');
      $this->dropColumn('exam_question_alternative', 'slug_tr');
      $this->dropColumn('exam_question_alternative', 'slug_uk');
      $this->dropColumn('exam_question_alternative', 'slug_vi');
      $this->dropColumn('exam_question_alternative', 'slug_zh');
      $this->dropColumn('exam_question_alternative', 'slug_zh_cn');
      $this->dropColumn('exam_question_alternative', 'slug_zh_tw');
    }
}
