<?php
$this->setPageTitle(
    Yii::t('model', 'Video File Qa State')
    . ' - '
    . Yii::t('model', 'Update')
    . ': '
    . $model->getItemLabel()
);
$this->breadcrumbs[Yii::t('model', 'Video File Qa States')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('model', 'Update');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Video File Qa State'); ?>
    <small>
        <?php echo Yii::t('model', 'Update') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>



<h2>
    <?php echo Yii::t('model', 'Video Files'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('videoFile/create', 'VideoFile' => array('video_file_qa_state_id_de' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'videoFiles');
$this->widget('TbGridView',
    array(
        'id' => 'videoFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->videoFiles) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'generate_processed_media',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            #'subtitles_en',
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_en',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_es',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
            array(
                    'name' => 'video_file_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdEn.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdEs.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdFa.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdHi.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdPt.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdSv.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdCn.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('videoFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('videoFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('videoFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Video Files'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('videoFile/create', 'VideoFile' => array('video_file_qa_state_id_en' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'videoFiles1');
$this->widget('TbGridView',
    array(
        'id' => 'videoFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->videoFiles1) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'generate_processed_media',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            #'subtitles_en',
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_en',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_es',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
            array(
                    'name' => 'video_file_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdEs.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdFa.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdHi.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdPt.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdSv.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdCn.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdDe.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('videoFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('videoFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('videoFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Video Files'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('videoFile/create', 'VideoFile' => array('video_file_qa_state_id_cn' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'videoFiles2');
$this->widget('TbGridView',
    array(
        'id' => 'videoFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->videoFiles2) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'generate_processed_media',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            #'subtitles_en',
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_en',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_es',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
            array(
                    'name' => 'video_file_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdEn.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdEs.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdFa.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdHi.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdPt.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdSv.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdDe.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('videoFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('videoFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('videoFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Video Files'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('videoFile/create', 'VideoFile' => array('video_file_qa_state_id_es' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'videoFiles3');
$this->widget('TbGridView',
    array(
        'id' => 'videoFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->videoFiles3) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'generate_processed_media',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            #'subtitles_en',
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_en',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_es',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
            array(
                    'name' => 'video_file_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdEn.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdFa.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdHi.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdPt.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdSv.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdCn.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdDe.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('videoFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('videoFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('videoFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Video Files'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('videoFile/create', 'VideoFile' => array('video_file_qa_state_id_fa' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'videoFiles4');
$this->widget('TbGridView',
    array(
        'id' => 'videoFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->videoFiles4) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'generate_processed_media',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            #'subtitles_en',
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_en',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_es',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
            array(
                    'name' => 'video_file_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdEn.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdEs.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdHi.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdPt.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdSv.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdCn.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdDe.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('videoFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('videoFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('videoFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Video Files'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('videoFile/create', 'VideoFile' => array('video_file_qa_state_id_hi' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'videoFiles5');
$this->widget('TbGridView',
    array(
        'id' => 'videoFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->videoFiles5) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'generate_processed_media',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            #'subtitles_en',
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_en',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_es',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
            array(
                    'name' => 'video_file_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdEn.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdEs.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdFa.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdPt.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdSv.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdCn.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdDe.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('videoFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('videoFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('videoFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Video Files'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('videoFile/create', 'VideoFile' => array('video_file_qa_state_id_pt' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'videoFiles6');
$this->widget('TbGridView',
    array(
        'id' => 'videoFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->videoFiles6) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'generate_processed_media',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            #'subtitles_en',
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_en',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_es',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
            array(
                    'name' => 'video_file_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdEn.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdEs.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdFa.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdHi.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdSv.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdCn.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdDe.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('videoFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('videoFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('videoFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Video Files'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('videoFile/create', 'VideoFile' => array('video_file_qa_state_id_sv' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'videoFiles7');
$this->widget('TbGridView',
    array(
        'id' => 'videoFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->videoFiles7) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'generate_processed_media',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            #'subtitles_en',
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_en',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_es',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'authoring_workflow_execution_id_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFileQaState/editableSaver'),
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
            array(
                    'name' => 'video_file_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdEn.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdEs.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdFa.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdHi.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdPt.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdCn.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdDe.itemLabel\')',
                    'filter' => CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('videoFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('videoFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('videoFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>

