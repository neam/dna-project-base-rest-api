<?php
/* @var HtmlChunkController|ItemController $this */
/* @var HtmlChunk|ItemTrait $model */
?>
<div class="<?php echo $this->getCssClasses($model); ?>">
    <?php $this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('browse'); ?>
    <?php $this->renderPartial('/_item/elements/flowbar', array('model' => $model)); ?>
    <div class="after-flowbar">
        <?php /*
        <h1>
            <?php echo Yii::t('model', 'Html Chunk'); ?>
            <small><?php echo Yii::t('model', 'View') ?> #<?php echo $model->id ?></small>
        </h1>
         */ ?>
        <?php if (Yii::app()->user->checkAccess('HtmlChunk.*')): ?>
            <div class='admin-container hide'>
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
        <?php endif; ?>
        <?php $this->renderPartial('_view', array('data' => $model)); ?>
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
        */?>
    </div>
</div>
