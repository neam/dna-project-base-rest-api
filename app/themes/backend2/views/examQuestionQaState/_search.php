<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>
    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'status'); ?>
        <?php echo $form->textField($model, 'status', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'draft_validation_progress'); ?>
        <?php echo $form->checkBox($model, 'draft_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'preview_validation_progress'); ?>
        <?php echo $form->checkBox($model, 'preview_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'public_validation_progress'); ?>
        <?php echo $form->checkBox($model, 'public_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'approval_progress'); ?>
        <?php echo $form->textField($model, 'approval_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'proofing_progress'); ?>
        <?php echo $form->textField($model, 'proofing_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translations_draft_validation_progress'); ?>
        <?php echo $form->textField($model, 'translations_draft_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translations_preview_validation_progress'); ?>
        <?php echo $form->textField($model, 'translations_preview_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translations_public_validation_progress'); ?>
        <?php echo $form->textField($model, 'translations_public_validation_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translations_approval_progress'); ?>
        <?php echo $form->textField($model, 'translations_approval_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'translations_proofing_progress'); ?>
        <?php echo $form->textField($model, 'translations_proofing_progress'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'previewing_welcome'); ?>
        <?php echo $form->checkBox($model, 'previewing_welcome'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'candidate_for_public_status'); ?>
        <?php echo $form->checkBox($model, 'candidate_for_public_status'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_approved'); ?>
        <?php echo $form->checkBox($model, 'slug_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'question_approved'); ?>
        <?php echo $form->checkBox($model, 'question_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'source_approved'); ?>
        <?php echo $form->checkBox($model, 'source_approved'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_proofed'); ?>
        <?php echo $form->checkBox($model, 'slug_proofed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'question_proofed'); ?>
        <?php echo $form->checkBox($model, 'question_proofed'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'source_proofed'); ?>
        <?php echo $form->checkBox($model, 'source_proofed'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->