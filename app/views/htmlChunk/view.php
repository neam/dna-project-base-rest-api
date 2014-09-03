<?php
/* @var HtmlChunkController|WorkflowUiControllerTrait $this */
/* @var HtmlChunk|ItemTrait $model */
?>
<div class="<?php echo $this->getCssClasses($model); ?>">
    <h1>
        <?php echo $model->getItemLabel(); ?>
        <?php if ($this->actionIsEvaluate()): ?>
            <small><?php echo $this->getViewActionLabel(); ?></small>
        <?php endif; ?>
    </h1>
    <div class="admin-container hide">
        <div class="btn-toolbar">
            <div class="btn-group">
                <?php $this->widget(
                    '\TbButton',
                    array(
                        'label' => Yii::t('model', 'Manage'),
                        'icon' => TbHtml::ICON_EDIT,
                        'url' => array('admin'),
                    )
                ); ?>
                <?php $this->widget(
                    '\TbButton',
                    array(
                        'label' => Yii::t('model', 'Edit'),
                        'icon' => TbHtml::ICON_EDIT,
                        'url' => array(
                            'continueAuthoring',
                            'id' => $model->{$model->tableSchema->primaryKey},
                        ),
                    )
                ); ?>
                <?php $this->widget(
                    '\TbButton',
                    array(
                        'label' => Yii::t('model', 'Update'),
                        'icon' => TbHtml::ICON_EDIT,
                        'url' => array(
                            'update',
                            'id' => $model->{$model->tableSchema->primaryKey},
                        ),
                    )
                ); ?>
                <?php $this->widget(
                    '\TbButton', array(
                        'label' => Yii::t('model', 'Delete'),
                        'icon' => 'glyphicon-remove icon-white',
                        'htmlOptions' => array(
                            'submit' => array(
                                'delete',
                                'id' => $model->{$model->tableSchema->primaryKey},
                                'returnUrl' => Yii::app()->request->getParam('returnUrl')
                                        ? Yii::app()->request->getParam('returnUrl')
                                        : $this->createUrl('admin'),
                            ),
                            'confirm' => Yii::t('model', 'Do you want to delete this item?'),
                        ),
                    )
                ); ?>
            </div>
        </div>
    </div>
    <div class="well">
        <?php echo $model->markup; ?>
        <?php if (Yii::app()->user->checkAccess('HtmlChunk.*')): ?>
            <div class="admin-container hide">
                <?php echo TbHtml::link(
                    '<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Html Chunk'))),
                    array('htmlChunk/continueAuthoring', 'id' => $model->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')
                ); ?>
            </div>
        <?php endif; ?>
        <?php if (Yii::app()->user->checkAccess('Developer')): ?>
            <div class="admin-container hide">
                <h3><?php echo Yii::t('app', 'Developer access'); ?></h3>
                <?php echo TbHtml::link(
                    '<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Html Chunk'))),
                    array('htmlChunk/update', 'id' => $model->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')
                ); ?>
            </div>
        <?php endif; ?>
    </div>
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

    <b><?php echo CHtml::encode($model->getAttributeLabel('_markup')); ?>:</b>
    <?php echo CHtml::encode($model->_markup); ?>
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

    <b><?php echo CHtml::encode($model->getAttributeLabel('html_chunk_qa_state_id')); ?>:</b>
    <?php echo CHtml::encode($model->html_chunk_qa_state_id); ?>
    <br />
    */
    ?>
</div>
