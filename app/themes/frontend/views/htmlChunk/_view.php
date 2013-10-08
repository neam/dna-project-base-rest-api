<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('htmlChunk/view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('version')); ?>:</b>
    <?php echo CHtml::encode($data->version); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('cloned_from_id')); ?>:</b>
    <?php echo CHtml::encode($data->cloned_from_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('markup_en')); ?>:</b>
    <?php echo CHtml::encode($data->markup_en); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('authoring_workflow_execution_id')); ?>:</b>
    <?php echo CHtml::encode($data->authoring_workflow_execution_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
    <?php echo CHtml::encode($data->created); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
    <?php echo CHtml::encode($data->modified); ?>
    <br/>

    <?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('markup_es')); ?>:</b>
    <?php echo CHtml::encode($data->markup_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('markup_fa')); ?>:</b>
    <?php echo CHtml::encode($data->markup_fa); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('markup_hi')); ?>:</b>
    <?php echo CHtml::encode($data->markup_hi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('markup_pt')); ?>:</b>
    <?php echo CHtml::encode($data->markup_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('markup_sv')); ?>:</b>
    <?php echo CHtml::encode($data->markup_sv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('markup_cn')); ?>:</b>
    <?php echo CHtml::encode($data->markup_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('markup_de')); ?>:</b>
    <?php echo CHtml::encode($data->markup_de); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('HtmlChunk.*')): ?>
        <div class="admin-container show">
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Html Chunk'))), array('htmlChunk/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
