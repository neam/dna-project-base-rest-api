<?php
class m131125_124156_i18n extends CDbMigration
{
    public function up()
    {
        $this->dropColumn('chapter', 'slug_fa');
        $this->dropForeignKey('chapter_qa_state_id_fk_fa', 'chapter');
        $this->dropColumn('chapter', 'chapter_qa_state_id_fa');
        $this->dropColumn('data_chunk', 'slug_fa');
        $this->dropForeignKey('data_chunk_qa_state_id_fk_fa', 'data_chunk');
        $this->dropColumn('data_chunk', 'data_chunk_qa_state_id_fa');
        $this->dropColumn('data_source', 'slug_fa');
        $this->dropForeignKey('data_source_qa_state_id_fk_fa', 'data_source');
        $this->dropColumn('data_source', 'data_source_qa_state_id_fa');
        $this->dropColumn('exam_question', 'slug_fa');
        $this->dropForeignKey('exam_question_qa_state_id_fk_fa', 'exam_question');
        $this->dropColumn('exam_question', 'exam_question_qa_state_id_fa');
        $this->dropColumn('exercise', 'slug_fa');
        $this->dropForeignKey('exercise_qa_state_id_fk_fa', 'exercise');
        $this->dropColumn('exercise', 'exercise_qa_state_id_fa');
        $this->dropColumn('page', 'slug_fa');
        $this->dropForeignKey('fk_po_file_p3_media2_fa', 'po_file');
        $this->dropColumn('po_file', 'processed_media_id_fa');
        $this->dropForeignKey('po_file_qa_state_id_fk_fa', 'po_file');
        $this->dropColumn('po_file', 'po_file_qa_state_id_fa');
        $this->dropColumn('profiles', 'can_translate_to_fa');
        $this->dropColumn('section', 'slug_fa');
        $this->dropColumn('slideshow_file', 'slug_fa');
        $this->dropForeignKey('fk_slideshow_file_p3_media2_fa', 'slideshow_file');
        $this->dropColumn('slideshow_file', 'processed_media_id_fa');
        $this->dropForeignKey('slideshow_file_qa_state_id_fk_fa', 'slideshow_file');
        $this->dropColumn('slideshow_file', 'slideshow_file_qa_state_id_fa');
        $this->dropColumn('snapshot', 'slug_fa');
        $this->dropForeignKey('snapshot_qa_state_id_fk_fa', 'snapshot');
        $this->dropColumn('snapshot', 'snapshot_qa_state_id_fa');
        $this->dropForeignKey('fk_spreadsheet_file_p3_media2_fa', 'spreadsheet_file');
        $this->dropColumn('spreadsheet_file', 'processed_media_id_fa');
        $this->dropColumn('text_doc', 'slug_fa');
        $this->dropForeignKey('fk_word_file_p3_media2_fa', 'text_doc');
        $this->dropColumn('text_doc', 'processed_media_id_fa');
        $this->dropForeignKey('text_doc_qa_state_id_fk_fa', 'text_doc');
        $this->dropColumn('text_doc', 'text_doc_qa_state_id_fa');
        $this->dropColumn('tool', 'slug_fa');
        $this->dropColumn('vector_graphic', 'slug_fa');
        $this->dropForeignKey('fk_vector_graphic_p3_media2_fa', 'vector_graphic');
        $this->dropColumn('vector_graphic', 'processed_media_id_fa');
        $this->dropForeignKey('vector_graphic_qa_state_id_fk_fa', 'vector_graphic');
        $this->dropColumn('vector_graphic', 'vector_graphic_qa_state_id_fa');
        $this->dropColumn('video_file', 'slug_fa');
        $this->dropForeignKey('fk_video_file_p3_media2_fa', 'video_file');
        $this->dropColumn('video_file', 'processed_media_id_fa');
        $this->dropForeignKey('video_file_qa_state_id_fk_fa', 'video_file');
        $this->dropColumn('video_file', 'video_file_qa_state_id_fa');
    }

