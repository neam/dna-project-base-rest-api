<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php echo $form->textFieldRow($model, 'author_user_id'); ?>

            <?php echo $form->textAreaRow($model, '_comment', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

            <?php echo $form->textFieldRow($model, 'context_model', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'context_id', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'context_attribute', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'context_translate_into', array('maxlength' => 10)); ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>
