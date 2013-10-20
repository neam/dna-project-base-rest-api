<?php
$this->setPageTitle(
    Yii::t('model', 'Chapter')
    . ' - '
    . Yii::t('crud', 'Draft')
);

$this->breadcrumbs[Yii::t('model', 'Chapters')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Draft');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>

<div class="row">
    <div class="span12">

        <h1>
            <?php echo(empty($model->title) ? Yii::t('model', 'Chapter') . " #" . $model->id : $model->title); ?>
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
        'id' => 'chapter-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => true,
        'type' => 'horizontal',
    ));
    echo $form->errorSummary($model);
    ?>


        <div class="row">
            <div class="span9">

                <h2>Create Draft
                    <small></small>
                </h2>

            </div>
            <div class="span3">

                <div class="btn-toolbar pull-right">

                    <div class="btn-group">
                        <?php
				        echo CHtml::submitButton(Yii::t('model', 'Save and Continue'), array(
				                'class' => 'btn btn-large btn-primary'
				            )
				        );
                        ?>

                    </div>

                </div>

            </div>
        </div>

        <?php echo $form->textFieldRow($model, 'title_en', array('maxlength' => 255)); ?>

        <?php echo $form->textFieldRow($model, 'slug_en', array('maxlength' => 255)); ?>


	    <div class="form-actions">
	        <?php
	        echo CHtml::Button(Yii::t('model', 'Cancel'), array(
	                'submit' => (isset($_GET['returnUrl'])) ? $_GET['returnUrl'] : array('chapter/admin'),
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