    public function down()
    {
      $this->addColumn('chapter', 'slug_fa', 'varchar(255) null');
      $this->addColumn('chapter', 'chapter_qa_state_id_fa', 'bigint(20) null');
      $this->addForeignKey('chapter_qa_state_id_fk_fa', 'chapter', 'chapter_qa_state_id_fa', 'chapter_qa_state', 'id');
      $this->addColumn('data_chunk', 'slug_fa', 'varchar(255) null');
      $this->addColumn('data_chunk', 'data_chunk_qa_state_id_fa', 'bigint(20) null');
      $this->addForeignKey('data_chunk_qa_state_id_fk_fa', 'data_chunk', 'data_chunk_qa_state_id_fa', 'data_chunk_qa_state', 'id');
      $this->addColumn('data_source', 'slug_fa', 'varchar(255) null');
      $this->addColumn('data_source', 'data_source_qa_state_id_fa', 'bigint(20) null');
      $this->addForeignKey('data_source_qa_state_id_fk_fa', 'data_source', 'data_source_qa_state_id_fa', 'data_source_qa_state', 'id');
      $this->addColumn('exam_question', 'slug_fa', 'varchar(255) null');
      $this->addColumn('exam_question', 'exam_question_qa_state_id_fa', 'bigint(20) null');
      $this->addForeignKey('exam_question_qa_state_id_fk_fa', 'exam_question', 'exam_question_qa_state_id_fa', 'exam_question_qa_state', 'id');
      $this->addColumn('exercise', 'slug_fa', 'varchar(255) null');
      $this->addColumn('exercise', 'exercise_qa_state_id_fa', 'bigint(20) null');
      $this->addForeignKey('exercise_qa_state_id_fk_fa', 'exercise', 'exercise_qa_state_id_fa', 'exercise_qa_state', 'id');
      $this->addColumn('page', 'slug_fa', 'varchar(255) null');
      $this->addColumn('po_file', 'processed_media_id_fa', 'int(11) null');
      $this->addForeignKey('fk_po_file_p3_media2_fa', 'po_file', 'processed_media_id_fa', 'p3_media', 'id');
      $this->addColumn('po_file', 'po_file_qa_state_id_fa', 'bigint(20) null');
      $this->addForeignKey('po_file_qa_state_id_fk_fa', 'po_file', 'po_file_qa_state_id_fa', 'po_file_qa_state', 'id');
      $this->addColumn('profiles', 'can_translate_to_fa', 'tinyint(1) null');
      $this->addColumn('section', 'slug_fa', 'varchar(255) null');
      $this->addColumn('slideshow_file', 'slug_fa', 'varchar(255) null');
      $this->addColumn('slideshow_file', 'processed_media_id_fa', 'int(11) null');
      $this->addForeignKey('fk_slideshow_file_p3_media2_fa', 'slideshow_file', 'processed_media_id_fa', 'p3_media', 'id');
      $this->addColumn('slideshow_file', 'slideshow_file_qa_state_id_fa', 'bigint(20) null');
      $this->addForeignKey('slideshow_file_qa_state_id_fk_fa', 'slideshow_file', 'slideshow_file_qa_state_id_fa', 'slideshow_file_qa_state', 'id');
      $this->addColumn('snapshot', 'slug_fa', 'varchar(255) null');
      $this->addColumn('snapshot', 'snapshot_qa_state_id_fa', 'bigint(20) null');
      $this->addForeignKey('snapshot_qa_state_id_fk_fa', 'snapshot', 'snapshot_qa_state_id_fa', 'snapshot_qa_state', 'id');
      $this->addColumn('spreadsheet_file', 'processed_media_id_fa', 'int(11) null');
      $this->addForeignKey('fk_spreadsheet_file_p3_media2_fa', 'spreadsheet_file', 'processed_media_id_fa', 'p3_media', 'id');
      $this->addColumn('text_doc', 'slug_fa', 'varchar(255) null');
      $this->addColumn('text_doc', 'processed_media_id_fa', 'int(11) null');
      $this->addForeignKey('fk_word_file_p3_media2_fa', 'text_doc', 'processed_media_id_fa', 'p3_media', 'id');
      $this->addColumn('text_doc', 'text_doc_qa_state_id_fa', 'bigint(20) null');
      $this->addForeignKey('text_doc_qa_state_id_fk_fa', 'text_doc', 'text_doc_qa_state_id_fa', 'text_doc_qa_state', 'id');
      $this->addColumn('tool', 'slug_fa', 'varchar(255) null');
      $this->addColumn('vector_graphic', 'slug_fa', 'varchar(255) null');
      $this->addColumn('vector_graphic', 'processed_media_id_fa', 'int(11) null');
      $this->addForeignKey('fk_vector_graphic_p3_media2_fa', 'vector_graphic', 'processed_media_id_fa', 'p3_media', 'id');
      $this->addColumn('vector_graphic', 'vector_graphic_qa_state_id_fa', 'bigint(20) null');
      $this->addForeignKey('vector_graphic_qa_state_id_fk_fa', 'vector_graphic', 'vector_graphic_qa_state_id_fa', 'vector_graphic_qa_state', 'id');
      $this->addColumn('video_file', 'slug_fa', 'varchar(255) null');
      $this->addColumn('video_file', 'processed_media_id_fa', 'int(11) null');
      $this->addForeignKey('fk_video_file_p3_media2_fa', 'video_file', 'processed_media_id_fa', 'p3_media', 'id');
      $this->addColumn('video_file', 'video_file_qa_state_id_fa', 'bigint(20) null');
      $this->addForeignKey('video_file_qa_state_id_fk_fa', 'video_file', 'video_file_qa_state_id_fa', 'video_file_qa_state', 'id');
    }
}
