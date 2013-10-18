<?php
$this->setPageTitle(
    Yii::t('model', 'Exercise Qa State')
    . ' - '
    . Yii::t('model', 'Update')
    . ': '
    . $model->getItemLabel()
);
$this->breadcrumbs[Yii::t('model', 'Exercise Qa States')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('model', 'Update');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Exercise Qa State'); ?>
    <small>
        <?php echo Yii::t('model', 'Update') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>



<h2>
    <?php echo Yii::t('model', 'Exercises'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('exercise/create', 'Exercise' => array('exercise_qa_state_id_de' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
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
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'exercises.itemLabel\')',
                'filter' => CHtml::listData(Exercise::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'question_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'description_en',
            array(
                'name' => 'thumbnail_media_id',
                'value' => 'CHtml::value($data, \'thumbnailMedia.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'name' => 'slideshow_file_id',
                    'value' => 'CHtml::value($data, \'slideshowFile.itemLabel\')',
                    'filter' => CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
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
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_es',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            #'description_es',
            #'description_fa',
            #'description_hi',
            #'description_pt',
            #'description_sv',
            #'description_cn',
            #'description_de',
            array(
                    'name' => 'exercise_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdEn.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdEs.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdFa.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdHi.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdPt.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdSv.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdCn.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
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
    <?php echo Yii::t('model', 'Exercises'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('exercise/create', 'Exercise' => array('exercise_qa_state_id_en' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'exercises1');
$this->widget('TbGridView',
    array(
        'id' => 'exercise-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->exercises1) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'exercises.itemLabel\')',
                'filter' => CHtml::listData(Exercise::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'question_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'description_en',
            array(
                'name' => 'thumbnail_media_id',
                'value' => 'CHtml::value($data, \'thumbnailMedia.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'name' => 'slideshow_file_id',
                    'value' => 'CHtml::value($data, \'slideshowFile.itemLabel\')',
                    'filter' => CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
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
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_es',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            #'description_es',
            #'description_fa',
            #'description_hi',
            #'description_pt',
            #'description_sv',
            #'description_cn',
            #'description_de',
            array(
                    'name' => 'exercise_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdEs.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdFa.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdHi.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdPt.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdSv.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdCn.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdDe.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
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
    <?php echo Yii::t('model', 'Exercises'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('exercise/create', 'Exercise' => array('exercise_qa_state_id_cn' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'exercises2');
$this->widget('TbGridView',
    array(
        'id' => 'exercise-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->exercises2) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'exercises.itemLabel\')',
                'filter' => CHtml::listData(Exercise::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'question_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'description_en',
            array(
                'name' => 'thumbnail_media_id',
                'value' => 'CHtml::value($data, \'thumbnailMedia.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'name' => 'slideshow_file_id',
                    'value' => 'CHtml::value($data, \'slideshowFile.itemLabel\')',
                    'filter' => CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
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
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_es',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            #'description_es',
            #'description_fa',
            #'description_hi',
            #'description_pt',
            #'description_sv',
            #'description_cn',
            #'description_de',
            array(
                    'name' => 'exercise_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdEn.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdEs.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdFa.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdHi.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdPt.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdSv.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdDe.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
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
    <?php echo Yii::t('model', 'Exercises'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('exercise/create', 'Exercise' => array('exercise_qa_state_id_es' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'exercises3');
$this->widget('TbGridView',
    array(
        'id' => 'exercise-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->exercises3) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'exercises.itemLabel\')',
                'filter' => CHtml::listData(Exercise::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'question_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'description_en',
            array(
                'name' => 'thumbnail_media_id',
                'value' => 'CHtml::value($data, \'thumbnailMedia.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'name' => 'slideshow_file_id',
                    'value' => 'CHtml::value($data, \'slideshowFile.itemLabel\')',
                    'filter' => CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
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
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_es',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            #'description_es',
            #'description_fa',
            #'description_hi',
            #'description_pt',
            #'description_sv',
            #'description_cn',
            #'description_de',
            array(
                    'name' => 'exercise_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdEn.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdFa.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdHi.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdPt.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdSv.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdCn.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdDe.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
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
    <?php echo Yii::t('model', 'Exercises'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('exercise/create', 'Exercise' => array('exercise_qa_state_id_fa' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'exercises4');
$this->widget('TbGridView',
    array(
        'id' => 'exercise-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->exercises4) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'exercises.itemLabel\')',
                'filter' => CHtml::listData(Exercise::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'question_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'description_en',
            array(
                'name' => 'thumbnail_media_id',
                'value' => 'CHtml::value($data, \'thumbnailMedia.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'name' => 'slideshow_file_id',
                    'value' => 'CHtml::value($data, \'slideshowFile.itemLabel\')',
                    'filter' => CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
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
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_es',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            #'description_es',
            #'description_fa',
            #'description_hi',
            #'description_pt',
            #'description_sv',
            #'description_cn',
            #'description_de',
            array(
                    'name' => 'exercise_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdEn.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdEs.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdHi.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdPt.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdSv.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdCn.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdDe.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
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
    <?php echo Yii::t('model', 'Exercises'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('exercise/create', 'Exercise' => array('exercise_qa_state_id_hi' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'exercises5');
$this->widget('TbGridView',
    array(
        'id' => 'exercise-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->exercises5) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'exercises.itemLabel\')',
                'filter' => CHtml::listData(Exercise::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'question_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'description_en',
            array(
                'name' => 'thumbnail_media_id',
                'value' => 'CHtml::value($data, \'thumbnailMedia.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'name' => 'slideshow_file_id',
                    'value' => 'CHtml::value($data, \'slideshowFile.itemLabel\')',
                    'filter' => CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
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
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_es',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            #'description_es',
            #'description_fa',
            #'description_hi',
            #'description_pt',
            #'description_sv',
            #'description_cn',
            #'description_de',
            array(
                    'name' => 'exercise_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdEn.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdEs.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdFa.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdPt.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdSv.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdCn.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdDe.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
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
    <?php echo Yii::t('model', 'Exercises'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('exercise/create', 'Exercise' => array('exercise_qa_state_id_pt' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'exercises6');
$this->widget('TbGridView',
    array(
        'id' => 'exercise-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->exercises6) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'exercises.itemLabel\')',
                'filter' => CHtml::listData(Exercise::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'question_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'description_en',
            array(
                'name' => 'thumbnail_media_id',
                'value' => 'CHtml::value($data, \'thumbnailMedia.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'name' => 'slideshow_file_id',
                    'value' => 'CHtml::value($data, \'slideshowFile.itemLabel\')',
                    'filter' => CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
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
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_es',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            #'description_es',
            #'description_fa',
            #'description_hi',
            #'description_pt',
            #'description_sv',
            #'description_cn',
            #'description_de',
            array(
                    'name' => 'exercise_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdEn.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdEs.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdFa.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdHi.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdSv.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdCn.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdDe.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
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
    <?php echo Yii::t('model', 'Exercises'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('exercise/create', 'Exercise' => array('exercise_qa_state_id_sv' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'exercises7');
$this->widget('TbGridView',
    array(
        'id' => 'exercise-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->exercises7) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'exercises.itemLabel\')',
                'filter' => CHtml::listData(Exercise::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'question_en',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'description_en',
            array(
                'name' => 'thumbnail_media_id',
                'value' => 'CHtml::value($data, \'thumbnailMedia.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'name' => 'slideshow_file_id',
                    'value' => 'CHtml::value($data, \'slideshowFile.itemLabel\')',
                    'filter' => CHtml::listData(SlideshowFile::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
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
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_es',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'question_de',
                    'editable' => array(
                        'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            #'description_es',
            #'description_fa',
            #'description_hi',
            #'description_pt',
            #'description_sv',
            #'description_cn',
            #'description_de',
            array(
                    'name' => 'exercise_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdEn.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdEs.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdFa.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdHi.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdPt.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdCn.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exercise_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'exerciseQaStateIdDe.itemLabel\')',
                    'filter' => CHtml::listData(ExerciseQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
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

