<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php echo $form->textFieldRow($model, 'status', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'draft_validation_progress'); ?>

            <?php echo $form->textFieldRow($model, 'preview_validation_progress'); ?>

            <?php echo $form->textFieldRow($model, 'public_validation_progress'); ?>

            <?php echo $form->textFieldRow($model, 'approval_progress'); ?>

            <?php echo $form->textFieldRow($model, 'proofing_progress'); ?>

            <?php echo $form->textFieldRow($model, 'translations_draft_validation_progress'); ?>

            <?php echo $form->textFieldRow($model, 'translations_preview_validation_progress'); ?>

            <?php echo $form->textFieldRow($model, 'translations_public_validation_progress'); ?>

            <?php echo $form->textFieldRow($model, 'translations_approval_progress'); ?>

            <?php echo $form->textFieldRow($model, 'translations_proofing_progress'); ?>

            <?php echo $form->textFieldRow($model, 'previewing_welcome'); ?>

            <?php echo $form->textFieldRow($model, 'candidate_for_public_status'); ?>

            <?php echo $form->textFieldRow($model, 'title_approved'); ?>

            <?php echo $form->textFieldRow($model, 'slug_approved'); ?>

            <?php echo $form->textFieldRow($model, 'question_approved'); ?>

            <?php echo $form->textFieldRow($model, 'description_approved'); ?>

            <?php echo $form->textFieldRow($model, 'thumbnail_approved'); ?>

            <?php echo $form->textFieldRow($model, 'materials_approved'); ?>

            <?php echo $form->textFieldRow($model, 'title_proofed'); ?>

            <?php echo $form->textFieldRow($model, 'slug_proofed'); ?>

            <?php echo $form->textFieldRow($model, 'question_proofed'); ?>

            <?php echo $form->textFieldRow($model, 'description_proofed'); ?>

            <?php echo $form->textFieldRow($model, 'thumbnail_proofed'); ?>

            <?php echo $form->textFieldRow($model, 'materials_proofed'); ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>