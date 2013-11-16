<?php
class m131116_111940_i18n extends CDbMigration
{
    public function up()
    {
        $this->renameColumn('chapter', 'title', '_title');
        $this->renameColumn('chapter', 'about', '_about');
        $this->renameColumn('chapter', 'teachers_guide', '_teachers_guide');
    }

    public function down()
    {
      $this->renameColumn('chapter', '_title', 'title');
      $this->renameColumn('chapter', '_about', 'about');
      $this->renameColumn('chapter', '_teachers_guide', 'teachers_guide');
    }
}
