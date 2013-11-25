<?php
class m131125_132439_i18n extends CDbMigration
{
    public function up()
    {
        $this->dropForeignKey('slideshow_file_qa_state_id_fk', 'slideshow_file');
        $this->renameColumn('slideshow_file', 'slideshow_file_qa_state_id_en', 'slideshow_file_qa_state_id');
        $this->addForeignKey('slideshow_file_qa_state_id_fk', 'slideshow_file', 'slideshow_file_qa_state_id', 'slideshow_file_qa_state', 'id', 'SET NULL', 'SET NULL');
        $this->dropForeignKey('slideshow_file_qa_state_id_fk_pt', 'slideshow_file');
        $this->dropColumn('slideshow_file', 'slideshow_file_qa_state_id_pt');
        $this->dropForeignKey('slideshow_file_qa_state_id_fk_de', 'slideshow_file');
        $this->dropColumn('slideshow_file', 'slideshow_file_qa_state_id_de');
        $this->dropForeignKey('slideshow_file_qa_state_id_fk_es', 'slideshow_file');
        $this->dropColumn('slideshow_file', 'slideshow_file_qa_state_id_es');
        $this->dropForeignKey('slideshow_file_qa_state_id_fk_hi', 'slideshow_file');
        $this->dropColumn('slideshow_file', 'slideshow_file_qa_state_id_hi');
        $this->dropForeignKey('slideshow_file_qa_state_id_fk_sv', 'slideshow_file');
        $this->dropColumn('slideshow_file', 'slideshow_file_qa_state_id_sv');
    }

    public function down()
    {
      $this->dropForeignKey('slideshow_file_qa_state_id_fk', 'slideshow_file');
      $this->renameColumn('slideshow_file', 'slideshow_file_qa_state_id', 'slideshow_file_qa_state_id_en');
      $this->addForeignKey('slideshow_file_qa_state_id_fk', 'slideshow_file', 'slideshow_file_qa_state_id_en', 'slideshow_file_qa_state', 'id', 'SET NULL', 'SET NULL');
      $this->addColumn('slideshow_file', 'slideshow_file_qa_state_id_pt', 'bigint(20) null');
      $this->addForeignKey('slideshow_file_qa_state_id_fk_pt', 'slideshow_file', 'slideshow_file_qa_state_id_pt', 'slideshow_file_qa_state', 'id');
      $this->addColumn('slideshow_file', 'slideshow_file_qa_state_id_de', 'bigint(20) null');
      $this->addForeignKey('slideshow_file_qa_state_id_fk_de', 'slideshow_file', 'slideshow_file_qa_state_id_de', 'slideshow_file_qa_state', 'id');
      $this->addColumn('slideshow_file', 'slideshow_file_qa_state_id_es', 'bigint(20) null');
      $this->addForeignKey('slideshow_file_qa_state_id_fk_es', 'slideshow_file', 'slideshow_file_qa_state_id_es', 'slideshow_file_qa_state', 'id');
      $this->addColumn('slideshow_file', 'slideshow_file_qa_state_id_hi', 'bigint(20) null');
      $this->addForeignKey('slideshow_file_qa_state_id_fk_hi', 'slideshow_file', 'slideshow_file_qa_state_id_hi', 'slideshow_file_qa_state', 'id');
      $this->addColumn('slideshow_file', 'slideshow_file_qa_state_id_sv', 'bigint(20) null');
      $this->addForeignKey('slideshow_file_qa_state_id_fk_sv', 'slideshow_file', 'slideshow_file_qa_state_id_sv', 'slideshow_file_qa_state', 'id');
    }
}
