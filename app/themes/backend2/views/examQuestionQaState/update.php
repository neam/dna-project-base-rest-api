<?php
$this->setPageTitle(
    Yii::t('model', 'Exam Question Qa State')
    . ' - '
    . Yii::t('model', 'Update')
    . ': '
    . $model->getItemLabel()
);
$this->breadcrumbs[Yii::t('model', 'Exam Question Qa States')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('model', 'Update');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Exam Question Qa State'); ?>
    <small>
        <?php echo Yii::t('model', 'Update') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>



<h2>
    <?php echo Yii::t('model', 'Exam Questions'); ?>
    <small>examQuestions</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('examQuestion/create', 'ExamQuestion' => array('exam_question_qa_state_id_en' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
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
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
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
    <?php echo Yii::t('model', 'Exam Questions'); ?>
    <small>examQuestions1</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('examQuestion/create', 'ExamQuestion' => array('exam_question_qa_state_id_cn' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'examQuestions1');
$this->widget('TbGridView',
    array(
        'id' => 'examQuestion-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->examQuestions1) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
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
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
    <?php echo Yii::t('model', 'Exam Questions'); ?>
    <small>examQuestions2</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('examQuestion/create', 'ExamQuestion' => array('exam_question_qa_state_id_de' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'examQuestions2');
$this->widget('TbGridView',
    array(
        'id' => 'examQuestion-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->examQuestions2) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
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
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
    <?php echo Yii::t('model', 'Exam Questions'); ?>
    <small>examQuestions3</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('examQuestion/create', 'ExamQuestion' => array('exam_question_qa_state_id_es' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'examQuestions3');
$this->widget('TbGridView',
    array(
        'id' => 'examQuestion-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->examQuestions3) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
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
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'exam_question_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'examQuestionQaStateIdEn.itemLabel\')',
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
    <?php echo Yii::t('model', 'Exam Questions'); ?>
    <small>examQuestions4</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('examQuestion/create', 'ExamQuestion' => array('exam_question_qa_state_id_fa' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'examQuestions4');
$this->widget('TbGridView',
    array(
        'id' => 'examQuestion-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->examQuestions4) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
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
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
    <?php echo Yii::t('model', 'Exam Questions'); ?>
    <small>examQuestions5</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('examQuestion/create', 'ExamQuestion' => array('exam_question_qa_state_id_hi' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'examQuestions5');
$this->widget('TbGridView',
    array(
        'id' => 'examQuestion-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->examQuestions5) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
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
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
    <?php echo Yii::t('model', 'Exam Questions'); ?>
    <small>examQuestions6</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('examQuestion/create', 'ExamQuestion' => array('exam_question_qa_state_id_pt' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'examQuestions6');
$this->widget('TbGridView',
    array(
        'id' => 'examQuestion-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->examQuestions6) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
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
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
    <?php echo Yii::t('model', 'Exam Questions'); ?>
    <small>examQuestions7</small>
</h2>


<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('examQuestion/create', 'ExamQuestion' => array('exam_question_qa_state_id_sv' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'examQuestions7');
$this->widget('TbGridView',
    array(
        'id' => 'examQuestion-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->examQuestions7) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
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
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/examQuestionQaState/editableSaver'),
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

