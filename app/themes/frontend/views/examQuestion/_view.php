<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('examQuestion/view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('version')); ?>:</b>
    <?php echo CHtml::encode($data->version); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('cloned_from_id')); ?>:</b>
    <?php echo CHtml::encode($data->cloned_from_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_en')); ?>:</b>
    <?php echo CHtml::encode($data->slug_en); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('question_en')); ?>:</b>
    <?php echo CHtml::encode($data->question_en); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('source_node_id')); ?>:</b>
    <?php echo CHtml::encode($data->source_node_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('authoring_workflow_execution_id_en')); ?>:</b>
    <?php echo CHtml::encode($data->authoring_workflow_execution_id_en); ?>
    <br/>

    <?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
    <?php echo CHtml::encode($data->created); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
    <?php echo CHtml::encode($data->modified); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('node_id')); ?>:</b>
    <?php echo CHtml::encode($data->node_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_es')); ?>:</b>
    <?php echo CHtml::encode($data->slug_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_fa')); ?>:</b>
    <?php echo CHtml::encode($data->slug_fa); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_hi')); ?>:</b>
    <?php echo CHtml::encode($data->slug_hi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_pt')); ?>:</b>
    <?php echo CHtml::encode($data->slug_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_sv')); ?>:</b>
    <?php echo CHtml::encode($data->slug_sv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_cn')); ?>:</b>
    <?php echo CHtml::encode($data->slug_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_de')); ?>:</b>
    <?php echo CHtml::encode($data->slug_de); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('question_es')); ?>:</b>
    <?php echo CHtml::encode($data->question_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('question_fa')); ?>:</b>
    <?php echo CHtml::encode($data->question_fa); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('question_hi')); ?>:</b>
    <?php echo CHtml::encode($data->question_hi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('question_pt')); ?>:</b>
    <?php echo CHtml::encode($data->question_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('question_sv')); ?>:</b>
    <?php echo CHtml::encode($data->question_sv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('question_cn')); ?>:</b>
    <?php echo CHtml::encode($data->question_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('question_de')); ?>:</b>
    <?php echo CHtml::encode($data->question_de); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('authoring_workflow_execution_id_es')); ?>:</b>
    <?php echo CHtml::encode($data->authoring_workflow_execution_id_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('authoring_workflow_execution_id_fa')); ?>:</b>
    <?php echo CHtml::encode($data->authoring_workflow_execution_id_fa); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('authoring_workflow_execution_id_hi')); ?>:</b>
    <?php echo CHtml::encode($data->authoring_workflow_execution_id_hi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('authoring_workflow_execution_id_pt')); ?>:</b>
    <?php echo CHtml::encode($data->authoring_workflow_execution_id_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('authoring_workflow_execution_id_sv')); ?>:</b>
    <?php echo CHtml::encode($data->authoring_workflow_execution_id_sv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('authoring_workflow_execution_id_cn')); ?>:</b>
    <?php echo CHtml::encode($data->authoring_workflow_execution_id_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('authoring_workflow_execution_id_de')); ?>:</b>
    <?php echo CHtml::encode($data->authoring_workflow_execution_id_de); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('ExamQuestion.*')): ?>
        <div class="admin-container show">
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Exam Question'))), array('examQuestion/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
