<div class="view well well-white">

    <div class="admin-container hide">
        <?php echo CHtml::link('<i class="glyphicon-eye-open"></i> ' . Yii::t('model', 'View {model}', array('{model}' => Yii::t('model', 'Profile'))), array('profile/view', 'id' => $data->id), array('class' => 'btn')); ?>
    </div>
    <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->user_id), array('profile/view', 'user_id' => $data->user_id)); ?>
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

    <b><?php echo CHtml::encode($data->getAttributeLabel('language1')); ?>:</b>
    <?php echo CHtml::encode($data->language1); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('language2')); ?>:</b>
    <?php echo CHtml::encode($data->language2); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('language3')); ?>:</b>
    <?php echo CHtml::encode($data->language3); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('language4')); ?>:</b>
    <?php echo CHtml::encode($data->language4); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('language5')); ?>:</b>
    <?php echo CHtml::encode($data->language5); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('Profile.*')): ?>
        <div class="admin-container hide">
            <?php echo CHtml::link('<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Profile'))), array('profile/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('Developer')): ?>
        <div class="admin-container hide">
            <h3>Developer access</h3>
            <?php echo CHtml::link('<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Profile'))), array('profile/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
