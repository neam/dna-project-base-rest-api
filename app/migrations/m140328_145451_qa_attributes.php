<?php
class m140328_145451_qa_attributes extends CDbMigration
{
    public function up()
    {
        $this->addColumn('chapter_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('data_article_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('data_source_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('download_link_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('exam_question_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('exam_question_alternative_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('exercise_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('gui_section_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('html_chunk_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('i18n_catalog_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('menu_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('page_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('section_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('slideshow_file_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('snapshot_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('spreadsheet_file_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('text_doc_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('tool_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('tool_qa_state', 'ref_approved', 'BOOLEAN NULL');
        $this->addColumn('tool_qa_state', 'ref_proofed', 'BOOLEAN NULL');
        $this->addColumn('vector_graphic_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('video_file_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('waffle_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('waffle_category_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('waffle_category_thing_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('waffle_data_source_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('waffle_indicator_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('waffle_publisher_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('waffle_tag_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
        $this->addColumn('waffle_unit_qa_state', 'translate_into_fa_validation_progress', 'INT NULL');
    }

    public function down()
    {
      $this->dropColumn('chapter_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('data_article_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('data_source_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('download_link_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('exam_question_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('exam_question_alternative_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('exercise_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('gui_section_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('html_chunk_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('i18n_catalog_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('menu_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('page_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('section_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('slideshow_file_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('snapshot_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('spreadsheet_file_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('text_doc_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('tool_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('tool_qa_state', 'ref_approved');
      $this->dropColumn('tool_qa_state', 'ref_proofed');
      $this->dropColumn('vector_graphic_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('video_file_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('waffle_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('waffle_category_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('waffle_category_thing_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('waffle_data_source_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('waffle_indicator_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('waffle_publisher_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('waffle_tag_qa_state', 'translate_into_fa_validation_progress');
      $this->dropColumn('waffle_unit_qa_state', 'translate_into_fa_validation_progress');
    }
}
