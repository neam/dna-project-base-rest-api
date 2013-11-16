<?php
class m131115_134807_i18n extends CDbMigration
{
    public function up()
    {
        $this->renameColumn('chapter', 'title_en', 'title');
        $this->dropColumn('chapter', 'title_es');
        $this->dropColumn('chapter', 'title_fa');
        $this->dropColumn('chapter', 'title_hi');
        $this->dropColumn('chapter', 'title_pt');
        $this->dropColumn('chapter', 'title_sv');
        $this->dropColumn('chapter', 'title_cn');
        $this->dropColumn('chapter', 'title_de');
    }

    public function down()
    {
      $this->renameColumn('chapter', 'title', 'title_en');
      $this->addColumn('chapter', 'title_es', 'varchar(255) null');
      $this->addColumn('chapter', 'title_fa', 'varchar(255) null');
      $this->addColumn('chapter', 'title_hi', 'varchar(255) null');
      $this->addColumn('chapter', 'title_pt', 'varchar(255) null');
      $this->addColumn('chapter', 'title_sv', 'varchar(255) null');
      $this->addColumn('chapter', 'title_cn', 'varchar(255) null');
      $this->addColumn('chapter', 'title_de', 'varchar(255) null');
    }
}
