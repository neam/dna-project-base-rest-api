<div class="view well well-white">

    <div class="admin-container hide">
        <?php echo CHtml::link('<i class="glyphicon-eye-open"></i> ' . Yii::t('model', 'View {model}', array('{model}' => Yii::t('model', 'Tool Qa State'))), array('toolQaState/view', 'id' => $data->id), array('class' => 'btn')); ?>
    </div>
    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('toolQaState/view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
    <?php echo CHtml::encode($data->status); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('draft_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->draft_validation_progress); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('preview_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->preview_validation_progress); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('public_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->public_validation_progress); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('approval_progress')); ?>:</b>
    <?php echo CHtml::encode($data->approval_progress); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('proofing_progress')); ?>:</b>
    <?php echo CHtml::encode($data->proofing_progress); ?>
    <br/>

    <?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('translations_draft_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translations_draft_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translations_preview_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translations_preview_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translations_public_validation_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translations_public_validation_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translations_approval_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translations_approval_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('translations_proofing_progress')); ?>:</b>
    <?php echo CHtml::encode($data->translations_proofing_progress); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('previewing_welcome')); ?>:</b>
    <?php echo CHtml::encode($data->previewing_welcome); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('candidate_for_public_status')); ?>:</b>
    <?php echo CHtml::encode($data->candidate_for_public_status); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_approved')); ?>:</b>
    <?php echo CHtml::encode($data->title_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_approved')); ?>:</b>
    <?php echo CHtml::encode($data->slug_approved); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->title_proofed); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_proofed')); ?>:</b>
    <?php echo CHtml::encode($data->slug_proofed); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('ToolQaState.*')): ?>
        <div class="admin-container hide">
            <?php echo CHtml::link('<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Tool Qa State'))), array('toolQaState/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('Developer')): ?>
        <div class="admin-container hide">
            <h3>Developer access</h3>
            <?php echo CHtml::link('<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Tool Qa State'))), array('toolQaState/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
