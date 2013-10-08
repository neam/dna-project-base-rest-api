<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('presentation/view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('version')); ?>:</b>
    <?php echo CHtml::encode($data->version); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('cloned_from_id')); ?>:</b>
    <?php echo CHtml::encode($data->cloned_from_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_en')); ?>:</b>
    <?php echo CHtml::encode($data->title_en); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug')); ?>:</b>
    <?php echo CHtml::encode($data->slug); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('about')); ?>:</b>
    <?php echo CHtml::encode($data->about); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('slideshow_file_id')); ?>:</b>
    <?php echo CHtml::encode($data->slideshow_file_id); ?>
    <br/>

    <?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('authoring_workflow_execution_id')); ?>:</b>
    <?php echo CHtml::encode($data->authoring_workflow_execution_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
    <?php echo CHtml::encode($data->created); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
    <?php echo CHtml::encode($data->modified); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_es')); ?>:</b>
    <?php echo CHtml::encode($data->title_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_fa')); ?>:</b>
    <?php echo CHtml::encode($data->title_fa); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_hi')); ?>:</b>
    <?php echo CHtml::encode($data->title_hi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_pt')); ?>:</b>
    <?php echo CHtml::encode($data->title_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_sv')); ?>:</b>
    <?php echo CHtml::encode($data->title_sv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_cn')); ?>:</b>
    <?php echo CHtml::encode($data->title_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_de')); ?>:</b>
    <?php echo CHtml::encode($data->title_de); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('Presentation.*')): ?>
        <div class="admin-container show">
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Presentation'))), array('presentation/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
