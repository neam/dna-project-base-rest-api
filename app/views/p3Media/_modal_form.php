<?php
/* @var $this Controller */
/* @var $inputSelector jQuery selector to the select-input of the parent form */
/* @var $pk The primary key field added object */
/* @var $field The field of the newly added object to be used as the key/label of the parent form select-input */

$this->beginWidget('\TbModal', array('id' => $formId . "-modal"));

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => $formId,
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
));
?>

    <script>

        $(function () {

            $('#<?php echo $formId; ?>-upload-iframe').on('done', function (event, p3_media_id) {

                $("#<?php echo $formId; ?>-modal").modal("hide");
                $("<?php echo $inputSelector; ?>")
                    .append($("<option>", {value: p3_media_id, selected: "selected"}).text('<?php echo Yii::t('crud', 'Uploaded file'); ?>'));

                if ($("<?php echo $inputSelector; ?>").data('select2opts')) {
                    $("<?php echo $inputSelector; ?>").select2();
                    $("<?php echo $inputSelector; ?>").select2($("<?php echo $inputSelector; ?>").data('select2opts'));
                }

            });

        });

    </script>

    <div class="modal-header">
        <button type="button" class="close" data-toggle="modal" data-target="#<?php echo $formId; ?>-modal">×</button>
        <h3><?php echo Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'File'))); ?></h3>
    </div>
    <div class="modal-body">

        <iframe id="<?php echo $formId; ?>-upload-iframe"
                src="<?php echo Yii::app()->request->baseUrl; ?>/p3media/import/uploadPopup?parent_form=<?php echo $formId; ?>"
                width="100%" height="300" style="border: 0;"></iframe>

    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-toggle="modal"
           data-target="#<?php echo $formId; ?>-modal"><?php print Yii::t('app', 'Close'); ?></a>
    </div>

<?php
$this->endWidget(); // form
$this->endWidget(); // modal