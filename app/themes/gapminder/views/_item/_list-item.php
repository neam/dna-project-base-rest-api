<?php
/* @var Controller|ItemController $this */
/* @var ActiveRecord|ItemTrait|QaStateBehavior $data */
?>
<div class="list-item">
    <div class="item-header">
        <div class="header-text">
            <h2 class="header-title">
                <?php echo $data->itemLabel; ?>
                <small class="header-version">
                    <?php echo Yii::t('app', 'Version') ?>: <?php echo $data->version; ?>
                </small>
                <small class="header-status">
                    <?php echo Yii::t('app', 'Status'); ?>: <?php echo Yii::t(
                        'statuses',
                        $data->qaStateBehavior()->statusLabel
                    ); ?>
                </small>
            </h2>
        </div>
        <div class="header-actions">
            <div class="btn-group">
                <?php $this->widget(
                    '\TbButton',
                    array(
                        'label' => Yii::t('model', 'View'),
                        'icon' => TbHtml::ICON_EYE_OPEN,
                        'url' => array('view', 'id' => $data->{$data->tableSchema->primaryKey}),
                    )
                ); ?>
                <?php $this->widget(
                    '\TbButton',
                    array(
                        'label' => Yii::t('model', 'Edit'),
                        'icon' => TbHtml::ICON_EDIT,
                        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                        'url' => !empty($_GET['editingUrl']) ? $_GET['editingUrl'] : array(
                            'continueAuthoring',
                            'id' => $data->{$data->tableSchema->primaryKey}
                        ),
                        'visible' => Yii::app()->user->checkAccess('Item.Edit'),
                    )
                ); ?>
            </div>
        </div>
    </div>
    <div class="item-content">
        <div class="item-thumb">
            <?php if (isset($data->thumbnailMedia) && $data->thumbnailMedia instanceof P3Media): ?>
                <?php echo CHtml::link(
                    $data->thumbnailMedia->image('select2-thumb'),
                    $this->createUrl('view', array('id' => $data->id))
                ); ?>
            <?php else: ?>
                <div class="no-thumb">
                    <?php echo Yii::t('app', 'No thumbnail available.'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="item-actions">
            <?php $this->renderPartial('/_item/elements/_action-buttons', array('model' => $data)); ?>
        </div>
    </div>
</div>
