<?php
$this->breadcrumbs[] = Yii::t('crud', 'Sections');


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('section-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('crud', 'Sections'); ?>
    <small><?php echo Yii::t('crud', 'Manage'); ?></small>
</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php
$this->widget('TbGridView', array(
    'id' => 'section-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'pager' => array(
        'class' => 'TbPager',
        'displayFirstAndLast' => true,
    ),
    'columns' => array(
        'id',
        array(
            'name' => 'chapter_id',
            'value' => 'CHtml::value($data,\'chapter.itemLabel\')',
            'filter' => CHtml::listData(Chapter::model()->findAll(), 'id', 'itemLabel'),
        ),
        'title_en',
        'slug_en',
        'ordinal',
        'menu_label_en',
        'created',
        /*
          'modified',
          'slug_es',
          'title_es',
          'slug_fa',
          'title_fa',
          'slug_hi',
          'title_hi',
          'slug_pt',
          'title_pt',
          'slug_sv',
          'title_sv',
          'slug_de',
          'title_de',
          'menu_label_es',
          'menu_label_fa',
          'menu_label_hi',
          'menu_label_pt',
          'menu_label_sv',
          'menu_label_de',
         */
        array(
            'class' => 'TbButtonColumn',
            'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('id' => \$data->id))",
            'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('id' => \$data->id))",
            'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('id' => \$data->id))",
        ),
    ),
));
?>
