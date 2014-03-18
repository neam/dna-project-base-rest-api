<?php
/* @var Controller|ItemController $this */
/* @var ActiveRecord|ItemTrait $model */
/* @var AppActiveForm $form */
/* @var string $caption */
/* @var string $stepCaption */
/* @var float $progress */
/* @var string $editAction */
/* @var string $translateInto */
?>
<div class="progress-item">
    <div class="item-bar">
        <?php $this->widget(
            '\TbProgress',
            array(
                'color' => TbHtml::PROGRESS_COLOR_SUCCESS,
                'percent' => $progress,
            )
        ); ?>
    </div>
    <div class="item-action">
        <?php $this->widget(
            '\TbButton',
            array(
                'label' => Yii::t('model', $caption),
                'color' => $_GET['step'] === $step ? TbHtml::BUTTON_COLOR_INVERSE : TbHtml::BUTTON_COLOR_DEFAULT,
                'size' => TbHtml::BUTTON_SIZE_XS,
                'block' => true,
                'icon' => 'glyphicon-edit',
                'url' => $model->getActionRoute($this->action->id, $step, $translateInto),
            )
        ); ?>
    </div>
</div>
