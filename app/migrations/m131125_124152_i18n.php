<?php
class m131125_124152_i18n extends CDbMigration
{
    public function up()
    {
        $this->dropColumn('chapter', 'slug_cn');
        $this->dropForeignKey('chapter_qa_state_id_fk_cn', 'chapter');
        $this->dropColumn('chapter', 'chapter_qa_state_id_cn');
        $this->dropColumn('data_chunk', 'slug_cn');
        $this->dropForeignKey('data_chunk_qa_state_id_fk_cn', 'data_chunk');
        $this->dropColumn('data_chunk', 'data_chunk_qa_state_id_cn');
        $this->dropColumn('data_source', 'slug_cn');
        $this->dropForeignKey('data_source_qa_state_id_fk_cn', 'data_source');
        $this->dropColumn('data_source', 'data_source_qa_state_id_cn');
        $this->dropColumn('exam_question', 'slug_cn');
        $this->dropForeignKey('exam_question_qa_state_id_fk_cn', 'exam_question');
        $this->dropColumn('exam_question', 'exam_question_qa_state_id_cn');
        $this->dropColumn('exercise', 'slug_cn');
        $this->dropForeignKey('exercise_qa_state_id_fk_cn', 'exercise');
        $this->dropColumn('exercise', 'exercise_qa_state_id_cn');
        $this->dropColumn('page', 'slug_cn');
        $this->dropForeignKey('fk_po_file_p3_media2_cn', 'po_file');
        $this->dropColumn('po_file', 'processed_media_id_cn');
        $this->dropForeignKey('po_file_qa_state_id_fk_cn', 'po_file');
        $this->dropColumn('po_file', 'po_file_qa_state_id_cn');
        $this->dropColumn('profiles', 'can_translate_to_cn');
        $this->dropColumn('section', 'slug_cn');
        $this->dropColumn('slideshow_file', 'slug_cn');
        $this->dropForeignKey('fk_slideshow_file_p3_media2_cn', 'slideshow_file');
        $this->dropColumn('slideshow_file', 'processed_media_id_cn');
        $this->dropForeignKey('slideshow_file_qa_state_id_fk_cn', 'slideshow_file');
        $this->dropColumn('slideshow_file', 'slideshow_file_qa_state_id_cn');
        $this->dropColumn('snapshot', 'slug_cn');
        $this->dropForeignKey('snapshot_qa_state_id_fk_cn', 'snapshot');
        $this->dropColumn('snapshot', 'snapshot_qa_state_id_cn');
        $this->dropForeignKey('fk_spreadsheet_file_p3_media2_cn', 'spreadsheet_file');
        $this->dropColumn('spreadsheet_file', 'processed_media_id_cn');
        $this->dropColumn('text_doc', 'slug_cn');
        $this->dropForeignKey('fk_word_file_p3_media2_cn', 'text_doc');
        $this->dropColumn('text_doc', 'processed_media_id_cn');
        $this->dropForeignKey('text_doc_qa_state_id_fk_cn', 'text_doc');
        $this->dropColumn('text_doc', 'text_doc_qa_state_id_cn');
        $this->dropColumn('tool', 'slug_cn');
        $this->dropColumn('vector_graphic', 'slug_cn');
        $this->dropForeignKey('fk_vector_graphic_p3_media2_cn', 'vector_graphic');
        $this->dropColumn('vector_graphic', 'processed_media_id_cn');
        $this->dropForeignKey('vector_graphic_qa_state_id_fk_cn', 'vector_graphic');
        $this->dropColumn('vector_graphic', 'vector_graphic_qa_state_id_cn');
        $this->dropColumn('video_file', 'slug_cn');
        $this->dropForeignKey('fk_video_file_p3_media2_cn', 'video_file');
        $this->dropColumn('video_file', 'processed_media_id_cn');
        $this->dropForeignKey('video_file_qa_state_id_fk_cn', 'video_file');
        $this->dropColumn('video_file', 'video_file_qa_state_id_cn');
    }

