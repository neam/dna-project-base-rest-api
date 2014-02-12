<?php
$this->setPageTitle(
    Yii::t('model', 'Exam Question Alternatives')
    . ' - '
    . Yii::t('crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('model', 'Exam Question Alternatives');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'exam-question-alternative-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('model', 'Exam Question Alternatives'); ?>
        <small><?php echo Yii::t('crud', 'Manage'); ?></small>

    </h1>


<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php Yii::beginProfile('ExamQuestionAlternative.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'exam-question-alternative-grid',
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
                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'_markup',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'correct',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
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
                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/examQuestionAlternative/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'owner_id',
                'value' => 'CHtml::value($data, \'owner.itemLabel\')',
                'filter' => '', //CHtml::listData(Users::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'node_id',
                'value' => 'CHtml::value($data, \'node.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("ExamQuestionAlternative.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("ExamQuestionAlternative.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("ExamQuestionAlternative.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id" => $data->id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id" => $data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->id))',
            ),
        )
    )
);
?>
<?php Yii::endProfile('ExamQuestionAlternative.view.grid'); ?>