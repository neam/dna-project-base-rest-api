<?php
$this->setPageTitle(
    Yii::t('model', 'Ezc Workflows')
    . ' - '
    . Yii::t('crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('model', 'Ezc Workflows');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'ezc-workflow-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('model', 'Ezc Workflows'); ?>
        <small><?php echo Yii::t('crud', 'Manage'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>



<?php
$this->widget('TbGridView',
    array(
        'id' => 'ezc-workflow-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'responsiveTable' => true,
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
                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("workflow_id" => $data["workflow_id"]))'
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'workflow_id',
                'editable' => array(
                    'url' => $this->createUrl('/ezcWorkflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'workflow_name',
                'editable' => array(
                    'url' => $this->createUrl('/ezcWorkflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'workflow_version',
                'editable' => array(
                    'url' => $this->createUrl('/ezcWorkflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'workflow_created',
                'editable' => array(
                    'url' => $this->createUrl('/ezcWorkflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("B61b08a5.EzcWorkflow.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("B61b08a5.EzcWorkflow.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("B61b08a5.EzcWorkflow.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("workflow_id" => $data->workflow_id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("workflow_id" => $data->workflow_id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("workflow_id" => $data->workflow_id))',
            ),
        )
    )
);
?>