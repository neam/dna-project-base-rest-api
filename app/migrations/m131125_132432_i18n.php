<?php
class m131125_132432_i18n extends CDbMigration
{
    public function up()
    {
        $this->dropForeignKey('exam_question_qa_state_id_fk', 'exam_question');
        $this->renameColumn('exam_question', 'exam_question_qa_state_id_en', 'exam_question_qa_state_id');
        $this->addForeignKey('exam_question_qa_state_id_fk', 'exam_question', 'exam_question_qa_state_id', 'exam_question_qa_state', 'id', 'SET NULL', 'SET NULL');
        $this->dropForeignKey('exam_question_qa_state_id_fk_pt', 'exam_question');
        $this->dropColumn('exam_question', 'exam_question_qa_state_id_pt');
        $this->dropForeignKey('exam_question_qa_state_id_fk_de', 'exam_question');
        $this->dropColumn('exam_question', 'exam_question_qa_state_id_de');
        $this->dropForeignKey('exam_question_qa_state_id_fk_es', 'exam_question');
        $this->dropColumn('exam_question', 'exam_question_qa_state_id_es');
        $this->dropForeignKey('exam_question_qa_state_id_fk_hi', 'exam_question');
        $this->dropColumn('exam_question', 'exam_question_qa_state_id_hi');
        $this->dropForeignKey('exam_question_qa_state_id_fk_sv', 'exam_question');
        $this->dropColumn('exam_question', 'exam_question_qa_state_id_sv');
    }

    public function down()
    {
      $this->dropForeignKey('exam_question_qa_state_id_fk', 'exam_question');
      $this->renameColumn('exam_question', 'exam_question_qa_state_id', 'exam_question_qa_state_id_en');
      $this->addForeignKey('exam_question_qa_state_id_fk', 'exam_question', 'exam_question_qa_state_id_en', 'exam_question_qa_state', 'id', 'SET NULL', 'SET NULL');
      $this->addColumn('exam_question', 'exam_question_qa_state_id_pt', 'bigint(20) null');
      $this->addForeignKey('exam_question_qa_state_id_fk_pt', 'exam_question', 'exam_question_qa_state_id_pt', 'exam_question_qa_state', 'id');
      $this->addColumn('exam_question', 'exam_question_qa_state_id_de', 'bigint(20) null');
      $this->addForeignKey('exam_question_qa_state_id_fk_de', 'exam_question', 'exam_question_qa_state_id_de', 'exam_question_qa_state', 'id');
      $this->addColumn('exam_question', 'exam_question_qa_state_id_es', 'bigint(20) null');
      $this->addForeignKey('exam_question_qa_state_id_fk_es', 'exam_question', 'exam_question_qa_state_id_es', 'exam_question_qa_state', 'id');
      $this->addColumn('exam_question', 'exam_question_qa_state_id_hi', 'bigint(20) null');
      $this->addForeignKey('exam_question_qa_state_id_fk_hi', 'exam_question', 'exam_question_qa_state_id_hi', 'exam_question_qa_state', 'id');
      $this->addColumn('exam_question', 'exam_question_qa_state_id_sv', 'bigint(20) null');
      $this->addForeignKey('exam_question_qa_state_id_fk_sv', 'exam_question', 'exam_question_qa_state_id_sv', 'exam_question_qa_state', 'id');
    }
}
