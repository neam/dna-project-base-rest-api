<?php
$this->setPageTitle(
    Yii::t('model', 'Exercise')
    . ' - '
    . Yii::t('model', 'Update')
    . ': '
    . $model->getItemLabel()
);
$this->breadcrumbs[Yii::t('model', 'Exercises')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('model', 'Update');
?>

<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Exercise'); ?>
    <small>
        <?php echo Yii::t('model', 'Update') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>



<h2>
    <?php echo Yii::t('model', 'Edges'); ?>
    <small>outEdges</small>
</h2>


<div class="btn-group">
    <?php $this->widget('\TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('edge/create', 'Edge' => array('from_node_id' => $model->node->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));

    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'outEdges');
$this->widget('TbGridView',
    array(
        'id' => 'edge-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->outEdges) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'name' => 'from_node_id',
                'value' => 'CHtml::value($data, \'fromNode.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'to_node_id',
                'value' => 'CHtml::value($data, \'toNode.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'weight',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'relation',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('edge/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('edge/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('edge/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Nodes'); ?>
    <small>outNodes</small>
</h2>

This relation is specified through another relation, which in turn is not a BELONGS_TO relation. Unfortunately this template does not support code generation for such a relation yet.
<h2>
    <?php echo Yii::t('model', 'Edges'); ?>
    <small>inEdges</small>
</h2>


<div class="btn-group">
    <?php $this->widget('\TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('edge/create', 'Edge' => array('to_node_id' => $model->node->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));

    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'inEdges');
$this->widget('TbGridView',
    array(
        'id' => 'edge-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->inEdges) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'name' => 'from_node_id',
                'value' => 'CHtml::value($data, \'fromNode.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'to_node_id',
                'value' => 'CHtml::value($data, \'toNode.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'weight',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'relation',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/edge/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('edge/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('edge/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('edge/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Nodes'); ?>
    <small>inNodes</small>
</h2>

This relation is specified through another relation, which in turn is not a BELONGS_TO relation. Unfortunately this template does not support code generation for such a relation yet.
<h2>
    <?php echo Yii::t('model', 'Exercises'); ?>
    <small>exercises</small>
</h2>


<div class="btn-group">
    <?php $this->widget('\TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('exercise/create', 'Exercise' => array('cloned_from_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
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
                    'url' => $this->createUrl('/exercise/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_title',
                'editable' => array(
                    'url' => $this->createUrl('/exercise/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/exercise/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => '_question',
                'editable' => array(
                    'url' => $this->createUrl('/exercise/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_description',
            array(
                'name' => 'thumbnail_media_id',
                'value' => 'CHtml::value($data, \'thumbnailMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'slideshow_file_id',
                'value' => 'CHtml::value($data, \'slideshowFile.itemLabel\')',
                'filter' => '', //CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
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
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'exercise_qa_state_id',
                    'value' => 'CHtml::value($data, \'exerciseQaState.itemLabel\')',
                    'filter' => '',//CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_zh',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_ar',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_bg',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_ca',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cs',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_da',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_en_gb',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_en_us',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_el',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fi',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fil',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fr',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hr',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hu',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_id',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_iw',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_it',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_ja',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_ko',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_lt',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_lv',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_nl',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_no',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pl',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt_br',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_ro',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_ru',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sk',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sl',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sr',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_th',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_tr',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_uk',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_vi',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_zh_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_zh_tw',
                    'editable' => array(
                        'url' => $this->createUrl('/exercise/editableSaver'),
                        //'placement' => 'right',
                    )
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
    <?php echo Yii::t('model', 'Section Contents'); ?>
    <small>sectionContents</small>
</h2>


<div class="btn-group">
    <?php $this->widget('\TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('sectionContent/create', 'SectionContent' => array('exercise_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
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
                    'url' => $this->createUrl('/sectionContent/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/sectionContent/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/sectionContent/editableSaver'),
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
                    'name' => 'slideshow_file_id',
                    'value' => 'CHtml::value($data, \'slideshowFile.itemLabel\')',
                    'filter' => '',//CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_chunk_id',
                    'value' => 'CHtml::value($data, \'dataArticle.itemLabel\')',
                    'filter' => '',//CHtml::listData(DataArticle::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'download_link_id',
                    'value' => 'CHtml::value($data, \'downloadLink.itemLabel\')',
                    'filter' => '',//CHtml::listData(DownloadLink::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
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


<h2>
    <?php echo Yii::t('model', 'Chapters'); ?>
    <small>parentChapters</small>
</h2>

This relation is specified through another relation, which in turn is not a BELONGS_TO relation. Unfortunately this template does not support code generation for such a relation yet.
<h2>
    <?php echo Yii::t('model', 'Nodes'); ?>
    <small>materials</small>
</h2>

This relation is specified through another relation, which in turn is not a BELONGS_TO relation. Unfortunately this template does not support code generation for such a relation yet.
<h2>
    <?php echo Yii::t('model', 'Nodes'); ?>
    <small>related</small>
</h2>

This relation is specified through another relation, which in turn is not a BELONGS_TO relation. Unfortunately this template does not support code generation for such a relation yet.