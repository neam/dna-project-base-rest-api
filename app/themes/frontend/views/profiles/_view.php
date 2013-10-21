<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->user_id), array('profiles/view', 'user_id' => $data->user_id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
    <?php echo CHtml::encode($data->first_name); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
    <?php echo CHtml::encode($data->last_name); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('public_profile')); ?>:</b>
    <?php echo CHtml::encode($data->public_profile); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('picture_media_id')); ?>:</b>
    <?php echo CHtml::encode($data->picture_media_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
    <?php echo CHtml::encode($data->website); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('others_may_contact_me')); ?>:</b>
    <?php echo CHtml::encode($data->others_may_contact_me); ?>
    <br/>

    <?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('about')); ?>:</b>
    <?php echo CHtml::encode($data->about); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('lives_in')); ?>:</b>
    <?php echo CHtml::encode($data->lives_in); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_en')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_en); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_es')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_fa')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_fa); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_hi')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_hi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_pt')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_sv')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_sv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_cn')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('can_translate_to_de')); ?>:</b>
    <?php echo CHtml::encode($data->can_translate_to_de); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('Profiles.*')): ?>
        <div class="admin-container show">
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Profiles'))), array('profiles/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
