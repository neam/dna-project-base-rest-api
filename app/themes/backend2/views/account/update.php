<?php
$this->setPageTitle(
    Yii::t('model', 'Account')
    . ' - '
    . Yii::t('model', 'Update')
    . ': '
    . $model->getItemLabel()
);
$this->breadcrumbs[Yii::t('model', 'Accounts')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('model', 'Update');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Account'); ?>
    <small>
        <?php echo Yii::t('model', 'Update') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>



<h2>
    <?php echo Yii::t('model', 'Changesets'); ?>
    <small>changesets</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('changeset/create', 'Changeset' => array('user_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'changesets');
$this->widget('TbGridView',
    array(
        'id' => 'changeset-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->changesets) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            #'contents',
            array(
                'name' => 'node_id',
                'value' => 'CHtml::value($data, \'node.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'reward',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('changeset/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('changeset/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('changeset/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Chapters'); ?>
    <small>chapters</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('chapter/create', 'Chapter' => array('owner_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'chapters');
$this->widget('TbGridView',
    array(
        'id' => 'chapter-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->chapters) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'chapters.itemLabel\')',
                'filter' => '', //CHtml::listData(Chapter::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'thumbnail_media_id',
                'value' => 'CHtml::value($data, \'thumbnailMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            #'_about',
            #'_teachers_guide',
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'chapter_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'chapterQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(ChapterQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'chapter_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'chapterQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(ChapterQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'chapter_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'chapterQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(ChapterQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'chapter_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'chapterQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(ChapterQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'chapter_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'chapterQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(ChapterQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'chapter_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'chapterQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(ChapterQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'chapter_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'chapterQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(ChapterQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'chapter_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'chapterQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(ChapterQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('chapter/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('chapter/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('chapter/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Data Chunks'); ?>
    <small>dataChunks</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('dataChunk/create', 'DataChunk' => array('owner_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
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
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'dataChunks.itemLabel\')',
                'filter' => '', //CHtml::listData(DataChunk::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_about',
            array(
                'name' => 'file_media_id',
                'value' => 'CHtml::value($data, \'fileMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            #'metadata',
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'data_chunk_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'dataChunkQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataChunkQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_chunk_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'dataChunkQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataChunkQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_chunk_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'dataChunkQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataChunkQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_chunk_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'dataChunkQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataChunkQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_chunk_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'dataChunkQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataChunkQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_chunk_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'dataChunkQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataChunkQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_chunk_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'dataChunkQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataChunkQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_chunk_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'dataChunkQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataChunkQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
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


<h2>
    <?php echo Yii::t('model', 'Data Sources'); ?>
    <small>dataSources</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('dataSource/create', 'DataSource' => array('owner_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'dataSources');
$this->widget('TbGridView',
    array(
        'id' => 'dataSource-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->dataSources) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'clonedFrom.itemLabel\')',
                'filter' => '', //CHtml::listData(Snapshot::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_about',
            array(
                'name' => 'logo_media_id',
                'value' => 'CHtml::value($data, \'logoMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'mini_logo_media_id',
                'value' => 'CHtml::value($data, \'miniLogoMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'link',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'data_source_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'dataSourceQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataSourceQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_source_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'dataSourceQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataSourceQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_source_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'dataSourceQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataSourceQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_source_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'dataSourceQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataSourceQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_source_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'dataSourceQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataSourceQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_source_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'dataSourceQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataSourceQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_source_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'dataSourceQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataSourceQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_source_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'dataSourceQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataSourceQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('dataSource/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('dataSource/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('dataSource/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Download Links'); ?>
    <small>downloadLinks</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('downloadLink/create', 'DownloadLink' => array('owner_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
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
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'downloadLinks.itemLabel\')',
                'filter' => '', //CHtml::listData(DownloadLink::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
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
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'node_id',
                'value' => 'CHtml::value($data, \'node.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'name' => 'download_link_qa_state_id',
                    'value' => 'CHtml::value($data, \'downloadLinkQaState.itemLabel\')',
                    'filter' => '',//CHtml::listData(DownloadLinkQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
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
    <?php echo Yii::t('model', 'Exam Questions'); ?>
    <small>examQuestions</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('examQuestion/create', 'ExamQuestion' => array('owner_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'examQuestions');
$this->widget('TbGridView',
    array(
        'id' => 'examQuestion-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->examQuestions) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'clonedFrom.itemLabel\')',
                'filter' => '', //CHtml::listData(Snapshot::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_question',
            array(
                'name' => 'source_node_id',
                'value' => 'CHtml::value($data, \'sourceNode.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'exam_question_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'examQuestionQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExamQuestionQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exam_question_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'examQuestionQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExamQuestionQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exam_question_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'examQuestionQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExamQuestionQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exam_question_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'examQuestionQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExamQuestionQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exam_question_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'examQuestionQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExamQuestionQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exam_question_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'examQuestionQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExamQuestionQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exam_question_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'examQuestionQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExamQuestionQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exam_question_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'examQuestionQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExamQuestionQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('examQuestion/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('examQuestion/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('examQuestion/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Exam Question Alternatives'); ?>
    <small>examQuestionAlternatives</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('examQuestionAlternative/create', 'ExamQuestionAlternative' => array('owner_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'examQuestionAlternatives');
$this->widget('TbGridView',
    array(
        'id' => 'examQuestionAlternative-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->examQuestionAlternatives) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_markup',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'correct',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'exam_question_id',
                'value' => 'CHtml::value($data, \'examQuestion.itemLabel\')',
                'filter' => '', //CHtml::listData(ExamQuestion::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'node_id',
                'value' => 'CHtml::value($data, \'node.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('examQuestionAlternative/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('examQuestionAlternative/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('examQuestionAlternative/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Exercises'); ?>
    <small>exercises</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('exercise/create', 'Exercise' => array('owner_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'exercises');
$this->widget('TbGridView',
    array(
        'id' => 'exercise-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->exercises) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'exercises.itemLabel\')',
                'filter' => '', //CHtml::listData(Exercise::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_question',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_description',
            array(
                'name' => 'thumbnail_media_id',
                'value' => 'CHtml::value($data, \'thumbnailMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'name' => 'slideshow_file_id',
                    'value' => 'CHtml::value($data, \'slideshowFile.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'exercise_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('exercise/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('exercise/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('exercise/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Html Chunks'); ?>
    <small>htmlChunks</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('htmlChunk/create', 'HtmlChunk' => array('owner_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'htmlChunks');
$this->widget('TbGridView',
    array(
        'id' => 'htmlChunk-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->htmlChunks) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'htmlChunks.itemLabel\')',
                'filter' => '', //CHtml::listData(HtmlChunk::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            #'_markup',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'node_id',
                'value' => 'CHtml::value($data, \'node.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'html_chunk_qa_state_id',
                'value' => 'CHtml::value($data, \'htmlChunkQaState.itemLabel\')',
                'filter' => '', //CHtml::listData(HtmlChunkQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('htmlChunk/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('htmlChunk/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('htmlChunk/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Pages'); ?>
    <small>pages</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('page/create', 'Page' => array('owner_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'pages');
$this->widget('TbGridView',
    array(
        'id' => 'page-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->pages) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'pages.itemLabel\')',
                'filter' => '', //CHtml::listData(Page::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_about',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('page/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('page/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('page/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Po Files'); ?>
    <small>poFiles</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('poFile/create', 'PoFile' => array('owner_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'poFiles');
$this->widget('TbGridView',
    array(
        'id' => 'poFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->poFiles) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'poFiles.itemLabel\')',
                'filter' => '', //CHtml::listData(PoFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'about',
            array(
                'name' => 'original_media_id',
                'value' => 'CHtml::value($data, \'originalMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'processed_media_id_en',
                'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
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
                    'name' => 'po_file_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'poFileQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(PoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'po_file_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'poFileQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(PoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'po_file_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'poFileQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(PoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'po_file_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'poFileQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(PoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'po_file_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'poFileQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(PoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'po_file_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'poFileQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(PoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'po_file_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'poFileQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(PoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'po_file_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'poFileQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(PoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('poFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('poFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('poFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>

<div class='well'>
    <div class='row'>
        <div class='span3'><?php
            echo '<h3>';
            echo Yii::t('model', 'relation.Profiles') . ' ';
            $this->widget(
                'bootstrap.widgets.TbButtonGroup',
                array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size' => 'mini',
                    'buttons' => array(
                        array(
                            'icon' => 'icon-list-alt',
                            'url' => array('/profiles/admin', 'Profiles' => array('user_id' => $model->{$model->tableSchema->primaryKey}))
                        ),
                        array(
                            'icon' => 'icon-plus',
                            'url' => array(
                                '/profiles/create',
                                'Profiles' => array('user_id' => $model->{$model->tableSchema->primaryKey})
                            )
                        ),

                    )
                )
            );
            echo '</h3>' ?></div>
        <div class='span8'>
            <?php
            echo '<span class=label>CHasOneRelation</span>';
            $relatedModel = $model->profiles;

            if ($relatedModel !== null) {
                echo CHtml::openTag('ul');
                echo '<li>';
                echo CHtml::link(
                    '#' . $model->profiles->user_id . ' ' . $model->profiles->itemLabel,
                    array('profiles/view', 'user_id' => $model->profiles->user_id),
                    array('class' => ''));

                echo '</li>';

                echo CHtml::closeTag('ul');
            }
            ?></div>
    </div>
    <!-- row -->
</div> <!-- well -->

<h2>
    <?php echo Yii::t('model', 'Slideshow Files'); ?>
    <small>slideshowFiles</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('slideshowFile/create', 'SlideshowFile' => array('owner_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
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
                    'url' => $this->createUrl('/account/editableSaver'),
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
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
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
                    'url' => $this->createUrl('/account/editableSaver'),
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
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
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
                    'name' => 'slideshow_file_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'slideshowFileQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
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
    <?php echo Yii::t('model', 'Snapshots'); ?>
    <small>snapshots</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('snapshot/create', 'Snapshot' => array('owner_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'snapshots');
$this->widget('TbGridView',
    array(
        'id' => 'snapshot-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->snapshots) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'snapshots.itemLabel\')',
                'filter' => '', //CHtml::listData(Snapshot::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            #'vizabi_state',
            #'embed_override',
            array(
                'name' => 'tool_id',
                'value' => 'CHtml::value($data, \'tool.itemLabel\')',
                'filter' => '', //CHtml::listData(Tool::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            #'_about',
            array(
                    'name' => 'thumbnail_media_id',
                    'value' => 'CHtml::value($data, \'thumbnailMedia.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'snapshot_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'snapshotQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(SnapshotQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'snapshot_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'snapshotQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(SnapshotQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'snapshot_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'snapshotQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(SnapshotQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'snapshot_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'snapshotQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(SnapshotQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'snapshot_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'snapshotQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(SnapshotQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'snapshot_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'snapshotQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(SnapshotQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'snapshot_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'snapshotQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(SnapshotQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'snapshot_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'snapshotQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(SnapshotQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('snapshot/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('snapshot/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('snapshot/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Spreadsheet Files'); ?>
    <small>spreadsheetFiles</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('spreadsheetFile/create', 'SpreadsheetFile' => array('owner_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'spreadsheetFiles');
$this->widget('TbGridView',
    array(
        'id' => 'spreadsheetFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->spreadsheetFiles) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'spreadsheetFiles.itemLabel\')',
                'filter' => '', //CHtml::listData(SpreadsheetFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'data_source_id',
                'value' => 'CHtml::value($data, \'dataSource.itemLabel\')',
                'filter' => '', //CHtml::listData(DataSource::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'original_media_id',
                'value' => 'CHtml::value($data, \'originalMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'generate_processed_media',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'processed_media_id_en',
                'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
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
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('spreadsheetFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('spreadsheetFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('spreadsheetFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Text Docs'); ?>
    <small>textDocs</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('textDoc/create', 'TextDoc' => array('owner_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'textDocs');
$this->widget('TbGridView',
    array(
        'id' => 'textDoc-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->textDocs) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'textDocs.itemLabel\')',
                'filter' => '', //CHtml::listData(TextDoc::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
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
                    'url' => $this->createUrl('/account/editableSaver'),
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
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
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
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'text_doc_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'textDocQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(TextDocQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'text_doc_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'textDocQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(TextDocQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'text_doc_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'textDocQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(TextDocQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'text_doc_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'textDocQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(TextDocQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'text_doc_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'textDocQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(TextDocQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'text_doc_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'textDocQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(TextDocQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'text_doc_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'textDocQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(TextDocQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'text_doc_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'textDocQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(TextDocQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('textDoc/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('textDoc/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('textDoc/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Tools'); ?>
    <small>tools</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('tool/create', 'Tool' => array('owner_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'tools');
$this->widget('TbGridView',
    array(
        'id' => 'tool-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->tools) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'tools.itemLabel\')',
                'filter' => '', //CHtml::listData(Tool::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_about',
            #'embed_template',
            array(
                'name' => 'po_file_id',
                'value' => 'CHtml::value($data, \'poFile.itemLabel\')',
                'filter' => '', //CHtml::listData(PoFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'tool_qa_state_id',
                    'value' => 'CHtml::value($data, \'toolQaState.itemLabel\')',
                    'filter' => '',//CHtml::listData(ToolQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('tool/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('tool/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('tool/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Vector Graphics'); ?>
    <small>vectorGraphics</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('vectorGraphic/create', 'VectorGraphic' => array('owner_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'vectorGraphics');
$this->widget('TbGridView',
    array(
        'id' => 'vectorGraphic-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->vectorGraphics) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'vectorGraphics.itemLabel\')',
                'filter' => '', //CHtml::listData(VectorGraphic::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
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
                'name' => 'processed_media_id_en',
                'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
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
                    'name' => 'vector_graphic_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'vectorGraphicQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(VectorGraphicQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'vector_graphic_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'vectorGraphicQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(VectorGraphicQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'vector_graphic_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'vectorGraphicQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(VectorGraphicQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'vector_graphic_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'vectorGraphicQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(VectorGraphicQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'vector_graphic_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'vectorGraphicQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(VectorGraphicQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'vector_graphic_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'vectorGraphicQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(VectorGraphicQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'vector_graphic_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'vectorGraphicQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(VectorGraphicQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'vector_graphic_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'vectorGraphicQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(VectorGraphicQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('vectorGraphic/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('vectorGraphic/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('vectorGraphic/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Video Files'); ?>
    <small>videoFiles</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('videoFile/create', 'VideoFile' => array('owner_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
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
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'videoFiles.itemLabel\')',
                'filter' => '', //CHtml::listData(VideoFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/account/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_about',
            array(
                'name' => 'thumbnail_media_id',
                'value' => 'CHtml::value($data, \'thumbnailMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'original_media_id',
                'value' => 'CHtml::value($data, \'originalMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'generate_processed_media',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            #'_subtitles',
            array(
                    'name' => 'subtitles_import_media_id',
                    'value' => 'CHtml::value($data, \'subtitlesImportMedia.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
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
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/account/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'video_file_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'video_file_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'videoFileQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(VideoFileQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
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

