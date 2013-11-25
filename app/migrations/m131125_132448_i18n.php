<?php
class m131125_132448_i18n extends CDbMigration
{
    public function up()
    {
        $this->dropForeignKey('video_file_qa_state_id_fk', 'video_file');
        $this->renameColumn('video_file', 'video_file_qa_state_id_en', 'video_file_qa_state_id');
        $this->addForeignKey('video_file_qa_state_id_fk', 'video_file', 'video_file_qa_state_id', 'video_file_qa_state', 'id', 'SET NULL', 'SET NULL');
        $this->dropForeignKey('video_file_qa_state_id_fk_pt', 'video_file');
        $this->dropColumn('video_file', 'video_file_qa_state_id_pt');
        $this->dropForeignKey('video_file_qa_state_id_fk_de', 'video_file');
        $this->dropColumn('video_file', 'video_file_qa_state_id_de');
        $this->dropForeignKey('video_file_qa_state_id_fk_es', 'video_file');
        $this->dropColumn('video_file', 'video_file_qa_state_id_es');
        $this->dropForeignKey('video_file_qa_state_id_fk_hi', 'video_file');
        $this->dropColumn('video_file', 'video_file_qa_state_id_hi');
        $this->dropForeignKey('video_file_qa_state_id_fk_sv', 'video_file');
        $this->dropColumn('video_file', 'video_file_qa_state_id_sv');
    }

    public function down()
    {
      $this->dropForeignKey('video_file_qa_state_id_fk', 'video_file');
      $this->renameColumn('video_file', 'video_file_qa_state_id', 'video_file_qa_state_id_en');
      $this->addForeignKey('video_file_qa_state_id_fk', 'video_file', 'video_file_qa_state_id_en', 'video_file_qa_state', 'id', 'SET NULL', 'SET NULL');
      $this->addColumn('video_file', 'video_file_qa_state_id_pt', 'bigint(20) null');
      $this->addForeignKey('video_file_qa_state_id_fk_pt', 'video_file', 'video_file_qa_state_id_pt', 'video_file_qa_state', 'id');
      $this->addColumn('video_file', 'video_file_qa_state_id_de', 'bigint(20) null');
      $this->addForeignKey('video_file_qa_state_id_fk_de', 'video_file', 'video_file_qa_state_id_de', 'video_file_qa_state', 'id');
      $this->addColumn('video_file', 'video_file_qa_state_id_es', 'bigint(20) null');
      $this->addForeignKey('video_file_qa_state_id_fk_es', 'video_file', 'video_file_qa_state_id_es', 'video_file_qa_state', 'id');
      $this->addColumn('video_file', 'video_file_qa_state_id_hi', 'bigint(20) null');
      $this->addForeignKey('video_file_qa_state_id_fk_hi', 'video_file', 'video_file_qa_state_id_hi', 'video_file_qa_state', 'id');
      $this->addColumn('video_file', 'video_file_qa_state_id_sv', 'bigint(20) null');
      $this->addForeignKey('video_file_qa_state_id_fk_sv', 'video_file', 'video_file_qa_state_id_sv', 'video_file_qa_state', 'id');
    }
}
