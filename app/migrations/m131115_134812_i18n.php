<?php
class m131115_134812_i18n extends CDbMigration
{
    public function up()
    {
        $this->renameColumn('chapter', 'teachers_guide_en', 'teachers_guide');
        $this->dropColumn('chapter', 'teachers_guide_es');
        $this->dropColumn('chapter', 'teachers_guide_fa');
        $this->dropColumn('chapter', 'teachers_guide_hi');
        $this->dropColumn('chapter', 'teachers_guide_pt');
        $this->dropColumn('chapter', 'teachers_guide_sv');
        $this->dropColumn('chapter', 'teachers_guide_cn');
        $this->dropColumn('chapter', 'teachers_guide_de');
    }

    public function down()
    {
      $this->renameColumn('chapter', 'teachers_guide', 'teachers_guide_en');
      $this->addColumn('chapter', 'teachers_guide_es', 'text null');
      $this->addColumn('chapter', 'teachers_guide_fa', 'text null');
      $this->addColumn('chapter', 'teachers_guide_hi', 'text null');
      $this->addColumn('chapter', 'teachers_guide_pt', 'text null');
      $this->addColumn('chapter', 'teachers_guide_sv', 'text null');
      $this->addColumn('chapter', 'teachers_guide_cn', 'text null');
      $this->addColumn('chapter', 'teachers_guide_de', 'text null');
    }
}
