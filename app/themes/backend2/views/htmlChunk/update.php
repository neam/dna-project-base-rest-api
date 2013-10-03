<?php
$this->breadcrumbs[Yii::t('crud', 'Html Chunks')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Update');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('crud', 'Html Chunk') ?>
    <small><?php echo Yii::t('crud', 'Update') ?> #<?php echo $model->id ?></small>
</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php
$this->renderPartial('_form', array(
    'model' => $model));
?>

<?php

/*
Code example to include an editable detail view:

<h2>
    <?php echo Yii::t('crud','Editable Detail View')?></h2>

<?php
$this->widget('EditableDetailView', array(
    'data' => $model,
    'url' => $this->createUrl('editableSaver'),
));
?>

*/
?>



<h2>
    <?php echo Yii::t('crud', 'Section Contents'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(// TODO
            #array('label'=>Yii::t('crud','Create'), 'icon'=>'icon-plus', 'url' => array('sectionContent/create','SectionContent' => array('html_chunk_id'=>$model->id), 'returnUrl' => Yii::app()->request->url), array('class'=>''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'sectionContents');
$this->widget('TbGridView',
    array(
        'id' => 'sectionContent-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => count($model->sectionContents) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'name' => 'section_id',
                'value' => 'CHtml::value($data,\'section.itemLabel\')',
                'filter' => CHtml::listData(Section::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'ordinal',
                'editable' => array(
                    'url' => $this->createUrl('/htmlChunk/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/htmlChunk/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/htmlChunk/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'viz_view_id',
                'value' => 'CHtml::value($data,\'vizView.itemLabel\')',
                'filter' => CHtml::listData(VizView::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'video_file_id',
                'value' => 'CHtml::value($data,\'videoFile.itemLabel\')',
                'filter' => CHtml::listData(VideoFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'teachers_guide_id',
                'value' => 'CHtml::value($data,\'teachersGuide.itemLabel\')',
                'filter' => CHtml::listData(TeachersGuide::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
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
                'viewButtonUrl' => "Yii::app()->controller->createUrl('sectionContent/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('sectionContent/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('sectionContent/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>
