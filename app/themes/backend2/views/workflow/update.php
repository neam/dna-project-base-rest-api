<?php
$this->setPageTitle(
    Yii::t('model', 'Workflow')
    . ' - '
    . Yii::t('model', 'Update')
    . ': '
    . $model->getItemLabel()
);
$this->breadcrumbs[Yii::t('model', 'Workflows')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('model', 'Update');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Workflow'); ?>
    <small>
        <?php echo Yii::t('model', 'Update') ?> #<?php echo $model->workflow_id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>



<h2>
    <?php echo Yii::t('model', 'Executions'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('execution/create', 'Execution' => array('workflow_id' => $model->execution_id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'executions');
$this->widget('TbGridView',
    array(
        'id' => 'execution-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->executions) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/workflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'execution_started',
                'editable' => array(
                    'url' => $this->createUrl('/workflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'execution_suspended',
                'editable' => array(
                    'url' => $this->createUrl('/workflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'execution_variables',
                'editable' => array(
                    'url' => $this->createUrl('/workflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'execution_waiting_for',
                'editable' => array(
                    'url' => $this->createUrl('/workflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'execution_threads',
                'editable' => array(
                    'url' => $this->createUrl('/workflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'execution_next_thread_id',
                'editable' => array(
                    'url' => $this->createUrl('/workflow/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('execution/view', array('execution_id' => \$data->execution_id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('execution/update', array('execution_id' => \$data->execution_id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('execution/delete', array('execution_id' => \$data->execution_id))",
            ),
        ),
    ));
?>

