<?php

class m131017_094821_drop_workflow_execution_fks extends EDbMigration
{
	public function up()
	{

        $this->dropForeignKey('fk_data_chunk_execution1', 'data_chunk');
        $this->dropColumn('data_chunk', 'authoring_workflow_execution_id_en');
        $this->dropForeignKey('fk_data_chunk_execution1_es', 'data_chunk');
        $this->dropColumn('data_chunk', 'authoring_workflow_execution_id_es');
        $this->dropForeignKey('fk_data_chunk_execution1_fa', 'data_chunk');
        $this->dropColumn('data_chunk', 'authoring_workflow_execution_id_fa');
        $this->dropForeignKey('fk_data_chunk_execution1_hi', 'data_chunk');
        $this->dropColumn('data_chunk', 'authoring_workflow_execution_id_hi');
        $this->dropForeignKey('fk_data_chunk_execution1_pt', 'data_chunk');
        $this->dropColumn('data_chunk', 'authoring_workflow_execution_id_pt');
        $this->dropForeignKey('fk_data_chunk_execution1_sv', 'data_chunk');
        $this->dropColumn('data_chunk', 'authoring_workflow_execution_id_sv');
        $this->dropForeignKey('fk_data_chunk_execution1_cn', 'data_chunk');
        $this->dropColumn('data_chunk', 'authoring_workflow_execution_id_cn');
        $this->dropForeignKey('fk_data_chunk_execution1_de', 'data_chunk');
        $this->dropColumn('data_chunk', 'authoring_workflow_execution_id_de');
        $this->dropForeignKey('fk_data_source_execution1', 'data_source');
        $this->dropColumn('data_source', 'authoring_workflow_execution_id_en');
        $this->dropForeignKey('fk_data_source_execution1_es', 'data_source');
        $this->dropColumn('data_source', 'authoring_workflow_execution_id_es');
        $this->dropForeignKey('fk_data_source_execution1_fa', 'data_source');
        $this->dropColumn('data_source', 'authoring_workflow_execution_id_fa');
        $this->dropForeignKey('fk_data_source_execution1_hi', 'data_source');
        $this->dropColumn('data_source', 'authoring_workflow_execution_id_hi');
        $this->dropForeignKey('fk_data_source_execution1_pt', 'data_source');
        $this->dropColumn('data_source', 'authoring_workflow_execution_id_pt');
        $this->dropForeignKey('fk_data_source_execution1_sv', 'data_source');
        $this->dropColumn('data_source', 'authoring_workflow_execution_id_sv');
        $this->dropForeignKey('fk_data_source_execution1_cn', 'data_source');
        $this->dropColumn('data_source', 'authoring_workflow_execution_id_cn');
        $this->dropForeignKey('fk_data_source_execution1_de', 'data_source');
        $this->dropColumn('data_source', 'authoring_workflow_execution_id_de');
        $this->dropForeignKey('fk_download_link_execution1', 'download_link');
        $this->dropColumn('download_link', 'authoring_workflow_execution_id_en');
        $this->dropForeignKey('fk_download_link_execution1_es', 'download_link');
        $this->dropColumn('download_link', 'authoring_workflow_execution_id_es');
        $this->dropForeignKey('fk_download_link_execution1_fa', 'download_link');
        $this->dropColumn('download_link', 'authoring_workflow_execution_id_fa');
        $this->dropForeignKey('fk_download_link_execution1_hi', 'download_link');
        $this->dropColumn('download_link', 'authoring_workflow_execution_id_hi');
        $this->dropForeignKey('fk_download_link_execution1_pt', 'download_link');
        $this->dropColumn('download_link', 'authoring_workflow_execution_id_pt');
        $this->dropForeignKey('fk_download_link_execution1_sv', 'download_link');
        $this->dropColumn('download_link', 'authoring_workflow_execution_id_sv');
        $this->dropForeignKey('fk_download_link_execution1_cn', 'download_link');
        $this->dropColumn('download_link', 'authoring_workflow_execution_id_cn');
        $this->dropForeignKey('fk_download_link_execution1_de', 'download_link');
        $this->dropColumn('download_link', 'authoring_workflow_execution_id_de');
        $this->dropForeignKey('fk_exam_question_execution1', 'exam_question');
        $this->dropColumn('exam_question', 'authoring_workflow_execution_id_en');
        $this->dropForeignKey('fk_exam_question_execution1_es', 'exam_question');
        $this->dropColumn('exam_question', 'authoring_workflow_execution_id_es');
        $this->dropForeignKey('fk_exam_question_execution1_fa', 'exam_question');
        $this->dropColumn('exam_question', 'authoring_workflow_execution_id_fa');
        $this->dropForeignKey('fk_exam_question_execution1_hi', 'exam_question');
        $this->dropColumn('exam_question', 'authoring_workflow_execution_id_hi');
        $this->dropForeignKey('fk_exam_question_execution1_pt', 'exam_question');
        $this->dropColumn('exam_question', 'authoring_workflow_execution_id_pt');
        $this->dropForeignKey('fk_exam_question_execution1_sv', 'exam_question');
        $this->dropColumn('exam_question', 'authoring_workflow_execution_id_sv');
        $this->dropForeignKey('fk_exam_question_execution1_cn', 'exam_question');
        $this->dropColumn('exam_question', 'authoring_workflow_execution_id_cn');
        $this->dropForeignKey('fk_exam_question_execution1_de', 'exam_question');
        $this->dropColumn('exam_question', 'authoring_workflow_execution_id_de');
        $this->dropForeignKey('fk_exercise_execution1', 'exercise');
        $this->dropColumn('exercise', 'authoring_workflow_execution_id_en');
        $this->dropForeignKey('fk_exercise_execution1_es', 'exercise');
        $this->dropColumn('exercise', 'authoring_workflow_execution_id_es');
        $this->dropForeignKey('fk_exercise_execution1_fa', 'exercise');
        $this->dropColumn('exercise', 'authoring_workflow_execution_id_fa');
        $this->dropForeignKey('fk_exercise_execution1_hi', 'exercise');
        $this->dropColumn('exercise', 'authoring_workflow_execution_id_hi');
        $this->dropForeignKey('fk_exercise_execution1_pt', 'exercise');
        $this->dropColumn('exercise', 'authoring_workflow_execution_id_pt');
        $this->dropForeignKey('fk_exercise_execution1_sv', 'exercise');
        $this->dropColumn('exercise', 'authoring_workflow_execution_id_sv');
        $this->dropForeignKey('fk_exercise_execution1_cn', 'exercise');
        $this->dropColumn('exercise', 'authoring_workflow_execution_id_cn');
        $this->dropForeignKey('fk_exercise_execution1_de', 'exercise');
        $this->dropColumn('exercise', 'authoring_workflow_execution_id_de');
        $this->dropForeignKey('fk_html_chunk_execution1', 'html_chunk');
        $this->dropColumn('html_chunk', 'authoring_workflow_execution_id_en');
        $this->dropForeignKey('fk_html_chunk_execution1_es', 'html_chunk');
        $this->dropColumn('html_chunk', 'authoring_workflow_execution_id_es');
        $this->dropForeignKey('fk_html_chunk_execution1_fa', 'html_chunk');
        $this->dropColumn('html_chunk', 'authoring_workflow_execution_id_fa');
        $this->dropForeignKey('fk_html_chunk_execution1_hi', 'html_chunk');
        $this->dropColumn('html_chunk', 'authoring_workflow_execution_id_hi');
        $this->dropForeignKey('fk_html_chunk_execution1_pt', 'html_chunk');
        $this->dropColumn('html_chunk', 'authoring_workflow_execution_id_pt');
        $this->dropForeignKey('fk_html_chunk_execution1_sv', 'html_chunk');
        $this->dropColumn('html_chunk', 'authoring_workflow_execution_id_sv');
        $this->dropForeignKey('fk_html_chunk_execution1_cn', 'html_chunk');
        $this->dropColumn('html_chunk', 'authoring_workflow_execution_id_cn');
        $this->dropForeignKey('fk_html_chunk_execution1_de', 'html_chunk');
        $this->dropColumn('html_chunk', 'authoring_workflow_execution_id_de');
        $this->dropForeignKey('fk_po_file_execution1', 'po_file');
        $this->dropColumn('po_file', 'authoring_workflow_execution_id_en');
        $this->dropForeignKey('fk_po_file_execution1_es', 'po_file');
        $this->dropColumn('po_file', 'authoring_workflow_execution_id_es');
        $this->dropForeignKey('fk_po_file_execution1_fa', 'po_file');
        $this->dropColumn('po_file', 'authoring_workflow_execution_id_fa');
        $this->dropForeignKey('fk_po_file_execution1_hi', 'po_file');
        $this->dropColumn('po_file', 'authoring_workflow_execution_id_hi');
        $this->dropForeignKey('fk_po_file_execution1_pt', 'po_file');
        $this->dropColumn('po_file', 'authoring_workflow_execution_id_pt');
        $this->dropForeignKey('fk_po_file_execution1_sv', 'po_file');
        $this->dropColumn('po_file', 'authoring_workflow_execution_id_sv');
        $this->dropForeignKey('fk_po_file_execution1_cn', 'po_file');
        $this->dropColumn('po_file', 'authoring_workflow_execution_id_cn');
        $this->dropForeignKey('fk_po_file_execution1_de', 'po_file');
        $this->dropColumn('po_file', 'authoring_workflow_execution_id_de');
        $this->dropForeignKey('fk_slideshow_file_execution1', 'slideshow_file');
        $this->dropColumn('slideshow_file', 'authoring_workflow_execution_id_en');
        $this->dropForeignKey('fk_slideshow_file_execution1_es', 'slideshow_file');
        $this->dropColumn('slideshow_file', 'authoring_workflow_execution_id_es');
        $this->dropForeignKey('fk_slideshow_file_execution1_fa', 'slideshow_file');
        $this->dropColumn('slideshow_file', 'authoring_workflow_execution_id_fa');
        $this->dropForeignKey('fk_slideshow_file_execution1_hi', 'slideshow_file');
        $this->dropColumn('slideshow_file', 'authoring_workflow_execution_id_hi');
        $this->dropForeignKey('fk_slideshow_file_execution1_pt', 'slideshow_file');
        $this->dropColumn('slideshow_file', 'authoring_workflow_execution_id_pt');
        $this->dropForeignKey('fk_slideshow_file_execution1_sv', 'slideshow_file');
        $this->dropColumn('slideshow_file', 'authoring_workflow_execution_id_sv');
        $this->dropForeignKey('fk_slideshow_file_execution1_cn', 'slideshow_file');
        $this->dropColumn('slideshow_file', 'authoring_workflow_execution_id_cn');
        $this->dropForeignKey('fk_slideshow_file_execution1_de', 'slideshow_file');
        $this->dropColumn('slideshow_file', 'authoring_workflow_execution_id_de');
        $this->dropForeignKey('fk_viz_view_execution1', 'snapshot');
        $this->dropColumn('snapshot', 'authoring_workflow_execution_id_en');
        $this->dropForeignKey('fk_viz_view_execution1_es', 'snapshot');
        $this->dropColumn('snapshot', 'authoring_workflow_execution_id_es');
        $this->dropForeignKey('fk_viz_view_execution1_fa', 'snapshot');
        $this->dropColumn('snapshot', 'authoring_workflow_execution_id_fa');
        $this->dropForeignKey('fk_viz_view_execution1_hi', 'snapshot');
        $this->dropColumn('snapshot', 'authoring_workflow_execution_id_hi');
        $this->dropForeignKey('fk_viz_view_execution1_pt', 'snapshot');
        $this->dropColumn('snapshot', 'authoring_workflow_execution_id_pt');
        $this->dropForeignKey('fk_viz_view_execution1_sv', 'snapshot');
        $this->dropColumn('snapshot', 'authoring_workflow_execution_id_sv');
        $this->dropForeignKey('fk_viz_view_execution1_cn', 'snapshot');
        $this->dropColumn('snapshot', 'authoring_workflow_execution_id_cn');
        $this->dropForeignKey('fk_viz_view_execution1_de', 'snapshot');
        $this->dropColumn('snapshot', 'authoring_workflow_execution_id_de');
        $this->dropForeignKey('fk_spreadsheet_file_execution1', 'spreadsheet_file');
        $this->dropColumn('spreadsheet_file', 'authoring_workflow_execution_id_en');
        $this->dropForeignKey('fk_spreadsheet_file_execution1_es', 'spreadsheet_file');
        $this->dropColumn('spreadsheet_file', 'authoring_workflow_execution_id_es');
        $this->dropForeignKey('fk_spreadsheet_file_execution1_fa', 'spreadsheet_file');
        $this->dropColumn('spreadsheet_file', 'authoring_workflow_execution_id_fa');
        $this->dropForeignKey('fk_spreadsheet_file_execution1_hi', 'spreadsheet_file');
        $this->dropColumn('spreadsheet_file', 'authoring_workflow_execution_id_hi');
        $this->dropForeignKey('fk_spreadsheet_file_execution1_pt', 'spreadsheet_file');
        $this->dropColumn('spreadsheet_file', 'authoring_workflow_execution_id_pt');
        $this->dropForeignKey('fk_spreadsheet_file_execution1_sv', 'spreadsheet_file');
        $this->dropColumn('spreadsheet_file', 'authoring_workflow_execution_id_sv');
        $this->dropForeignKey('fk_spreadsheet_file_execution1_cn', 'spreadsheet_file');
        $this->dropColumn('spreadsheet_file', 'authoring_workflow_execution_id_cn');
        $this->dropForeignKey('fk_spreadsheet_file_execution1_de', 'spreadsheet_file');
        $this->dropColumn('spreadsheet_file', 'authoring_workflow_execution_id_de');
        $this->dropForeignKey('fk_teachers_guide_execution1', 'teachers_guide');
        $this->dropColumn('teachers_guide', 'authoring_workflow_execution_id_en');
        $this->dropForeignKey('fk_teachers_guide_execution1_es', 'teachers_guide');
        $this->dropColumn('teachers_guide', 'authoring_workflow_execution_id_es');
        $this->dropForeignKey('fk_teachers_guide_execution1_fa', 'teachers_guide');
        $this->dropColumn('teachers_guide', 'authoring_workflow_execution_id_fa');
        $this->dropForeignKey('fk_teachers_guide_execution1_hi', 'teachers_guide');
        $this->dropColumn('teachers_guide', 'authoring_workflow_execution_id_hi');
        $this->dropForeignKey('fk_teachers_guide_execution1_pt', 'teachers_guide');
        $this->dropColumn('teachers_guide', 'authoring_workflow_execution_id_pt');
        $this->dropForeignKey('fk_teachers_guide_execution1_sv', 'teachers_guide');
        $this->dropColumn('teachers_guide', 'authoring_workflow_execution_id_sv');
        $this->dropForeignKey('fk_teachers_guide_execution1_cn', 'teachers_guide');
        $this->dropColumn('teachers_guide', 'authoring_workflow_execution_id_cn');
        $this->dropForeignKey('fk_teachers_guide_execution1_de', 'teachers_guide');
        $this->dropColumn('teachers_guide', 'authoring_workflow_execution_id_de');
        $this->dropForeignKey('fk_word_file_execution1', 'text_doc');
        $this->dropColumn('text_doc', 'authoring_workflow_execution_id_en');
        $this->dropForeignKey('fk_word_file_execution1_es', 'text_doc');
        $this->dropColumn('text_doc', 'authoring_workflow_execution_id_es');
        $this->dropForeignKey('fk_word_file_execution1_fa', 'text_doc');
        $this->dropColumn('text_doc', 'authoring_workflow_execution_id_fa');
        $this->dropForeignKey('fk_word_file_execution1_hi', 'text_doc');
        $this->dropColumn('text_doc', 'authoring_workflow_execution_id_hi');
        $this->dropForeignKey('fk_word_file_execution1_pt', 'text_doc');
        $this->dropColumn('text_doc', 'authoring_workflow_execution_id_pt');
        $this->dropForeignKey('fk_word_file_execution1_sv', 'text_doc');
        $this->dropColumn('text_doc', 'authoring_workflow_execution_id_sv');
        $this->dropForeignKey('fk_word_file_execution1_cn', 'text_doc');
        $this->dropColumn('text_doc', 'authoring_workflow_execution_id_cn');
        $this->dropForeignKey('fk_word_file_execution1_de', 'text_doc');
        $this->dropColumn('text_doc', 'authoring_workflow_execution_id_de');
        $this->dropForeignKey('fk_vector_graphic_execution1', 'vector_graphic');
        $this->dropColumn('vector_graphic', 'authoring_workflow_execution_id_en');
        $this->dropForeignKey('fk_vector_graphic_execution1_es', 'vector_graphic');
        $this->dropColumn('vector_graphic', 'authoring_workflow_execution_id_es');
        $this->dropForeignKey('fk_vector_graphic_execution1_fa', 'vector_graphic');
        $this->dropColumn('vector_graphic', 'authoring_workflow_execution_id_fa');
        $this->dropForeignKey('fk_vector_graphic_execution1_hi', 'vector_graphic');
        $this->dropColumn('vector_graphic', 'authoring_workflow_execution_id_hi');
        $this->dropForeignKey('fk_vector_graphic_execution1_pt', 'vector_graphic');
        $this->dropColumn('vector_graphic', 'authoring_workflow_execution_id_pt');
        $this->dropForeignKey('fk_vector_graphic_execution1_sv', 'vector_graphic');
        $this->dropColumn('vector_graphic', 'authoring_workflow_execution_id_sv');
        $this->dropForeignKey('fk_vector_graphic_execution1_cn', 'vector_graphic');
        $this->dropColumn('vector_graphic', 'authoring_workflow_execution_id_cn');
        $this->dropForeignKey('fk_vector_graphic_execution1_de', 'vector_graphic');
        $this->dropColumn('vector_graphic', 'authoring_workflow_execution_id_de');
	}

	public function down()
	{
		echo "m131017_094821_drop_workflow_execution_fks does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}