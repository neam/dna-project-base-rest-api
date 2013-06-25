<?php
/* @var $this VizViewController */
/* @var $inputSelector jQuery selector to the select-input of the parent form */
/* @var $field The field of the newly added object to be used as the key/label of the parent form select-input */

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
	<h3><?php echo Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Viz View'))); ?></h3>
</div>
<div class="modal-body">

	<?php
	$this->renderPartial('/vizView/_elements', array(
		'model' => $model,
		'form' => $form,
	));
	?>

</div>
<div class="modal-footer">
	<a href="#" class="btn" data-dismiss="modal">Cancel</a>
	<?php
	echo CHtml::ajaxSubmitButton('Save', CHtml::normalizeUrl(array('vizView/editableCreator', 'render' => true)), array(
		'dataType' => 'json',
		'type' => 'post',
		'success' => 'function(data, config) {
				//$("#loader").show();
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

<?php
$this->endWidget(); // form
$this->endWidget(); // modal