<?php /** @var GMActiveForm $form */ ?>

<?php $form = $this->beginWidget('GMActiveForm', array(
    'id' => 'item-form',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    'clientOptions' => array(
        'validateOnChange' => true,
        'validateOnType' => true,
        'validateOnSubmit' => true,
    ),
    'type' => 'horizontal',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<input type="hidden" name="form-url" value="<?php echo CHtml::encode(Yii::app()->request->url); ?>"/>

<?php $this->renderPartial("/_item/elements/flowbar", compact("model", "workflowCaption", "form", "translateInto")); ?>

<div class="row-fluid">
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
        <?php echo $form->errorSummary($model); ?>
        <div class="row-fluid">
            <div class="span9">
                <h2><?php print $stepCaption; ?>
                    <small></small>
                </h2>
            </div>
            <div class="span3">
                <div class="btn-toolbar pull-right">
                    <div class="btn-group">
                        <?php
                        switch ($this->action->id . "-" . $step) {
                            case "translate-subtitles":
                                $this->widget("bootstrap.widgets.TbButton", array(
                                    "label" => Yii::t("model", "Load current translations into media player"),
                                    "url" => Yii::app()->request->url,
                                    "type" => "primary",
                                ));
                                break;
                            default:
                                echo CHtml::submitButton(Yii::t('model', 'Save changes'), array(
                                    'class' => 'btn btn-primary btn-dirtyforms',
                                    'name' => 'save-changes',
                                ));
                                $this->widget("bootstrap.widgets.TbButton", array(
                                    'label' => Yii::t('model', 'Reset'),
                                    'url' => Yii::app()->request->url,
                                    'htmlOptions' => array(
                                        'class' => 'btn-dirtyforms'
                                    ),
                                ));
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->renderPartial('steps/' . $step, compact("model", "form")); ?>

        <?php $this->endWidget() ?>

    </div>

</div>

<?php foreach (array_reverse($this->clips->toArray(), true) as $key => $clip) { // Reverse order for recursive modals to render properly
    if (strpos($key, "modal:") === 0) {
        echo $clip;
    }
} ?>
