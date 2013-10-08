<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('slideshowFile/view', 'id' => $data->id)); ?>
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

    <b><?php echo CHtml::encode($data->getAttributeLabel('original_media_id')); ?>:</b>
    <?php echo CHtml::encode($data->original_media_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('generate_processed_media')); ?>:</b>
    <?php echo CHtml::encode($data->generate_processed_media); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('processed_media_id_en')); ?>:</b>
    <?php echo CHtml::encode($data->processed_media_id_en); ?>
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

    <b><?php echo CHtml::encode($data->getAttributeLabel('processed_media_id_es')); ?>:</b>
    <?php echo CHtml::encode($data->processed_media_id_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('processed_media_id_fa')); ?>:</b>
    <?php echo CHtml::encode($data->processed_media_id_fa); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('processed_media_id_hi')); ?>:</b>
    <?php echo CHtml::encode($data->processed_media_id_hi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('processed_media_id_pt')); ?>:</b>
    <?php echo CHtml::encode($data->processed_media_id_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('processed_media_id_sv')); ?>:</b>
    <?php echo CHtml::encode($data->processed_media_id_sv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('processed_media_id_cn')); ?>:</b>
    <?php echo CHtml::encode($data->processed_media_id_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('processed_media_id_de')); ?>:</b>
    <?php echo CHtml::encode($data->processed_media_id_de); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('SlideshowFile.*')): ?>
        <div class="admin-container show">
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Slideshow File'))), array('slideshowFile/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
