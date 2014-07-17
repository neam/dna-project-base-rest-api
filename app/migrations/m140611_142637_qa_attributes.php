<?php
class m140611_142637_qa_attributes extends CDbMigration
{
    public function up()
    {
        $this->addColumn('video_file_qa_state', 'youtube_url_approved', 'BOOLEAN NULL');
        $this->addColumn('video_file_qa_state', 'youtube_url_proofed', 'BOOLEAN NULL');
    }

    public function down()
    {
      $this->dropColumn('video_file_qa_state', 'youtube_url_approved');
      $this->dropColumn('video_file_qa_state', 'youtube_url_proofed');
    }
}
