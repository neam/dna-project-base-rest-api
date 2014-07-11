<?php
class m140618_114100_i18n extends CDbMigration
{
    public function up()
    {
        $this->renameColumn('video_file', '_subtitles', 'subtitles');
        $this->renameColumn('i18n_catalog', '_po_contents', 'po_contents');
    }

    public function down()
    {
      $this->renameColumn('video_file', 'subtitles', '_subtitles');
      $this->renameColumn('i18n_catalog', 'po_contents', '_po_contents');
    }
}
