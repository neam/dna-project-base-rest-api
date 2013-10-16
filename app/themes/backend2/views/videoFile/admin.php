<?php
$this->setPageTitle(
    Yii::t('model', 'Video Files')
    . ' - '
    . Yii::t('crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('model', 'Video Files');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'video-file-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('model', 'Video Files'); ?>
        <small><?php echo Yii::t('crud', 'Manage'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>



<?php
$this->widget('TbGridView',
    array(
        'id' => 'video-file-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'responsiveTable' => true,
        'template' => '{summary}{pager}{items}{pager}',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            array(
                'class' => 'CLinkColumn',
                'header' => '',
                'labelExpression' => '$data->itemLabel',
                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("id" => $data["id"]))'
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'id',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'videoFiles.itemLabel\')',
                'filter' => CHtml::listData(VideoFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_en',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'about_en',
            array(
                'name' => 'thumbnail_media_id',
                'value' => 'CHtml::value($data, \'thumbnailMedia.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'original_media_id',
                'value' => 'CHtml::value($data, \'originalMedia.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'generate_processed_media',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                'name' => 'processed_media_id_en',
                'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            #'subtitles_en',
            array(
                'name' => 'authoring_workflow_execution_id_en',
                'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdEn.itemLabel\')',
                'filter' => CHtml::listData(EzcExecution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'node_id',
                'value' => 'CHtml::value($data, \'node.itemLabel\')',
                'filter' => CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_es',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_fa',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_hi',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_pt',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_sv',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_cn',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_de',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'subtitles_es',
            #'subtitles_fa',
            #'subtitles_hi',
            #'subtitles_pt',
            #'subtitles_sv',
            #'subtitles_cn',
            #'subtitles_de',
            array(
                'name' => 'processed_media_id_es',
                'value' => 'CHtml::value($data, \'processedMediaIdEs.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_fa',
                'value' => 'CHtml::value($data, \'processedMediaIdFa.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_hi',
                'value' => 'CHtml::value($data, \'processedMediaIdHi.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_pt',
                'value' => 'CHtml::value($data, \'processedMediaIdPt.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_sv',
                'value' => 'CHtml::value($data, \'processedMediaIdSv.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_cn',
                'value' => 'CHtml::value($data, \'processedMediaIdCn.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_de',
                'value' => 'CHtml::value($data, \'processedMediaIdDe.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'authoring_workflow_execution_id_es',
                'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdEs.itemLabel\')',
                'filter' => CHtml::listData(EzcExecution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            array(
                'name' => 'authoring_workflow_execution_id_fa',
                'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdFa.itemLabel\')',
                'filter' => CHtml::listData(EzcExecution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            array(
                'name' => 'authoring_workflow_execution_id_hi',
                'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdHi.itemLabel\')',
                'filter' => CHtml::listData(EzcExecution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            array(
                'name' => 'authoring_workflow_execution_id_pt',
                'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdPt.itemLabel\')',
                'filter' => CHtml::listData(EzcExecution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            array(
                'name' => 'authoring_workflow_execution_id_sv',
                'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdSv.itemLabel\')',
                'filter' => CHtml::listData(EzcExecution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            array(
                'name' => 'authoring_workflow_execution_id_cn',
                'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdCn.itemLabel\')',
                'filter' => CHtml::listData(EzcExecution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            array(
                'name' => 'authoring_workflow_execution_id_de',
                'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdDe.itemLabel\')',
                'filter' => CHtml::listData(EzcExecution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_es',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_fa',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_hi',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_pt',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_sv',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_cn',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_de',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'about_es',
            #'about_fa',
            #'about_hi',
            #'about_pt',
            #'about_sv',
            #'about_cn',
            #'about_de',
            */

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("VideoFile.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("VideoFile.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("VideoFile.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id" => $data->id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id" => $data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->id))',
            ),
        )
    )
);
?>