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
            array('color' => TbHtml::PROGRESS_COLOR_SUCCESS, 'percent' => $progress)
        ); ?>
    </div>
    <div class="item-action">
        <?php
        // TODO: Move logic to model or trait.
        $action = array($editAction, "id" => $model->{$model->tableSchema->primaryKey}, "step" => $step);
        if (!is_null($translateInto)) {
            $action["translateInto"] = $translateInto;
        }
        $this->widget(
            "\TbButton",
            array(
                "label" => Yii::t("model", $caption),
                "color" => $_GET['step'] == $step ? 'inverse' : TbHtml::BUTTON_COLOR_DEFAULT,
                "size" => TbHtml::BUTTON_SIZE_XS,
                'block' => true,
                "icon" => "glyphicon-edit" . ($this->action->id == $action ? " icon-white" : null),
                "url" => $action,
            )
        );
        ?>
    </div>
</div>