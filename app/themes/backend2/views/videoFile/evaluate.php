<?php
$this->setPageTitle(
    Yii::t('model', $this->modelClass)
    . ' - '
    . Yii::t('crud', 'Evaluate')
);

$this->breadcrumbs[Yii::t('model', 'Video Files')] = array('admin');
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
        'id' => 'videoFile-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => true,
        'type' => 'horizontal',
    ));
    echo $form->errorSummary($model);
    ?>


        <div class="row">
            <div class="span9">

                <h2>Evaluate
                    <small></small>
                </h2>

            </div>
            <div class="span3">

                <div class="btn-toolbar pull-right">
                </div>

            </div>
        </div>
		<div class="control-group ">
			<div style="float:right">
			<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
			    'type' => 'primary',
			    'toggle' => 'radio',
			    'buttons' => array(
			        array('label'=>'Approve','htmlOptions'=>array('class'=>'btn-success')),
			        array('label'=>'Reject','htmlOptions'=>array('class'=>'btn-danger')),
			    ),
			)); ?>
			</div>
			<label class="control-label" for="<?php echo $this->modelClass; ?>_title_comment"><?php echo "title_en: "; ?></label>
			<div class="controls">
				<?php echo $model->attributes["title_en"]; ?>
			</div>

		</div>

		<div class="control-group ">
			<label class="control-label" for="Chapter_title_comment">Comment:</label>
			<div class="controls">
				<textarea rows="6" cols="50" class="span8" name="Chapter[title_comment]" id="Chapter_title_comment"></textarea>
				<span class="help-inline error" id="Chapter_title_comment_em_" style="display: none"></span>
			</div>
		</div>

		<div class="control-group ">
			<div style="float:right">
			<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
			    'type' => 'primary',
			    'toggle' => 'radio',
			    'buttons' => array(
			        array('label'=>'Approve','htmlOptions'=>array('class'=>'btn-success')),
			        array('label'=>'Reject','htmlOptions'=>array('class'=>'btn-danger')),
			    ),
			)); ?>
			</div>
			<label class="control-label" for="Chapter_slug_comment"><?php echo "slug_en: "; ?></label>
			<div class="controls">
				<?php echo $model->attributes["slug_en"]; ?>
			</div>

		</div>

		<div class="control-group ">
			<label class="control-label" for="Chapter_slug_comment">Comment:</label>
			<div class="controls">
				<textarea rows="6" cols="50" class="span8" name="Chapter[slug_comment]" id="Chapter_slug_comment"></textarea>
				<span class="help-inline error" id="Chapter_slug_comment_em_" style="display: none"></span>
			</div>
		</div>


	    <div class="form-actions">
	        <?php
	        echo CHtml::Button(Yii::t('model', 'Cancel'), array(
	                'submit' => (isset($_GET['returnUrl'])) ? $_GET['returnUrl'] : array('videoFile/admin'),
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
