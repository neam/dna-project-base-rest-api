<?php
class m131115_134809_i18n extends CDbMigration
{
    public function up()
    {
        $this->renameColumn('chapter', 'about_en', 'about');
        $this->dropColumn('chapter', 'about_es');
        $this->dropColumn('chapter', 'about_fa');
        $this->dropColumn('chapter', 'about_hi');
        $this->dropColumn('chapter', 'about_pt');
        $this->dropColumn('chapter', 'about_sv');
        $this->dropColumn('chapter', 'about_cn');
        $this->dropColumn('chapter', 'about_de');
    }

    public function down()
    {
      $this->renameColumn('chapter', 'about', 'about_en');
      $this->addColumn('chapter', 'about_es', 'text null');
      $this->addColumn('chapter', 'about_fa', 'text null');
      $this->addColumn('chapter', 'about_hi', 'text null');
      $this->addColumn('chapter', 'about_pt', 'text null');
      $this->addColumn('chapter', 'about_sv', 'text null');
      $this->addColumn('chapter', 'about_cn', 'text null');
      $this->addColumn('chapter', 'about_de', 'text null');
    }
}
