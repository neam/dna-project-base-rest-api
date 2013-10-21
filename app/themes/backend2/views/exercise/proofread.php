<?php
$this->setPageTitle(
    Yii::t('model', $this->modelClass)
    . ' - '
    . Yii::t('crud', 'Proofread')
);

$this->breadcrumbs[Yii::t('model', 'Exercises')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Evaluate');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>

<div class="row">
    <div class="span12">

        <h1>
            <?php echo(empty($model->title) ? Yii::t('model', $this->modelClass) . " #" . $model->id : $model->title); ?>
            <small>vX</small>

            <div class="btn-group">

                <?php
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Preview"),
                    "icon" => "icon-eye-open",
                    "url" => array("preview", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                ?>

            </div>

        </h1>

    </div>
</div>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<br/>

<div class="row">
    <div class="span3 well well-white">

        <?php echo $this->renderPartial('/_item/elements/_progress', compact("model", "execution")); ?>

    </div>
    <div class="span9 well well-white">

	<?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'exercise-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => true,
        'type' => 'horizontal',
    ));
    echo $form->errorSummary($model);
    ?>


        <div class="row">
            <div class="span9">

                <h2>Proofread
                    <small></small>
                </h2>

            </div>
            <div class="span3">

                <div class="btn-toolbar pull-right">
                </div>

            </div>
        </div>


	    <div class="form-actions">
	        <?php
	        echo CHtml::Button(Yii::t('model', 'Cancel'), array(
	                'submit' => (isset($_GET['returnUrl'])) ? $_GET['returnUrl'] : array('exercise/admin'),
	                'class' => 'btn'
	            )
	        );
	        echo ' ';
	        echo CHtml::submitButton(Yii::t('model', 'Save'), array(
	                'class' => 'btn btn-primary'
	            )
	        );
	        ?>    </div>

	        <div class="alert alert-info">
	            Hint: Lorem ipsum
	        </div>

	    <?php $this->endWidget() ?>

    </div>

</div>
