<?php /** @var Account $model */?>
<?php $this->widget('TbGridView', array(
    'id' => 'changeset-grid',
    'template' => '{items}',
    'dataProvider' => $model->profiles->search(),
    'filter' => null,
    'enableSorting' => false,
    'pager' => array(
        'class' => 'TbPager',
        'displayFirstAndLast' => true,
    ),
    'columns' => $this->createToggleColumns(),
)); ?>
