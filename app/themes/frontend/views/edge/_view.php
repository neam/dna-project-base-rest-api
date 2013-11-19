<div class="view well well-white">

    <div class="admin-container show">
        <?php echo CHtml::link('<i class="icon-eye"></i> ' . Yii::t('model', 'View {model}', array('{model}' => Yii::t('model', 'Edge'))), array('edge/view', 'id' => $data->id), array('class' => 'btn')); ?>
    </div>
    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('edge/view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('from_node_id')); ?>:</b>
    <?php echo CHtml::encode($data->from_node_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('to_node_id')); ?>:</b>
    <?php echo CHtml::encode($data->to_node_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
    <?php echo CHtml::encode($data->weight); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::encode($data->title); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
    <?php echo CHtml::encode($data->created); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
    <?php echo CHtml::encode($data->modified); ?>
    <br/>

    <?php if (Yii::app()->user->checkAccess('Edge.*')): ?>
        <div class="admin-container show">
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Edge'))), array('edge/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('Developer')): ?>
        <div class="admin-container show">
            <h3>Developer access</h3>
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Edge'))), array('edge/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
