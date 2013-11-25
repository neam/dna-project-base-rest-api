<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('workflow_id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->workflow_id), array('ezcWorkflow/view', 'workflow_id' => $data->workflow_id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('workflow_name')); ?>:</b>
    <?php echo CHtml::encode($data->workflow_name); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('workflow_version')); ?>:</b>
    <?php echo CHtml::encode($data->workflow_version); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('workflow_created')); ?>:</b>
    <?php echo CHtml::encode($data->workflow_created); ?>
    <br/>

    <?php if (Yii::app()->user->checkAccess('EzcWorkflow.*')): ?>
        <div class="admin-container hide">
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Ezc Workflow'))), array('ezcWorkflow/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
