<?php
$this->setPageTitle(
    Yii::t('model', 'Ezc Workflow')
    . ' - '
    . Yii::t('model', 'Update')
    . ': '
    . $model->getItemLabel()
);
$this->breadcrumbs[Yii::t('model', 'Ezc Workflows')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('model', 'Update');
?>


<h1>

    <?php echo Yii::t('model', 'Ezc Workflow'); ?>
    <small>
        <?php echo Yii::t('model', 'Update') ?> #<?php echo $model->workflow_id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>



<h2>
    <?php echo Yii::t('model', 'Ezc Executions'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('\TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('ezcExecution/create', 'EzcExecution' => array('workflow_id' => $model->execution_id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'ezcExecutions');
$this->widget('TbGridView',
    array(
        'id' => 'ezcExecution-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->ezcExecutions) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'execution_id',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'execution_parent',
                'editable' => array(
                    'url' => $this->createUrl('/ezcWorkflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'execution_started',
                'editable' => array(
                    'url' => $this->createUrl('/ezcWorkflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'execution_suspended',
                'editable' => array(
                    'url' => $this->createUrl('/ezcWorkflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'execution_variables',
                'editable' => array(
                    'url' => $this->createUrl('/ezcWorkflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'execution_waiting_for',
                'editable' => array(
                    'url' => $this->createUrl('/ezcWorkflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'execution_threads',
                'editable' => array(
                    'url' => $this->createUrl('/ezcWorkflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'execution_next_thread_id',
                'editable' => array(
                    'url' => $this->createUrl('/ezcWorkflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('ezcExecution/view', array('execution_id' => \$data->execution_id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('ezcExecution/update', array('execution_id' => \$data->execution_id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('ezcExecution/delete', array('execution_id' => \$data->execution_id))",
            ),
        ),
    ));
?>

