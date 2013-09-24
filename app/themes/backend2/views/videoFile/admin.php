<?php
$this->setPageTitle(
    Yii::t('crud', 'Video Files')
    . ' - '
    . Yii::t('crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('crud', 'Video Files');
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

        <?php echo Yii::t('crud', 'Video Files'); ?>
        <small><?php echo Yii::t('crud', 'Manage'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>



<?php
$this->widget('TbGridView',
    array(
        'id' => 'video-file-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'template' => '{pager}{summary}{items}{pager}',
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
                'class' => 'editable.EditableColumn',
                'name' => 'id',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'title_en',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'subtitles_en',
            array(
                'name' => 'original_media_id',
                'value' => 'CHtml::value($data, \'originalMedia.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'generate_processed_media',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'processed_media_id_en',
                'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'authoring_workflow_execution_id',
                'value' => 'CHtml::value($data, \'authoringWorkflowExecution.itemLabel\')',
                'filter' => CHtml::listData(Execution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            array(
                'name' => 'translation_workflow_execution_id_en',
                'value' => 'CHtml::value($data, \'translationWorkflowExecutionIdEn.itemLabel\')',
                'filter' => CHtml::listData(Execution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'title_es',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'title_fa',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'title_hi',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'title_pt',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'title_sv',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'title_cn',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
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
                        'name' => 'translation_workflow_execution_id_es',
                        'value' => 'CHtml::value($data, \'translationWorkflowExecutionIdEs.itemLabel\')',
                                'filter' => CHtml::listData(Execution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
                                ),
            array(
                        'name' => 'translation_workflow_execution_id_fa',
                        'value' => 'CHtml::value($data, \'translationWorkflowExecutionIdFa.itemLabel\')',
                                'filter' => CHtml::listData(Execution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
                                ),
            array(
                        'name' => 'translation_workflow_execution_id_hi',
                        'value' => 'CHtml::value($data, \'translationWorkflowExecutionIdHi.itemLabel\')',
                                'filter' => CHtml::listData(Execution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
                                ),
            array(
                        'name' => 'translation_workflow_execution_id_pt',
                        'value' => 'CHtml::value($data, \'translationWorkflowExecutionIdPt.itemLabel\')',
                                'filter' => CHtml::listData(Execution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
                                ),
            array(
                        'name' => 'translation_workflow_execution_id_sv',
                        'value' => 'CHtml::value($data, \'translationWorkflowExecutionIdSv.itemLabel\')',
                                'filter' => CHtml::listData(Execution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
                                ),
            array(
                        'name' => 'translation_workflow_execution_id_cn',
                        'value' => 'CHtml::value($data, \'translationWorkflowExecutionIdCn.itemLabel\')',
                                'filter' => CHtml::listData(Execution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
                                ),
            array(
                        'name' => 'translation_workflow_execution_id_de',
                        'value' => 'CHtml::value($data, \'translationWorkflowExecutionIdDe.itemLabel\')',
                                'filter' => CHtml::listData(Execution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
                                ),
            */

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("B61b08a5.VideoFile.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("B61b08a5.VideoFile.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("B61b08a5.VideoFile.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id" => $data->id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id" => $data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->id))',
            ),
        )
    )
);
?>