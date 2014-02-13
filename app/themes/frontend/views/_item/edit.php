<?php /** @var AppActiveForm $form */ ?>

<?php $form = $this->beginWidget('AppActiveForm', array(
    'id' => 'item-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array( //'validateOnSubmit' => true,
    ),
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    'htmlOptions' => array(
        'class' => 'dirtyforms',
        'enctype' => 'multipart/form-data',
    ),
)); ?>

<input type="hidden" name="form-url" value="<?php echo CHtml::encode(Yii::app()->request->url); ?>"/>

<?php
$requiredCounts = isset($requiredCounts) ? $requiredCounts : array(); // TODO: Ensure $requireCounts is always passed to this view.
$this->renderPartial('/_item/elements/flowbar', array(
    'model' => $model,
    'requiredCounts' => $requiredCounts,
));
?>

<div class="row-fluid below-flowbar">
    <div class="span3">

        <br/>

        <div class="row-fluid">
            <div class="span12">
                <?php echo $this->renderPartial('/_item/elements/progress', compact("model", "execution", "translateInto")); ?>
            </div>
        </div>

        <hr/>

        <!--
        <div class="row-fluid">
            <div class="span12 well well-white">
                <?php echo $this->renderPartial('/_item/elements/actions', compact("model", "execution")); ?>
            </div>
        </div>
        -->

    </div>
    <div class="span9">
        <?php //echo $form->errorSummary($model); ?>
        <div class="row-fluid">
            <div class="span9">
                <h2><?php print $stepCaption; ?>
                    <small></small>
                </h2>
            </div>
            <div class="span3">
                <div class="btn-toolbar pull-right buttons-fixed">
                    <div class="btn-group">
                        <?php echo CHtml::submitButton(Yii::t('model', 'Save changes'), array(
                            'class' => 'btn btn-primary btn-dirtyforms',
                            'name' => 'save-changes',
                        )); ?>
                        <?php $this->widget("\TbButton", array(
                            'label' => Yii::t('model', 'Reset'),
                            'url' => Yii::app()->request->url,
                            'htmlOptions' => array(
                                'class' => 'btn-dirtyforms ignoredirty',
                            ),
                        )); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->renderPartial('steps/' . $step, array(
            'model' => $model,
            'form' => $form,
            'step' => $step,
        )); ?>

        <?php $this->endWidget() ?>

    </div>

</div>

<?php foreach (array_reverse($this->clips->toArray(), true) as $key => $clip) { // Reverse order for recursive modals to render properly
    if (strpos($key, "modal:") === 0) {
        echo $clip;
    }
} ?>
