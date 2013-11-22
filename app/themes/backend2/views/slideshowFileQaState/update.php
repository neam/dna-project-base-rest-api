<?php
$this->setPageTitle(
    Yii::t('model', 'Slideshow File Qa State')
    . ' - '
    . Yii::t('model', 'Update')
    . ': '
    . $model->getItemLabel()
);
$this->breadcrumbs[Yii::t('model', 'Slideshow File Qa States')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('model', 'Update');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Slideshow File Qa State'); ?>
    <small>
        <?php echo Yii::t('model', 'Update') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>



<h2>
    <?php echo Yii::t('model', 'Slideshow Files'); ?>
    <small>slideshowFiles</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('slideshowFile/create', 'SlideshowFile' => array('slideshow_file_qa_state_id_en' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'slideshowFiles');
$this->widget('TbGridView',
    array(
        'id' => 'slideshowFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->slideshowFiles) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'slideshowFiles.itemLabel\')',
                'filter' => '', //CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_about',
            array(
                'name' => 'original_media_id',
                'value' => 'CHtml::value($data, \'originalMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'generate_processed_media',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'owner_id',
                    'value' => 'CHtml::value($data, \'owner.itemLabel\')',
                    'filter' => '',//CHtml::listData(Users::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_es',
                    'value' => 'CHtml::value($data, \'processedMediaIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_fa',
                    'value' => 'CHtml::value($data, \'processedMediaIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_hi',
                    'value' => 'CHtml::value($data, \'processedMediaIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_pt',
                    'value' => 'CHtml::value($data, \'processedMediaIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_sv',
                    'value' => 'CHtml::value($data, \'processedMediaIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_cn',
                    'value' => 'CHtml::value($data, \'processedMediaIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_de',
                    'value' => 'CHtml::value($data, \'processedMediaIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Slideshow Files'); ?>
    <small>slideshowFiles1</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('slideshowFile/create', 'SlideshowFile' => array('slideshow_file_qa_state_id_cn' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'slideshowFiles1');
$this->widget('TbGridView',
    array(
        'id' => 'slideshowFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->slideshowFiles1) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'slideshowFiles.itemLabel\')',
                'filter' => '', //CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_about',
            array(
                'name' => 'original_media_id',
                'value' => 'CHtml::value($data, \'originalMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'generate_processed_media',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'owner_id',
                    'value' => 'CHtml::value($data, \'owner.itemLabel\')',
                    'filter' => '',//CHtml::listData(Users::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_es',
                    'value' => 'CHtml::value($data, \'processedMediaIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_fa',
                    'value' => 'CHtml::value($data, \'processedMediaIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_hi',
                    'value' => 'CHtml::value($data, \'processedMediaIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_pt',
                    'value' => 'CHtml::value($data, \'processedMediaIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_sv',
                    'value' => 'CHtml::value($data, \'processedMediaIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_cn',
                    'value' => 'CHtml::value($data, \'processedMediaIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_de',
                    'value' => 'CHtml::value($data, \'processedMediaIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Slideshow Files'); ?>
    <small>slideshowFiles2</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('slideshowFile/create', 'SlideshowFile' => array('slideshow_file_qa_state_id_de' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'slideshowFiles2');
$this->widget('TbGridView',
    array(
        'id' => 'slideshowFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->slideshowFiles2) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'slideshowFiles.itemLabel\')',
                'filter' => '', //CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_about',
            array(
                'name' => 'original_media_id',
                'value' => 'CHtml::value($data, \'originalMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'generate_processed_media',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'owner_id',
                    'value' => 'CHtml::value($data, \'owner.itemLabel\')',
                    'filter' => '',//CHtml::listData(Users::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_es',
                    'value' => 'CHtml::value($data, \'processedMediaIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_fa',
                    'value' => 'CHtml::value($data, \'processedMediaIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_hi',
                    'value' => 'CHtml::value($data, \'processedMediaIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_pt',
                    'value' => 'CHtml::value($data, \'processedMediaIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_sv',
                    'value' => 'CHtml::value($data, \'processedMediaIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_cn',
                    'value' => 'CHtml::value($data, \'processedMediaIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_de',
                    'value' => 'CHtml::value($data, \'processedMediaIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Slideshow Files'); ?>
    <small>slideshowFiles3</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('slideshowFile/create', 'SlideshowFile' => array('slideshow_file_qa_state_id_es' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'slideshowFiles3');
$this->widget('TbGridView',
    array(
        'id' => 'slideshowFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->slideshowFiles3) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'slideshowFiles.itemLabel\')',
                'filter' => '', //CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_about',
            array(
                'name' => 'original_media_id',
                'value' => 'CHtml::value($data, \'originalMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'generate_processed_media',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'owner_id',
                    'value' => 'CHtml::value($data, \'owner.itemLabel\')',
                    'filter' => '',//CHtml::listData(Users::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_es',
                    'value' => 'CHtml::value($data, \'processedMediaIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_fa',
                    'value' => 'CHtml::value($data, \'processedMediaIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_hi',
                    'value' => 'CHtml::value($data, \'processedMediaIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_pt',
                    'value' => 'CHtml::value($data, \'processedMediaIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_sv',
                    'value' => 'CHtml::value($data, \'processedMediaIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_cn',
                    'value' => 'CHtml::value($data, \'processedMediaIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_de',
                    'value' => 'CHtml::value($data, \'processedMediaIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Slideshow Files'); ?>
    <small>slideshowFiles4</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('slideshowFile/create', 'SlideshowFile' => array('slideshow_file_qa_state_id_fa' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'slideshowFiles4');
$this->widget('TbGridView',
    array(
        'id' => 'slideshowFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->slideshowFiles4) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'slideshowFiles.itemLabel\')',
                'filter' => '', //CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_about',
            array(
                'name' => 'original_media_id',
                'value' => 'CHtml::value($data, \'originalMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'generate_processed_media',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'owner_id',
                    'value' => 'CHtml::value($data, \'owner.itemLabel\')',
                    'filter' => '',//CHtml::listData(Users::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_es',
                    'value' => 'CHtml::value($data, \'processedMediaIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_fa',
                    'value' => 'CHtml::value($data, \'processedMediaIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_hi',
                    'value' => 'CHtml::value($data, \'processedMediaIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_pt',
                    'value' => 'CHtml::value($data, \'processedMediaIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_sv',
                    'value' => 'CHtml::value($data, \'processedMediaIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_cn',
                    'value' => 'CHtml::value($data, \'processedMediaIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_de',
                    'value' => 'CHtml::value($data, \'processedMediaIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Slideshow Files'); ?>
    <small>slideshowFiles5</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('slideshowFile/create', 'SlideshowFile' => array('slideshow_file_qa_state_id_hi' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'slideshowFiles5');
$this->widget('TbGridView',
    array(
        'id' => 'slideshowFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->slideshowFiles5) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'slideshowFiles.itemLabel\')',
                'filter' => '', //CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_about',
            array(
                'name' => 'original_media_id',
                'value' => 'CHtml::value($data, \'originalMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'generate_processed_media',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'owner_id',
                    'value' => 'CHtml::value($data, \'owner.itemLabel\')',
                    'filter' => '',//CHtml::listData(Users::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_es',
                    'value' => 'CHtml::value($data, \'processedMediaIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_fa',
                    'value' => 'CHtml::value($data, \'processedMediaIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_hi',
                    'value' => 'CHtml::value($data, \'processedMediaIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_pt',
                    'value' => 'CHtml::value($data, \'processedMediaIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_sv',
                    'value' => 'CHtml::value($data, \'processedMediaIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_cn',
                    'value' => 'CHtml::value($data, \'processedMediaIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_de',
                    'value' => 'CHtml::value($data, \'processedMediaIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Slideshow Files'); ?>
    <small>slideshowFiles6</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('slideshowFile/create', 'SlideshowFile' => array('slideshow_file_qa_state_id_pt' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'slideshowFiles6');
$this->widget('TbGridView',
    array(
        'id' => 'slideshowFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->slideshowFiles6) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'slideshowFiles.itemLabel\')',
                'filter' => '', //CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_about',
            array(
                'name' => 'original_media_id',
                'value' => 'CHtml::value($data, \'originalMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'generate_processed_media',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'owner_id',
                    'value' => 'CHtml::value($data, \'owner.itemLabel\')',
                    'filter' => '',//CHtml::listData(Users::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_es',
                    'value' => 'CHtml::value($data, \'processedMediaIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_fa',
                    'value' => 'CHtml::value($data, \'processedMediaIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_hi',
                    'value' => 'CHtml::value($data, \'processedMediaIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_pt',
                    'value' => 'CHtml::value($data, \'processedMediaIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_sv',
                    'value' => 'CHtml::value($data, \'processedMediaIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_cn',
                    'value' => 'CHtml::value($data, \'processedMediaIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_de',
                    'value' => 'CHtml::value($data, \'processedMediaIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Slideshow Files'); ?>
    <small>slideshowFiles7</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('slideshowFile/create', 'SlideshowFile' => array('slideshow_file_qa_state_id_sv' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'slideshowFiles7');
$this->widget('TbGridView',
    array(
        'id' => 'slideshowFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->slideshowFiles7) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'slideshowFiles.itemLabel\')',
                'filter' => '', //CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_about',
            array(
                'name' => 'original_media_id',
                'value' => 'CHtml::value($data, \'originalMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'generate_processed_media',
                'editable' => array(
                    'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'owner_id',
                    'value' => 'CHtml::value($data, \'owner.itemLabel\')',
                    'filter' => '',//CHtml::listData(Users::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_es',
                    'value' => 'CHtml::value($data, \'processedMediaIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_fa',
                    'value' => 'CHtml::value($data, \'processedMediaIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_hi',
                    'value' => 'CHtml::value($data, \'processedMediaIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_pt',
                    'value' => 'CHtml::value($data, \'processedMediaIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_sv',
                    'value' => 'CHtml::value($data, \'processedMediaIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_cn',
                    'value' => 'CHtml::value($data, \'processedMediaIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_de',
                    'value' => 'CHtml::value($data, \'processedMediaIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/slideshowFileQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('slideshowFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>

