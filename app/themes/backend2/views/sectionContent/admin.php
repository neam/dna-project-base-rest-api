<?php
$this->breadcrumbs[] = Yii::t('crud', 'Section Contents');


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('section-content-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('crud', 'Section Contents'); ?>
    <small><?php echo Yii::t('crud', 'Manage'); ?></small>
</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->widget('TbGridView',
    array(
        'id' => 'section-content-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'id',
                'editable' => array(
                    'url' => $this->createUrl('/sectionContent/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'section_id',
                'value' => 'CHtml::value($data,\'section.itemLabel\')',
                'filter' => CHtml::listData(Section::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'ordinal',
                'editable' => array(
                    'url' => $this->createUrl('/sectionContent/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/sectionContent/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/sectionContent/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'html_chunk_id',
                'value' => 'CHtml::value($data,\'htmlChunk.itemLabel\')',
                'filter' => CHtml::listData(HtmlChunk::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'viz_view_id',
                'value' => 'CHtml::value($data,\'vizView.itemLabel\')',
                'filter' => CHtml::listData(VizView::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                        'name'=>'video_file_id',
                        'value'=>'CHtml::value($data,\'videoFile.itemLabel\')',
                                'filter'=>CHtml::listData(VideoFile::model()->findAll(array('limit'=>1000)), 'id', 'itemLabel'),
                                ),
            array(
                        'name'=>'teachers_guide_id',
                        'value'=>'CHtml::value($data,\'teachersGuide.itemLabel\')',
                                'filter'=>CHtml::listData(TeachersGuide::model()->findAll(array('limit'=>1000)), 'id', 'itemLabel'),
                                ),
            array(
                        'name'=>'exercise_id',
                        'value'=>'CHtml::value($data,\'exercise.itemLabel\')',
                                'filter'=>CHtml::listData(Exercise::model()->findAll(array('limit'=>1000)), 'id', 'itemLabel'),
                                ),
            array(
                        'name'=>'presentation_id',
                        'value'=>'CHtml::value($data,\'presentation.itemLabel\')',
                                'filter'=>CHtml::listData(Presentation::model()->findAll(array('limit'=>1000)), 'id', 'itemLabel'),
                                ),
            array(
                        'name'=>'data_chunk_id',
                        'value'=>'CHtml::value($data,\'dataChunk.itemLabel\')',
                                'filter'=>CHtml::listData(DataChunk::model()->findAll(array('limit'=>1000)), 'id', 'itemLabel'),
                                ),
            array(
                        'name'=>'download_link_id',
                        'value'=>'CHtml::value($data,\'downloadLink.itemLabel\')',
                                'filter'=>CHtml::listData(DownloadLink::model()->findAll(array('limit'=>1000)), 'id', 'itemLabel'),
                                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('id' => \$data->id))",
            ),
        )
    )); ?>
