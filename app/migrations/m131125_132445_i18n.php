<?php
class m131125_132445_i18n extends CDbMigration
{
    public function up()
    {
        $this->dropForeignKey('vector_graphic_qa_state_id_fk', 'vector_graphic');
        $this->renameColumn('vector_graphic', 'vector_graphic_qa_state_id_en', 'vector_graphic_qa_state_id');
        $this->addForeignKey('vector_graphic_qa_state_id_fk', 'vector_graphic', 'vector_graphic_qa_state_id', 'vector_graphic_qa_state', 'id', 'SET NULL', 'SET NULL');
        $this->dropForeignKey('vector_graphic_qa_state_id_fk_pt', 'vector_graphic');
        $this->dropColumn('vector_graphic', 'vector_graphic_qa_state_id_pt');
        $this->dropForeignKey('vector_graphic_qa_state_id_fk_de', 'vector_graphic');
        $this->dropColumn('vector_graphic', 'vector_graphic_qa_state_id_de');
        $this->dropForeignKey('vector_graphic_qa_state_id_fk_es', 'vector_graphic');
        $this->dropColumn('vector_graphic', 'vector_graphic_qa_state_id_es');
        $this->dropForeignKey('vector_graphic_qa_state_id_fk_hi', 'vector_graphic');
        $this->dropColumn('vector_graphic', 'vector_graphic_qa_state_id_hi');
        $this->dropForeignKey('vector_graphic_qa_state_id_fk_sv', 'vector_graphic');
        $this->dropColumn('vector_graphic', 'vector_graphic_qa_state_id_sv');
    }

    public function down()
    {
      $this->dropForeignKey('vector_graphic_qa_state_id_fk', 'vector_graphic');
      $this->renameColumn('vector_graphic', 'vector_graphic_qa_state_id', 'vector_graphic_qa_state_id_en');
      $this->addForeignKey('vector_graphic_qa_state_id_fk', 'vector_graphic', 'vector_graphic_qa_state_id_en', 'vector_graphic_qa_state', 'id', 'SET NULL', 'SET NULL');
      $this->addColumn('vector_graphic', 'vector_graphic_qa_state_id_pt', 'bigint(20) null');
      $this->addForeignKey('vector_graphic_qa_state_id_fk_pt', 'vector_graphic', 'vector_graphic_qa_state_id_pt', 'vector_graphic_qa_state', 'id');
      $this->addColumn('vector_graphic', 'vector_graphic_qa_state_id_de', 'bigint(20) null');
      $this->addForeignKey('vector_graphic_qa_state_id_fk_de', 'vector_graphic', 'vector_graphic_qa_state_id_de', 'vector_graphic_qa_state', 'id');
      $this->addColumn('vector_graphic', 'vector_graphic_qa_state_id_es', 'bigint(20) null');
      $this->addForeignKey('vector_graphic_qa_state_id_fk_es', 'vector_graphic', 'vector_graphic_qa_state_id_es', 'vector_graphic_qa_state', 'id');
      $this->addColumn('vector_graphic', 'vector_graphic_qa_state_id_hi', 'bigint(20) null');
      $this->addForeignKey('vector_graphic_qa_state_id_fk_hi', 'vector_graphic', 'vector_graphic_qa_state_id_hi', 'vector_graphic_qa_state', 'id');
      $this->addColumn('vector_graphic', 'vector_graphic_qa_state_id_sv', 'bigint(20) null');
      $this->addForeignKey('vector_graphic_qa_state_id_fk_sv', 'vector_graphic', 'vector_graphic_qa_state_id_sv', 'vector_graphic_qa_state', 'id');
    }
}
