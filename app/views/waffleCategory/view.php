<?php
/* @var WaffleCategory|ItemTrait $model */
/* @var WaffleCategoryController|WorkflowUiControllerTrait $this */
?>
<div class="<?php echo $this->getCssClasses($model); ?>">
    <h1>
        <?php echo $model->id; ?>
        <?php if ($this->actionIsEvaluate()): ?>
            <small><?php echo $this->getViewActionLabel(); ?></small>
        <?php endif; ?>
    </h1>

    <b><?php echo CHtml::encode($model->getAttributeLabel('version')); ?>:</b>
    <?php echo CHtml::encode($model->version); ?>
    <br/>

    <b><?php echo CHtml::encode($model->getAttributeLabel('cloned_from_id')); ?>:</b>
    <?php echo CHtml::encode($model->cloned_from_id); ?>
    <br/>

    <b><?php echo CHtml::encode($model->getAttributeLabel('ref')); ?>:</b>
    <?php echo CHtml::encode($model->ref); ?>
    <br/>

    <b><?php echo CHtml::encode($model->getAttributeLabel('_list_name')); ?>:</b>
    <?php echo CHtml::encode($model->_list_name); ?>
    <br/>

    <b><?php echo CHtml::encode($model->getAttributeLabel('_property_name')); ?>:</b>
    <?php echo CHtml::encode($model->_property_name); ?>
    <br/>

    <b><?php echo CHtml::encode($model->getAttributeLabel('_possessive')); ?>:</b>
    <?php echo CHtml::encode($model->_possessive); ?>
    <br/>

    <?php /*
    <b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
        <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('version')); ?>:</b>
    <?php echo CHtml::encode($model->version); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('cloned_from_id')); ?>:</b>
    <?php echo CHtml::encode($model->cloned_from_id); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('ref')); ?>:</b>
    <?php echo CHtml::encode($model->ref); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('_list_name')); ?>:</b>
    <?php echo CHtml::encode($model->_list_name); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('_property_name')); ?>:</b>
    <?php echo CHtml::encode($model->_property_name); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('_possessive')); ?>:</b>
    <?php echo CHtml::encode($model->_possessive); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('_choice_format')); ?>:</b>
    <?php echo CHtml::encode($model->_choice_format); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('_description')); ?>:</b>
    <?php echo CHtml::encode($model->_description); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('waffle_id')); ?>:</b>
    <?php echo CHtml::encode($model->waffle_id); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
    <?php echo CHtml::encode($model->created); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
    <?php echo CHtml::encode($model->modified); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('owner_id')); ?>:</b>
    <?php echo CHtml::encode($model->owner_id); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('node_id')); ?>:</b>
    <?php echo CHtml::encode($model->node_id); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('waffle_category_qa_state_id')); ?>:</b>
    <?php echo CHtml::encode($model->waffle_category_qa_state_id); ?>
    <br />
    */ ?>
</div>
