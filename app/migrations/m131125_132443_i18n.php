<?php
class m131125_132443_i18n extends CDbMigration
{
    public function up()
    {
        $this->dropForeignKey('text_doc_qa_state_id_fk', 'text_doc');
        $this->renameColumn('text_doc', 'text_doc_qa_state_id_en', 'text_doc_qa_state_id');
        $this->addForeignKey('text_doc_qa_state_id_fk', 'text_doc', 'text_doc_qa_state_id', 'text_doc_qa_state', 'id', 'SET NULL', 'SET NULL');
        $this->dropForeignKey('text_doc_qa_state_id_fk_pt', 'text_doc');
        $this->dropColumn('text_doc', 'text_doc_qa_state_id_pt');
        $this->dropForeignKey('text_doc_qa_state_id_fk_de', 'text_doc');
        $this->dropColumn('text_doc', 'text_doc_qa_state_id_de');
        $this->dropForeignKey('text_doc_qa_state_id_fk_es', 'text_doc');
        $this->dropColumn('text_doc', 'text_doc_qa_state_id_es');
        $this->dropForeignKey('text_doc_qa_state_id_fk_hi', 'text_doc');
        $this->dropColumn('text_doc', 'text_doc_qa_state_id_hi');
        $this->dropForeignKey('text_doc_qa_state_id_fk_sv', 'text_doc');
        $this->dropColumn('text_doc', 'text_doc_qa_state_id_sv');
    }

    public function down()
    {
      $this->dropForeignKey('text_doc_qa_state_id_fk', 'text_doc');
      $this->renameColumn('text_doc', 'text_doc_qa_state_id', 'text_doc_qa_state_id_en');
      $this->addForeignKey('text_doc_qa_state_id_fk', 'text_doc', 'text_doc_qa_state_id_en', 'text_doc_qa_state', 'id', 'SET NULL', 'SET NULL');
      $this->addColumn('text_doc', 'text_doc_qa_state_id_pt', 'bigint(20) null');
      $this->addForeignKey('text_doc_qa_state_id_fk_pt', 'text_doc', 'text_doc_qa_state_id_pt', 'text_doc_qa_state', 'id');
      $this->addColumn('text_doc', 'text_doc_qa_state_id_de', 'bigint(20) null');
      $this->addForeignKey('text_doc_qa_state_id_fk_de', 'text_doc', 'text_doc_qa_state_id_de', 'text_doc_qa_state', 'id');
      $this->addColumn('text_doc', 'text_doc_qa_state_id_es', 'bigint(20) null');
      $this->addForeignKey('text_doc_qa_state_id_fk_es', 'text_doc', 'text_doc_qa_state_id_es', 'text_doc_qa_state', 'id');
      $this->addColumn('text_doc', 'text_doc_qa_state_id_hi', 'bigint(20) null');
      $this->addForeignKey('text_doc_qa_state_id_fk_hi', 'text_doc', 'text_doc_qa_state_id_hi', 'text_doc_qa_state', 'id');
      $this->addColumn('text_doc', 'text_doc_qa_state_id_sv', 'bigint(20) null');
      $this->addForeignKey('text_doc_qa_state_id_fk_sv', 'text_doc', 'text_doc_qa_state_id_sv', 'text_doc_qa_state', 'id');
    }
}
