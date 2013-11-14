<?php
$workflowCaption = $this->workflowCaption($model);

$this->setPageTitle(
    Yii::t('model', $this->modelClass)
    . ' - '
    . $workflowCaption
);

$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = $workflowCaption;
$this->breadcrumbs[] = $stepCaption;
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'item-form',
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'type' => 'horizontal',
));
?>

<input type="hidden" name="returnUrl" value="<?php echo CHtml::encode(Yii::app()->request->url); ?>"/>

<?php $this->renderPartial("/_item/elements/flowbar", compact("model", "workflowCaption", "form")); ?>

<div class="row-fluid">
    <div class="span3">

        <br/>

        <div class="row-fluid">
            <div class="span12">
                <?php echo $this->renderPartial('/_item/elements/progress', compact("model", "execution")); ?>
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

        <?php
        echo $form->errorSummary($model);
        ?>


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
                        echo CHtml::submitButton(Yii::t('model', 'Save changes'), array(
                                'class' => 'btn btn-primary',
                                'name' => 'save-changes',
                            )
                        );
                        $this->widget("bootstrap.widgets.TbButton", array(
                            "label" => Yii::t("model", "Undo"),
                            "url" => Yii::app()->request->url,
                        ));

                        ?>

                    </div>

                </div>

            </div>
        </div>

        <?php $this->renderPartial('steps/' . $step, compact("model", "form")); ?>

        <?php $this->endWidget() ?>

    </div>

</div>

<?php
foreach (array_reverse($this->clips->toArray(), true) as $key => $clip) { // Reverse order for recursive modals to render properly
    if (strpos($key, "modal:") === 0) {
        echo $clip;
    }
}
?>
