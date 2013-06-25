<?php
$model = new VizView();

$this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'viz-view-form-modal'));

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'viz-view-form',
	'enableAjaxValidation' => true,
	'enableClientValidation' => true,
	'type' => 'horizontal',
    ));
?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3><?php echo Yii::t('crud', 'Create new') ?> <?php echo Yii::t('crud', 'Viz View') ?></h3>
</div>
<div class="modal-body">

	<?php
	echo $form->errorSummary($model);
	?>
	<div class="row">
		<div class="span8"> <!-- main inputs -->

			<?php echo $form->textFieldRow($model, 'title', array('maxlength' => 255)); ?>

		</div> <!-- main inputs -->

		<div class="span4"> <!-- sub inputs -->

		</div> <!-- sub inputs -->
	</div>

</div>
<div class="modal-footer">
	<a href="#" class="btn" data-dismiss="modal">Cancel</a>
	<?php
	echo CHtml::ajaxSubmitButton('Save', CHtml::normalizeUrl(array('vizView/editableCreator', 'render' => true)), array(
		'dataType' => 'json',
		'type' => 'post',
		'success' => 'function(data, config) {
				//$("#loader").show();
				console.log("success", data, config);
				if (data && data.id) {
					$("#' . $form->id . '").trigger("reset");
					$("#viz-view-form-modal").modal("hide");
					$("' . $inputSelector . '")
						.append($("<option>", { value : "id", selected: "selected" }).text(data.' . $field . '));
				} else {
					config.error.call(this, data && data.errors ? data.errors : "Unknown error");
				}
			}',
		'error' => 'function(errors) {
				//$("#loader").show();
				var msg = "";
				if (errors && errors.responseText) {
					msg = errors.responseText;
				} else {
					$.each(errors, function(k, v) {
						msg += v + "<br>";
					});
				}
				alert(msg);
			}',
		'beforeSend' => 'function() {
				//$("#loader").show();
			}',
	    ), array('class' => 'btn btn-primary'));
	?>

</div>

<?php $this->endWidget(); // form ?>
<?php
$this->endWidget(); // modal ?>