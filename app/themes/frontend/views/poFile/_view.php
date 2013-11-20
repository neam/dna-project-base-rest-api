<div class="view well well-white">

    <div class="admin-container show">
        <?php echo CHtml::link('<i class="icon-eye-open"></i> ' . Yii::t('model', 'View {model}', array('{model}' => Yii::t('model', 'Po File'))), array('poFile/view', 'id' => $data->id), array('class' => 'btn')); ?>
    </div>
    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('poFile/view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('version')); ?>:</b>
    <?php echo CHtml::encode($data->version); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('cloned_from_id')); ?>:</b>
    <?php echo CHtml::encode($data->cloned_from_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::encode($data->title); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('about')); ?>:</b>
    <?php echo CHtml::encode($data->about); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('original_media_id')); ?>:</b>
    <?php echo CHtml::encode($data->original_media_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('processed_media_id_en')); ?>:</b>
    <?php echo CHtml::encode($data->processed_media_id_en); ?>
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

    <b><?php echo CHtml::encode($data->getAttributeLabel('po_file_qa_state_id_en')); ?>:</b>
    <?php echo CHtml::encode($data->po_file_qa_state_id_en); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('po_file_qa_state_id_es')); ?>:</b>
    <?php echo CHtml::encode($data->po_file_qa_state_id_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('po_file_qa_state_id_fa')); ?>:</b>
    <?php echo CHtml::encode($data->po_file_qa_state_id_fa); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('po_file_qa_state_id_hi')); ?>:</b>
    <?php echo CHtml::encode($data->po_file_qa_state_id_hi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('po_file_qa_state_id_pt')); ?>:</b>
    <?php echo CHtml::encode($data->po_file_qa_state_id_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('po_file_qa_state_id_sv')); ?>:</b>
    <?php echo CHtml::encode($data->po_file_qa_state_id_sv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('po_file_qa_state_id_cn')); ?>:</b>
    <?php echo CHtml::encode($data->po_file_qa_state_id_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('po_file_qa_state_id_de')); ?>:</b>
    <?php echo CHtml::encode($data->po_file_qa_state_id_de); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('PoFile.*')): ?>
        <div class="admin-container show">
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Po File'))), array('poFile/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('Developer')): ?>
        <div class="admin-container show">
            <h3>Developer access</h3>
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Po File'))), array('poFile/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
