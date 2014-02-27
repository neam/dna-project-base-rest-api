<?php
/* @var Controller|ItemController $this */
/* @var ActiveRecord|ItemTrait $model */
/* @var AppActiveForm $form */
/* @var string $step */
/* @var string $stepCaption */
/* @var string $controllerCssClass */
?>
<div class="<?php echo $this->getCssClasses($model); ?>">
    <?php $form = $this->beginWidget(
        'AppActiveForm',
        array(
            'id' => 'item-form',
            'enableAjaxValidation' => true,
            'clientOptions' => array( //'validateOnSubmit' => true,
            ),
            'htmlOptions' => array(
                'class' => 'dirtyforms',
                'enctype' => 'multipart/form-data',
            ),
        )
    ); ?>
    <input type="hidden" name="form-url" value="<?php echo CHtml::encode(Yii::app()->request->url); ?>"/>
    <?php $this->renderPartial('/_item/edit/_flowbar', compact('model', 'requiredCounts')); ?>
    <div class="after-flowbar">
        <div class="item-content">
            <div class="item-progress">
                <?php foreach ($this->workflowData["stepActions"] as $action): ?>
                    <?php $this->renderPartial("/_item/edit/_progress-item", $action); ?>
                <?php endforeach; ?>
                <?php /*
                // todo: remove if unused
                <div class="well well-white">
                    <?php echo $this->renderPartial('/_item/elements/actions', compact("model", "execution")); ?>
                </div>
                */ ?>
            </div>
            <div class="item-form">
                <h2 class="form-title"><?php echo $stepCaption; ?></h2>
                <div class="form-content">
                    <?php $this->renderPartial('steps/' . $step, array(
                        'model' => $model,
                        'form' => $form,
                        'step' => $step,
                    )); ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget() ?>
    <?php
    // todo: figure out what this actually does
    /*foreach (array_reverse($this->clips->toArray(), true) as $key => $clip) { // Reverse order for recursive modals to render properly
        if (strpos($key, "modal:") === 0) {
            echo $clip;
        }
    }*/ ?>
</div>