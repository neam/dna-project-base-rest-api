<?php
$this->setPageTitle(
    Yii::t('model', 'Download Link')
    . ' - '
    . Yii::t('model', 'Update')
    . ': '
    . $model->getItemLabel()
);
$this->breadcrumbs[Yii::t('model', 'Download Links')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('model', 'Update');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Download Link'); ?>
    <small>
        <?php echo Yii::t('model', 'Update') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>



<h2>
    <?php echo Yii::t('model', 'Download Links'); ?>
    <small>downloadLinks</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('downloadLink/create', 'DownloadLink' => array('cloned_from_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'downloadLinks');
$this->widget('TbGridView',
    array(
        'id' => 'downloadLink-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->downloadLinks) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/downloadLink/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_en',
                'editable' => array(
                    'url' => $this->createUrl('/downloadLink/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'file_media_id',
                'value' => 'CHtml::value($data, \'fileMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/downloadLink/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/downloadLink/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'node_id',
                'value' => 'CHtml::value($data, \'node.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_es',
                'editable' => array(
                    'url' => $this->createUrl('/downloadLink/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/downloadLink/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/downloadLink/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/downloadLink/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/downloadLink/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/downloadLink/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/downloadLink/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('downloadLink/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('downloadLink/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('downloadLink/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Section Contents'); ?>
    <small>sectionContents</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('sectionContent/create', 'SectionContent' => array('download_link_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'sectionContents');
$this->widget('TbGridView',
    array(
        'id' => 'sectionContent-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->sectionContents) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'name' => 'section_id',
                'value' => 'CHtml::value($data, \'section.itemLabel\')',
                'filter' => '', //CHtml::listData(Section::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'ordinal',
                'editable' => array(
                    'url' => $this->createUrl('/downloadLink/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/downloadLink/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/downloadLink/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'html_chunk_id',
                'value' => 'CHtml::value($data, \'htmlChunk.itemLabel\')',
                'filter' => '', //CHtml::listData(HtmlChunk::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'snapshot_id',
                'value' => 'CHtml::value($data, \'snapshot.itemLabel\')',
                'filter' => '', //CHtml::listData(Snapshot::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'video_file_id',
                'value' => 'CHtml::value($data, \'videoFile.itemLabel\')',
                'filter' => '', //CHtml::listData(VideoFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'name' => 'exercise_id',
                    'value' => 'CHtml::value($data, \'exercise.itemLabel\')',
                    'filter' => '',//CHtml::listData(Exercise::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'slideshow_file_id',
                    'value' => 'CHtml::value($data, \'slideshowFile.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_chunk_id',
                    'value' => 'CHtml::value($data, \'dataChunk.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataChunk::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exam_question_id',
                    'value' => 'CHtml::value($data, \'examQuestion.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExamQuestion::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
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

