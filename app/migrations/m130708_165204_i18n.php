<?php
class m130708_165204_i18n extends CDbMigration
{
    public function up()
    {
        $this->renameColumn('section', 'slug', 'slug_en');
        $this->renameColumn('section', 'title', 'title_en');
        $this->addColumn('section', 'slug_es', 'varchar(255) null');
        $this->addColumn('section', 'title_es', 'varchar(255) null');
        $this->addColumn('section', 'slug_fa', 'varchar(255) null');
        $this->addColumn('section', 'title_fa', 'varchar(255) null');
        $this->addColumn('section', 'slug_hi', 'varchar(255) null');
        $this->addColumn('section', 'title_hi', 'varchar(255) null');
        $this->addColumn('section', 'slug_pt', 'varchar(255) null');
        $this->addColumn('section', 'title_pt', 'varchar(255) null');
        $this->addColumn('section', 'slug_sv', 'varchar(255) null');
        $this->addColumn('section', 'title_sv', 'varchar(255) null');
        $this->addColumn('section', 'slug_de', 'varchar(255) null');
        $this->addColumn('section', 'title_de', 'varchar(255) null');
    }

    public function down()
    {
      $this->renameColumn('section', 'slug_en', 'slug');
      $this->renameColumn('section', 'title_en', 'title');
      $this->dropColumn('section', 'slug_es');
      $this->dropColumn('section', 'title_es');
      $this->dropColumn('section', 'slug_fa');
      $this->dropColumn('section', 'title_fa');
      $this->dropColumn('section', 'slug_hi');
      $this->dropColumn('section', 'title_hi');
      $this->dropColumn('section', 'slug_pt');
      $this->dropColumn('section', 'title_pt');
      $this->dropColumn('section', 'slug_sv');
      $this->dropColumn('section', 'title_sv');
      $this->dropColumn('section', 'slug_de');
      $this->dropColumn('section', 'title_de');
    }
}
