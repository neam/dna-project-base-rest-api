<?php
/* @var Controller $this */
/* @var string $inputSelector jQuery selector to the select-input of the parent form */
/* @var integer $pk The primary key field added object */
/* @var string $field The field of the newly added object to be used as the key/label of the parent form select-input */
?>
<?php $this->beginWidget(
    'yiistrap.widgets.TbModal',
    array(
        'id' => "$formId-modal",
        'header' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'File'))),
        'footer' => TbHtml::linkButton(
                Yii::t('app', 'Close'),
                array(
                    'data-dismiss' => 'modal',
                    'data-target' => "#$formId-modal",
                )
            ),
        'htmlOptions' => array(
            'class' => 'modal',
        ),
    )
); ?>
<?php /* $form = $this->beginWidget(
        'yiistrap.widgets.TbActiveForm',
        array(
            'id' => $formId,
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        )
    ); */
?>
<script>
    // TODO: Refactor JavaScript.
    $(function () {
        $('#<?php echo $formId; ?>-upload-iframe').on('done', function (event, p3_media_id) {
            //$('#
            <?php echo $formId; ?>-modal
            ').modal('
            hide
            ');
            $('<?php echo $inputSelector; ?>').append($('<option>', {value: p3_media_id, selected: 'selected'}).text('<?php echo Yii::t('crud', 'Uploaded file'); ?>'));
            $("<?php echo $inputSelector; ?>").select2();
        });
    });
</script>
<div class="modal-body">
    <iframe id="<?php echo $formId; ?>-upload-iframe" name="<?php echo $formId; ?>-upload-iframe"
            src="<?php echo Yii::app()->request->baseUrl; ?>/p3media/import/uploadPopup?parent_form=<?php echo $formId; ?>"
            width="100%" height="300" style="border: 0;"></iframe>
</div>
<?php // $this->endWidget(); ?>
<?php $this->endWidget(); ?>
