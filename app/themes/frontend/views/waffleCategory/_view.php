<div class="view well well-white">

    <div class="admin-container hide">
        <?php echo CHtml::link('<i class="glyphicon-eye-open"></i> ' . Yii::t('model', 'View {model}', array('{model}' => Yii::t('model', 'Waffle Category'))), array('waffleCategory/view', 'id' => $data->id), array('class' => 'btn')); ?>
    </div>
    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('waffleCategory/view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('version')); ?>:</b>
    <?php echo CHtml::encode($data->version); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('cloned_from_id')); ?>:</b>
    <?php echo CHtml::encode($data->cloned_from_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('ref')); ?>:</b>
    <?php echo CHtml::encode($data->ref); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('_list_name')); ?>:</b>
    <?php echo CHtml::encode($data->_list_name); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('_property_name')); ?>:</b>
    <?php echo CHtml::encode($data->_property_name); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('_possessive')); ?>:</b>
    <?php echo CHtml::encode($data->_possessive); ?>
    <br/>

    <?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('_choice_format')); ?>:</b>
    <?php echo CHtml::encode($data->_choice_format); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('_description')); ?>:</b>
    <?php echo CHtml::encode($data->_description); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('waffle_id')); ?>:</b>
    <?php echo CHtml::encode($data->waffle_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
    <?php echo CHtml::encode($data->created); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
    <?php echo CHtml::encode($data->modified); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('owner_id')); ?>:</b>
    <?php echo CHtml::encode($data->owner_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('node_id')); ?>:</b>
    <?php echo CHtml::encode($data->node_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('waffle_category_qa_state_id')); ?>:</b>
    <?php echo CHtml::encode($data->waffle_category_qa_state_id); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('WaffleCategory.*')): ?>
        <div class="admin-container hide">
            <?php echo CHtml::link('<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Waffle Category'))), array('waffleCategory/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('Developer')): ?>
        <div class="admin-container hide">
            <h3>Developer access</h3>
            <?php echo CHtml::link('<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Waffle Category'))), array('waffleCategory/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
