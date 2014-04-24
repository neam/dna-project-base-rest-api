<div class="view well well-white">

    <div class="admin-container hide">
        <?php echo CHtml::link('<i class="glyphicon-eye-open"></i> ' . Yii::t('model', 'View {model}', array('{model}' => Yii::t('model', 'Comment'))), array('comment/view', 'id' => $data->id), array('class' => 'btn')); ?>
    </div>
    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('comment/view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('author_user_id')); ?>:</b>
    <?php echo CHtml::encode($data->author_user_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
    <?php echo CHtml::encode($data->parent_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('_comment')); ?>:</b>
    <?php echo CHtml::encode($data->_comment); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('context_model')); ?>:</b>
    <?php echo CHtml::encode($data->context_model); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('context_id')); ?>:</b>
    <?php echo CHtml::encode($data->context_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('context_attribute')); ?>:</b>
    <?php echo CHtml::encode($data->context_attribute); ?>
    <br/>

    <?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('context_translate_into')); ?>:</b>
    <?php echo CHtml::encode($data->context_translate_into); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
    <?php echo CHtml::encode($data->created); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
    <?php echo CHtml::encode($data->modified); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('Comment.*')): ?>
        <div class="admin-container hide">
            <?php echo CHtml::link('<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Comment'))), array('comment/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('Developer')): ?>
        <div class="admin-container hide">
            <h3>Developer access</h3>
            <?php echo CHtml::link('<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Comment'))), array('comment/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
