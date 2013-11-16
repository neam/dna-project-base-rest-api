<?php
class m131115_134748_i18n extends CDbMigration
{
    public function up()
    {
        $this->renameColumn('chapter', 'slug_en', 'slug');
        $this->dropColumn('chapter', 'slug_es');
        $this->dropColumn('chapter', 'slug_fa');
        $this->dropColumn('chapter', 'slug_hi');
        $this->dropColumn('chapter', 'slug_pt');
        $this->dropColumn('chapter', 'slug_sv');
        $this->dropColumn('chapter', 'slug_cn');
        $this->dropColumn('chapter', 'slug_de');
    }

    public function down()
    {
      $this->renameColumn('chapter', 'slug', 'slug_en');
      $this->addColumn('chapter', 'slug_es', 'varchar(255) null');
      $this->addColumn('chapter', 'slug_fa', 'varchar(255) null');
      $this->addColumn('chapter', 'slug_hi', 'varchar(255) null');
      $this->addColumn('chapter', 'slug_pt', 'varchar(255) null');
      $this->addColumn('chapter', 'slug_sv', 'varchar(255) null');
      $this->addColumn('chapter', 'slug_cn', 'varchar(255) null');
      $this->addColumn('chapter', 'slug_de', 'varchar(255) null');
    }
}
