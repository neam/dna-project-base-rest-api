<?php
class m131125_132434_i18n extends CDbMigration
{
    public function up()
    {
        $this->dropForeignKey('exercise_qa_state_id_fk', 'exercise');
        $this->renameColumn('exercise', 'exercise_qa_state_id_en', 'exercise_qa_state_id');
        $this->addForeignKey('exercise_qa_state_id_fk', 'exercise', 'exercise_qa_state_id', 'exercise_qa_state', 'id', 'SET NULL', 'SET NULL');
        $this->dropForeignKey('exercise_qa_state_id_fk_pt', 'exercise');
        $this->dropColumn('exercise', 'exercise_qa_state_id_pt');
        $this->dropForeignKey('exercise_qa_state_id_fk_de', 'exercise');
        $this->dropColumn('exercise', 'exercise_qa_state_id_de');
        $this->dropForeignKey('exercise_qa_state_id_fk_es', 'exercise');
        $this->dropColumn('exercise', 'exercise_qa_state_id_es');
        $this->dropForeignKey('exercise_qa_state_id_fk_hi', 'exercise');
        $this->dropColumn('exercise', 'exercise_qa_state_id_hi');
        $this->dropForeignKey('exercise_qa_state_id_fk_sv', 'exercise');
        $this->dropColumn('exercise', 'exercise_qa_state_id_sv');
    }

    public function down()
    {
      $this->dropForeignKey('exercise_qa_state_id_fk', 'exercise');
      $this->renameColumn('exercise', 'exercise_qa_state_id', 'exercise_qa_state_id_en');
      $this->addForeignKey('exercise_qa_state_id_fk', 'exercise', 'exercise_qa_state_id_en', 'exercise_qa_state', 'id', 'SET NULL', 'SET NULL');
      $this->addColumn('exercise', 'exercise_qa_state_id_pt', 'bigint(20) null');
      $this->addForeignKey('exercise_qa_state_id_fk_pt', 'exercise', 'exercise_qa_state_id_pt', 'exercise_qa_state', 'id');
      $this->addColumn('exercise', 'exercise_qa_state_id_de', 'bigint(20) null');
      $this->addForeignKey('exercise_qa_state_id_fk_de', 'exercise', 'exercise_qa_state_id_de', 'exercise_qa_state', 'id');
      $this->addColumn('exercise', 'exercise_qa_state_id_es', 'bigint(20) null');
      $this->addForeignKey('exercise_qa_state_id_fk_es', 'exercise', 'exercise_qa_state_id_es', 'exercise_qa_state', 'id');
      $this->addColumn('exercise', 'exercise_qa_state_id_hi', 'bigint(20) null');
      $this->addForeignKey('exercise_qa_state_id_fk_hi', 'exercise', 'exercise_qa_state_id_hi', 'exercise_qa_state', 'id');
      $this->addColumn('exercise', 'exercise_qa_state_id_sv', 'bigint(20) null');
      $this->addForeignKey('exercise_qa_state_id_fk_sv', 'exercise', 'exercise_qa_state_id_sv', 'exercise_qa_state', 'id');
    }
}
