<?php
class m131125_132441_i18n extends CDbMigration
{
    public function up()
    {
        $this->dropForeignKey('snapshot_qa_state_id_fk', 'snapshot');
        $this->renameColumn('snapshot', 'snapshot_qa_state_id_en', 'snapshot_qa_state_id');
        $this->addForeignKey('snapshot_qa_state_id_fk', 'snapshot', 'snapshot_qa_state_id', 'snapshot_qa_state', 'id', 'SET NULL', 'SET NULL');
        $this->dropForeignKey('snapshot_qa_state_id_fk_pt', 'snapshot');
        $this->dropColumn('snapshot', 'snapshot_qa_state_id_pt');
        $this->dropForeignKey('snapshot_qa_state_id_fk_de', 'snapshot');
        $this->dropColumn('snapshot', 'snapshot_qa_state_id_de');
        $this->dropForeignKey('snapshot_qa_state_id_fk_es', 'snapshot');
        $this->dropColumn('snapshot', 'snapshot_qa_state_id_es');
        $this->dropForeignKey('snapshot_qa_state_id_fk_hi', 'snapshot');
        $this->dropColumn('snapshot', 'snapshot_qa_state_id_hi');
        $this->dropForeignKey('snapshot_qa_state_id_fk_sv', 'snapshot');
        $this->dropColumn('snapshot', 'snapshot_qa_state_id_sv');
    }

    public function down()
    {
      $this->dropForeignKey('snapshot_qa_state_id_fk', 'snapshot');
      $this->renameColumn('snapshot', 'snapshot_qa_state_id', 'snapshot_qa_state_id_en');
      $this->addForeignKey('snapshot_qa_state_id_fk', 'snapshot', 'snapshot_qa_state_id_en', 'snapshot_qa_state', 'id', 'SET NULL', 'SET NULL');
      $this->addColumn('snapshot', 'snapshot_qa_state_id_pt', 'bigint(20) null');
      $this->addForeignKey('snapshot_qa_state_id_fk_pt', 'snapshot', 'snapshot_qa_state_id_pt', 'snapshot_qa_state', 'id');
      $this->addColumn('snapshot', 'snapshot_qa_state_id_de', 'bigint(20) null');
      $this->addForeignKey('snapshot_qa_state_id_fk_de', 'snapshot', 'snapshot_qa_state_id_de', 'snapshot_qa_state', 'id');
      $this->addColumn('snapshot', 'snapshot_qa_state_id_es', 'bigint(20) null');
      $this->addForeignKey('snapshot_qa_state_id_fk_es', 'snapshot', 'snapshot_qa_state_id_es', 'snapshot_qa_state', 'id');
      $this->addColumn('snapshot', 'snapshot_qa_state_id_hi', 'bigint(20) null');
      $this->addForeignKey('snapshot_qa_state_id_fk_hi', 'snapshot', 'snapshot_qa_state_id_hi', 'snapshot_qa_state', 'id');
      $this->addColumn('snapshot', 'snapshot_qa_state_id_sv', 'bigint(20) null');
      $this->addForeignKey('snapshot_qa_state_id_fk_sv', 'snapshot', 'snapshot_qa_state_id_sv', 'snapshot_qa_state', 'id');
    }
}
