<?php
$this->setPageTitle(
    Yii::t('model', 'Vector Graphic')
    . ' - '
    . Yii::t('model', 'Update')
    . ': '
    . $model->getItemLabel()
);
$this->breadcrumbs[Yii::t('model', 'Vector Graphics')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('model', 'Update');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Vector Graphic'); ?>
    <small>
        <?php echo Yii::t('model', 'Update') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>



<h2>
    <?php echo Yii::t('model', 'Data Chunks'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('dataChunk/create', 'DataChunk' => array('vector_graphic_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'dataChunks');
$this->widget('TbGridView',
    array(
        'id' => 'dataChunk-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->dataChunks) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_en',
                'editable' => array(
                    'url' => $this->createUrl('/vectorGraphic/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug',
                'editable' => array(
                    'url' => $this->createUrl('/vectorGraphic/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'about',
                'editable' => array(
                    'url' => $this->createUrl('/vectorGraphic/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'file_media_id',
                'value' => 'CHtml::value($data, \'fileMedia.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            #'metadata',
            array(
                'name' => 'data_source_id',
                'value' => 'CHtml::value($data, \'dataSource.itemLabel\')',
                'filter' => CHtml::listData(DataSource::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'slideshow_file_id',
                'value' => 'CHtml::value($data, \'slideshowFile.itemLabel\')',
                'filter' => CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/vectorGraphic/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/vectorGraphic/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_es',
                    'editable' => array(
                        'url' => $this->createUrl('/vectorGraphic/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/vectorGraphic/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/vectorGraphic/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/vectorGraphic/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/vectorGraphic/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/vectorGraphic/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/vectorGraphic/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('dataChunk/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('dataChunk/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('dataChunk/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>

