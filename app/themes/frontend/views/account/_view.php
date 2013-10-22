<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('account/view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
    <?php echo CHtml::encode($data->username); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
    <?php echo CHtml::encode($data->password); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
    <?php echo CHtml::encode($data->email); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('activkey')); ?>:</b>
    <?php echo CHtml::encode($data->activkey); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('superuser')); ?>:</b>
    <?php echo CHtml::encode($data->superuser); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
    <?php echo CHtml::encode($data->status); ?>
    <br/>

    <?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('create_at')); ?>:</b>
    <?php echo CHtml::encode($data->create_at); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('lastvisit_at')); ?>:</b>
    <?php echo CHtml::encode($data->lastvisit_at); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('Account.*')): ?>
        <div class="admin-container show">
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Account'))), array('account/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
