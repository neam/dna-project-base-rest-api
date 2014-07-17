<?php
/* @var DownloadLinkController|ItemController $this */
/* @var DownloadLink|ItemTrait $model */
?>
<div class="<?php echo $this->getCssClasses($model); ?>">
    <h1>
        <?php echo $model->title; ?>
        <?php if ($this->actionIsEvaluate()): ?>
            <small><?php echo $this->getViewActionLabel(); ?></small>
        <?php endif; ?>
    </h1>

    <b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($model->id), array('downloadLink/view', 'id' => $model->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($model->getAttributeLabel('version')); ?>:</b>
    <?php echo CHtml::encode($model->version); ?>
    <br/>

    <b><?php echo CHtml::encode($model->getAttributeLabel('cloned_from_id')); ?>:</b>
    <?php echo CHtml::encode($model->cloned_from_id); ?>
    <br/>

    <b><?php echo CHtml::encode($model->getAttributeLabel('_title')); ?>:</b>
    <?php echo CHtml::encode($model->_title); ?>
    <br/>

    <b><?php echo CHtml::encode($model->getAttributeLabel('file_media_id')); ?>:</b>
    <?php echo CHtml::encode($model->file_media_id); ?>
    <br/>

    <b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
    <?php echo CHtml::encode($model->created); ?>
    <br/>

    <b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
    <?php echo CHtml::encode($model->modified); ?>
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

    <b><?php echo CHtml::encode($model->getAttributeLabel('_title')); ?>:</b>
    <?php echo CHtml::encode($model->_title); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('file_media_id')); ?>:</b>
    <?php echo CHtml::encode($model->file_media_id); ?>
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

    <b><?php echo CHtml::encode($model->getAttributeLabel('download_link_qa_state_id')); ?>:</b>
    <?php echo CHtml::encode($model->download_link_qa_state_id); ?>
    <br />
    */ ?>
</div>
