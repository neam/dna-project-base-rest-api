<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php echo $form->textFieldRow($model, 'workflow_name', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'workflow_version', array('maxlength' => 10)); ?>

            <?php echo $form->textFieldRow($model, 'workflow_created'); ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>
