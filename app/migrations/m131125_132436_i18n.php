<?php
class m131125_132436_i18n extends CDbMigration
{
    public function up()
    {
        $this->dropForeignKey('po_file_qa_state_id_fk', 'po_file');
        $this->renameColumn('po_file', 'po_file_qa_state_id_en', 'po_file_qa_state_id');
        $this->addForeignKey('po_file_qa_state_id_fk', 'po_file', 'po_file_qa_state_id', 'po_file_qa_state', 'id', 'SET NULL', 'SET NULL');
        $this->dropForeignKey('po_file_qa_state_id_fk_pt', 'po_file');
        $this->dropColumn('po_file', 'po_file_qa_state_id_pt');
        $this->dropForeignKey('po_file_qa_state_id_fk_de', 'po_file');
        $this->dropColumn('po_file', 'po_file_qa_state_id_de');
        $this->dropForeignKey('po_file_qa_state_id_fk_es', 'po_file');
        $this->dropColumn('po_file', 'po_file_qa_state_id_es');
        $this->dropForeignKey('po_file_qa_state_id_fk_hi', 'po_file');
        $this->dropColumn('po_file', 'po_file_qa_state_id_hi');
        $this->dropForeignKey('po_file_qa_state_id_fk_sv', 'po_file');
        $this->dropColumn('po_file', 'po_file_qa_state_id_sv');
    }

    public function down()
    {
      $this->dropForeignKey('po_file_qa_state_id_fk', 'po_file');
      $this->renameColumn('po_file', 'po_file_qa_state_id', 'po_file_qa_state_id_en');
      $this->addForeignKey('po_file_qa_state_id_fk', 'po_file', 'po_file_qa_state_id_en', 'po_file_qa_state', 'id', 'SET NULL', 'SET NULL');
      $this->addColumn('po_file', 'po_file_qa_state_id_pt', 'bigint(20) null');
      $this->addForeignKey('po_file_qa_state_id_fk_pt', 'po_file', 'po_file_qa_state_id_pt', 'po_file_qa_state', 'id');
      $this->addColumn('po_file', 'po_file_qa_state_id_de', 'bigint(20) null');
      $this->addForeignKey('po_file_qa_state_id_fk_de', 'po_file', 'po_file_qa_state_id_de', 'po_file_qa_state', 'id');
      $this->addColumn('po_file', 'po_file_qa_state_id_es', 'bigint(20) null');
      $this->addForeignKey('po_file_qa_state_id_fk_es', 'po_file', 'po_file_qa_state_id_es', 'po_file_qa_state', 'id');
      $this->addColumn('po_file', 'po_file_qa_state_id_hi', 'bigint(20) null');
      $this->addForeignKey('po_file_qa_state_id_fk_hi', 'po_file', 'po_file_qa_state_id_hi', 'po_file_qa_state', 'id');
      $this->addColumn('po_file', 'po_file_qa_state_id_sv', 'bigint(20) null');
      $this->addForeignKey('po_file_qa_state_id_fk_sv', 'po_file', 'po_file_qa_state_id_sv', 'po_file_qa_state', 'id');
    }
}
