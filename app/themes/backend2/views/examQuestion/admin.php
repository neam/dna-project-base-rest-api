<?php
$this->setPageTitle(
    Yii::t('model', 'Exam Questions')
    . ' - '
    . Yii::t('crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('model', 'Exam Questions');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'exam-question-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('model', 'Exam Questions'); ?>
        <small><?php echo Yii::t('crud', 'Manage'); ?></small>

    </h1>


<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php Yii::beginProfile('ExamQuestion.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'exam-question-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        #'responsiveTable' => true,
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
                    'url' => $this->createUrl('/examQuestion/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestion/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestion/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'owner_id',
                'value' => 'CHtml::value($data, \'owner.itemLabel\')',
                'filter' => '', //CHtml::listData(Users::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
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
                    'url' => $this->createUrl('/examQuestion/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_fa',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestion/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_hi',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestion/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_pt',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestion/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_sv',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestion/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_cn',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestion/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_de',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestion/editableSaver'),
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
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("ExamQuestion.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("ExamQuestion.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("ExamQuestion.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id" => $data->id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id" => $data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->id))',
            ),
        )
    )
);
?>
<?php Yii::endProfile('ExamQuestion.view.grid'); ?>