<?php
$this->setPageTitle(
    Yii::t('crud', 'Workflows')
    . ' - '
    . Yii::t('crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('crud', 'Workflows');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'workflow-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('crud', 'Workflows'); ?>
        <small><?php echo Yii::t('crud', 'Manage'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>



<?php
$this->widget('TbGridView',
    array(
        'id' => 'workflow-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'template' => '{pager}{summary}{items}{pager}',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            array(
                'class' => 'CLinkColumn',
                'header' => '',
                'labelExpression' => '$data->itemLabel',
                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("workflow_id" => $data["workflow_id"]))'
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'workflow_id',
                'editable' => array(
                    'url' => $this->createUrl('/workflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'workflow_name',
                'editable' => array(
                    'url' => $this->createUrl('/workflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'workflow_version',
                'editable' => array(
                    'url' => $this->createUrl('/workflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'workflow_created',
                'editable' => array(
                    'url' => $this->createUrl('/workflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("B61b08a5.Workflow.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("B61b08a5.Workflow.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("B61b08a5.Workflow.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("workflow_id" => $data->workflow_id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("workflow_id" => $data->workflow_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("workflow_id" => $data->workflow_id))',
            ),
        )
    )
);
?>