    public function down()
    {
      $this->addColumn('chapter', 'slug_cn', 'varchar(255) null');
      $this->addColumn('chapter', 'chapter_qa_state_id_cn', 'bigint(20) null');
      $this->addForeignKey('chapter_qa_state_id_fk_cn', 'chapter', 'chapter_qa_state_id_cn', 'chapter_qa_state', 'id');
      $this->addColumn('data_chunk', 'slug_cn', 'varchar(255) null');
      $this->addColumn('data_chunk', 'data_chunk_qa_state_id_cn', 'bigint(20) null');
      $this->addForeignKey('data_chunk_qa_state_id_fk_cn', 'data_chunk', 'data_chunk_qa_state_id_cn', 'data_chunk_qa_state', 'id');
      $this->addColumn('data_source', 'slug_cn', 'varchar(255) null');
      $this->addColumn('data_source', 'data_source_qa_state_id_cn', 'bigint(20) null');
      $this->addForeignKey('data_source_qa_state_id_fk_cn', 'data_source', 'data_source_qa_state_id_cn', 'data_source_qa_state', 'id');
      $this->addColumn('exam_question', 'slug_cn', 'varchar(255) null');
      $this->addColumn('exam_question', 'exam_question_qa_state_id_cn', 'bigint(20) null');
      $this->addForeignKey('exam_question_qa_state_id_fk_cn', 'exam_question', 'exam_question_qa_state_id_cn', 'exam_question_qa_state', 'id');
      $this->addColumn('exercise', 'slug_cn', 'varchar(255) null');
      $this->addColumn('exercise', 'exercise_qa_state_id_cn', 'bigint(20) null');
      $this->addForeignKey('exercise_qa_state_id_fk_cn', 'exercise', 'exercise_qa_state_id_cn', 'exercise_qa_state', 'id');
      $this->addColumn('page', 'slug_cn', 'varchar(255) null');
      $this->addColumn('po_file', 'processed_media_id_cn', 'int(11) null');
      $this->addForeignKey('fk_po_file_p3_media2_cn', 'po_file', 'processed_media_id_cn', 'p3_media', 'id');
      $this->addColumn('po_file', 'po_file_qa_state_id_cn', 'bigint(20) null');
      $this->addForeignKey('po_file_qa_state_id_fk_cn', 'po_file', 'po_file_qa_state_id_cn', 'po_file_qa_state', 'id');
      $this->addColumn('profiles', 'can_translate_to_cn', 'tinyint(1) null');
      $this->addColumn('section', 'slug_cn', 'varchar(255) null');
      $this->addColumn('slideshow_file', 'slug_cn', 'varchar(255) null');
      $this->addColumn('slideshow_file', 'processed_media_id_cn', 'int(11) null');
      $this->addForeignKey('fk_slideshow_file_p3_media2_cn', 'slideshow_file', 'processed_media_id_cn', 'p3_media', 'id');
      $this->addColumn('slideshow_file', 'slideshow_file_qa_state_id_cn', 'bigint(20) null');
      $this->addForeignKey('slideshow_file_qa_state_id_fk_cn', 'slideshow_file', 'slideshow_file_qa_state_id_cn', 'slideshow_file_qa_state', 'id');
      $this->addColumn('snapshot', 'slug_cn', 'varchar(255) null');
      $this->addColumn('snapshot', 'snapshot_qa_state_id_cn', 'bigint(20) null');
      $this->addForeignKey('snapshot_qa_state_id_fk_cn', 'snapshot', 'snapshot_qa_state_id_cn', 'snapshot_qa_state', 'id');
      $this->addColumn('spreadsheet_file', 'processed_media_id_cn', 'int(11) null');
      $this->addForeignKey('fk_spreadsheet_file_p3_media2_cn', 'spreadsheet_file', 'processed_media_id_cn', 'p3_media', 'id');
      $this->addColumn('text_doc', 'slug_cn', 'varchar(255) null');
      $this->addColumn('text_doc', 'processed_media_id_cn', 'int(11) null');
      $this->addForeignKey('fk_word_file_p3_media2_cn', 'text_doc', 'processed_media_id_cn', 'p3_media', 'id');
      $this->addColumn('text_doc', 'text_doc_qa_state_id_cn', 'bigint(20) null');
      $this->addForeignKey('text_doc_qa_state_id_fk_cn', 'text_doc', 'text_doc_qa_state_id_cn', 'text_doc_qa_state', 'id');
      $this->addColumn('tool', 'slug_cn', 'varchar(255) null');
      $this->addColumn('vector_graphic', 'slug_cn', 'varchar(255) null');
      $this->addColumn('vector_graphic', 'processed_media_id_cn', 'int(11) null');
      $this->addForeignKey('fk_vector_graphic_p3_media2_cn', 'vector_graphic', 'processed_media_id_cn', 'p3_media', 'id');
      $this->addColumn('vector_graphic', 'vector_graphic_qa_state_id_cn', 'bigint(20) null');
      $this->addForeignKey('vector_graphic_qa_state_id_fk_cn', 'vector_graphic', 'vector_graphic_qa_state_id_cn', 'vector_graphic_qa_state', 'id');
      $this->addColumn('video_file', 'slug_cn', 'varchar(255) null');
      $this->addColumn('video_file', 'processed_media_id_cn', 'int(11) null');
      $this->addForeignKey('fk_video_file_p3_media2_cn', 'video_file', 'processed_media_id_cn', 'p3_media', 'id');
      $this->addColumn('video_file', 'video_file_qa_state_id_cn', 'bigint(20) null');
      $this->addForeignKey('video_file_qa_state_id_fk_cn', 'video_file', 'video_file_qa_state_id_cn', 'video_file_qa_state', 'id');
    }
}
