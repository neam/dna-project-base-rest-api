<?php
class m131125_132427_i18n extends CDbMigration
{
    public function up()
    {
        $this->dropForeignKey('data_chunk_qa_state_id_fk', 'data_chunk');
        $this->renameColumn('data_chunk', 'data_chunk_qa_state_id_en', 'data_chunk_qa_state_id');
        $this->addForeignKey('data_chunk_qa_state_id_fk', 'data_chunk', 'data_chunk_qa_state_id', 'data_chunk_qa_state', 'id', 'SET NULL', 'SET NULL');
        $this->dropForeignKey('data_chunk_qa_state_id_fk_pt', 'data_chunk');
        $this->dropColumn('data_chunk', 'data_chunk_qa_state_id_pt');
        $this->dropForeignKey('data_chunk_qa_state_id_fk_de', 'data_chunk');
        $this->dropColumn('data_chunk', 'data_chunk_qa_state_id_de');
        $this->dropForeignKey('data_chunk_qa_state_id_fk_es', 'data_chunk');
        $this->dropColumn('data_chunk', 'data_chunk_qa_state_id_es');
        $this->dropForeignKey('data_chunk_qa_state_id_fk_hi', 'data_chunk');
        $this->dropColumn('data_chunk', 'data_chunk_qa_state_id_hi');
        $this->dropForeignKey('data_chunk_qa_state_id_fk_sv', 'data_chunk');
        $this->dropColumn('data_chunk', 'data_chunk_qa_state_id_sv');
    }

    public function down()
    {
      $this->dropForeignKey('data_chunk_qa_state_id_fk', 'data_chunk');
      $this->renameColumn('data_chunk', 'data_chunk_qa_state_id', 'data_chunk_qa_state_id_en');
      $this->addForeignKey('data_chunk_qa_state_id_fk', 'data_chunk', 'data_chunk_qa_state_id_en', 'data_chunk_qa_state', 'id', 'SET NULL', 'SET NULL');
      $this->addColumn('data_chunk', 'data_chunk_qa_state_id_pt', 'bigint(20) null');
      $this->addForeignKey('data_chunk_qa_state_id_fk_pt', 'data_chunk', 'data_chunk_qa_state_id_pt', 'data_chunk_qa_state', 'id');
      $this->addColumn('data_chunk', 'data_chunk_qa_state_id_de', 'bigint(20) null');
      $this->addForeignKey('data_chunk_qa_state_id_fk_de', 'data_chunk', 'data_chunk_qa_state_id_de', 'data_chunk_qa_state', 'id');
      $this->addColumn('data_chunk', 'data_chunk_qa_state_id_es', 'bigint(20) null');
      $this->addForeignKey('data_chunk_qa_state_id_fk_es', 'data_chunk', 'data_chunk_qa_state_id_es', 'data_chunk_qa_state', 'id');
      $this->addColumn('data_chunk', 'data_chunk_qa_state_id_hi', 'bigint(20) null');
      $this->addForeignKey('data_chunk_qa_state_id_fk_hi', 'data_chunk', 'data_chunk_qa_state_id_hi', 'data_chunk_qa_state', 'id');
      $this->addColumn('data_chunk', 'data_chunk_qa_state_id_sv', 'bigint(20) null');
      $this->addForeignKey('data_chunk_qa_state_id_fk_sv', 'data_chunk', 'data_chunk_qa_state_id_sv', 'data_chunk_qa_state', 'id');
    }
}
