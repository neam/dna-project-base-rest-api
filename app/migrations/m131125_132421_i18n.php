<?php
class m131125_132421_i18n extends CDbMigration
{
    public function up()
    {
        $this->dropForeignKey('chapter_qa_state_id_fk', 'chapter');
        $this->renameColumn('chapter', 'chapter_qa_state_id_en', 'chapter_qa_state_id');
        $this->addForeignKey('chapter_qa_state_id_fk', 'chapter', 'chapter_qa_state_id', 'chapter_qa_state', 'id', 'SET NULL', 'SET NULL');
        $this->dropForeignKey('chapter_qa_state_id_fk_pt', 'chapter');
        $this->dropColumn('chapter', 'chapter_qa_state_id_pt');
        $this->dropForeignKey('chapter_qa_state_id_fk_de', 'chapter');
        $this->dropColumn('chapter', 'chapter_qa_state_id_de');
        $this->dropForeignKey('chapter_qa_state_id_fk_es', 'chapter');
        $this->dropColumn('chapter', 'chapter_qa_state_id_es');
        $this->dropForeignKey('chapter_qa_state_id_fk_hi', 'chapter');
        $this->dropColumn('chapter', 'chapter_qa_state_id_hi');
        $this->dropForeignKey('chapter_qa_state_id_fk_sv', 'chapter');
        $this->dropColumn('chapter', 'chapter_qa_state_id_sv');
    }

    public function down()
    {
      $this->dropForeignKey('chapter_qa_state_id_fk', 'chapter');
      $this->renameColumn('chapter', 'chapter_qa_state_id', 'chapter_qa_state_id_en');
      $this->addForeignKey('chapter_qa_state_id_fk', 'chapter', 'chapter_qa_state_id_en', 'chapter_qa_state', 'id', 'SET NULL', 'SET NULL');
      $this->addColumn('chapter', 'chapter_qa_state_id_pt', 'bigint(20) null');
      $this->addForeignKey('chapter_qa_state_id_fk_pt', 'chapter', 'chapter_qa_state_id_pt', 'chapter_qa_state', 'id');
      $this->addColumn('chapter', 'chapter_qa_state_id_de', 'bigint(20) null');
      $this->addForeignKey('chapter_qa_state_id_fk_de', 'chapter', 'chapter_qa_state_id_de', 'chapter_qa_state', 'id');
      $this->addColumn('chapter', 'chapter_qa_state_id_es', 'bigint(20) null');
      $this->addForeignKey('chapter_qa_state_id_fk_es', 'chapter', 'chapter_qa_state_id_es', 'chapter_qa_state', 'id');
      $this->addColumn('chapter', 'chapter_qa_state_id_hi', 'bigint(20) null');
      $this->addForeignKey('chapter_qa_state_id_fk_hi', 'chapter', 'chapter_qa_state_id_hi', 'chapter_qa_state', 'id');
      $this->addColumn('chapter', 'chapter_qa_state_id_sv', 'bigint(20) null');
      $this->addForeignKey('chapter_qa_state_id_fk_sv', 'chapter', 'chapter_qa_state_id_sv', 'chapter_qa_state', 'id');
    }
}
