<?php
class m140328_145342_i18n extends CDbMigration
{
    public function up()
    {
        $this->addColumn('chapter', 'slug_fa', 'varchar(255) null');
        $this->addColumn('data_article', 'slug_fa', 'varchar(255) null');
        $this->addColumn('data_source', 'slug_fa', 'varchar(255) null');
        $this->addColumn('exam_question', 'slug_fa', 'varchar(255) null');
        $this->addColumn('exercise', 'slug_fa', 'varchar(255) null');
        $this->addColumn('menu', 'slug_fa', 'varchar(255) null');
        $this->addColumn('page', 'slug_fa', 'varchar(255) null');
        $this->addColumn('section', 'slug_fa', 'varchar(255) null');
        $this->addColumn('slideshow_file', 'slug_fa', 'varchar(255) null');
        $this->addColumn('slideshow_file', 'processed_media_id_fa', 'int(11) null');
        $this->addForeignKey('fk_slideshow_file_p3_media2_fa', 'slideshow_file', 'processed_media_id_fa', 'p3_media', 'id');
        $this->addColumn('snapshot', 'slug_fa', 'varchar(255) null');
        $this->addColumn('spreadsheet_file', 'processed_media_id_fa', 'int(11) null');
        $this->addForeignKey('fk_spreadsheet_file_p3_media2_fa', 'spreadsheet_file', 'processed_media_id_fa', 'p3_media', 'id');
        $this->addColumn('text_doc', 'slug_fa', 'varchar(255) null');
        $this->addColumn('text_doc', 'processed_media_id_fa', 'int(11) null');
        $this->addForeignKey('fk_word_file_p3_media2_fa', 'text_doc', 'processed_media_id_fa', 'p3_media', 'id');
        $this->addColumn('tool', 'slug_fa', 'varchar(255) null');
        $this->addColumn('vector_graphic', 'slug_fa', 'varchar(255) null');
        $this->addColumn('vector_graphic', 'processed_media_id_fa', 'int(11) null');
        $this->addForeignKey('fk_vector_graphic_p3_media2_fa', 'vector_graphic', 'processed_media_id_fa', 'p3_media', 'id');
        $this->addColumn('video_file', 'slug_fa', 'varchar(255) null');
        $this->addColumn('waffle', 'slug_fa', 'varchar(255) null');
    }

    public function down()
    {
      $this->dropColumn('chapter', 'slug_fa');
      $this->dropColumn('data_article', 'slug_fa');
      $this->dropColumn('data_source', 'slug_fa');
      $this->dropColumn('exam_question', 'slug_fa');
      $this->dropColumn('exercise', 'slug_fa');
      $this->dropColumn('menu', 'slug_fa');
      $this->dropColumn('page', 'slug_fa');
      $this->dropColumn('section', 'slug_fa');
      $this->dropColumn('slideshow_file', 'slug_fa');
      $this->dropForeignKey('fk_slideshow_file_p3_media2_fa', 'slideshow_file');
      $this->dropColumn('slideshow_file', 'processed_media_id_fa');
      $this->dropColumn('snapshot', 'slug_fa');
      $this->dropForeignKey('fk_spreadsheet_file_p3_media2_fa', 'spreadsheet_file');
      $this->dropColumn('spreadsheet_file', 'processed_media_id_fa');
      $this->dropColumn('text_doc', 'slug_fa');
      $this->dropForeignKey('fk_word_file_p3_media2_fa', 'text_doc');
      $this->dropColumn('text_doc', 'processed_media_id_fa');
      $this->dropColumn('tool', 'slug_fa');
      $this->dropColumn('vector_graphic', 'slug_fa');
      $this->dropForeignKey('fk_vector_graphic_p3_media2_fa', 'vector_graphic');
      $this->dropColumn('vector_graphic', 'processed_media_id_fa');
      $this->dropColumn('video_file', 'slug_fa');
      $this->dropColumn('waffle', 'slug_fa');
    }
}
