<?php
class m130708_182124_i18n extends CDbMigration
{
    public function up()
    {
        $this->renameColumn('chapter', 'slug', 'slug_en');
        $this->renameColumn('chapter', 'title', 'title_en');
        $this->addColumn('chapter', 'slug_es', 'varchar(255) null');
        $this->addColumn('chapter', 'title_es', 'varchar(255) null');
        $this->addColumn('chapter', 'slug_fa', 'varchar(255) null');
        $this->addColumn('chapter', 'title_fa', 'varchar(255) null');
        $this->addColumn('chapter', 'slug_hi', 'varchar(255) null');
        $this->addColumn('chapter', 'title_hi', 'varchar(255) null');
        $this->addColumn('chapter', 'slug_pt', 'varchar(255) null');
        $this->addColumn('chapter', 'title_pt', 'varchar(255) null');
        $this->addColumn('chapter', 'slug_sv', 'varchar(255) null');
        $this->addColumn('chapter', 'title_sv', 'varchar(255) null');
        $this->addColumn('chapter', 'slug_de', 'varchar(255) null');
        $this->addColumn('chapter', 'title_de', 'varchar(255) null');
    }

    public function down()
    {
      $this->renameColumn('chapter', 'slug_en', 'slug');
      $this->renameColumn('chapter', 'title_en', 'title');
      $this->dropColumn('chapter', 'slug_es');
      $this->dropColumn('chapter', 'title_es');
      $this->dropColumn('chapter', 'slug_fa');
      $this->dropColumn('chapter', 'title_fa');
      $this->dropColumn('chapter', 'slug_hi');
      $this->dropColumn('chapter', 'title_hi');
      $this->dropColumn('chapter', 'slug_pt');
      $this->dropColumn('chapter', 'title_pt');
      $this->dropColumn('chapter', 'slug_sv');
      $this->dropColumn('chapter', 'title_sv');
      $this->dropColumn('chapter', 'slug_de');
      $this->dropColumn('chapter', 'title_de');
    }
}
