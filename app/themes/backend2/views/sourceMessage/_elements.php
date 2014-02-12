<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php echo $form->textFieldRow($model, 'category', array('maxlength' => 32)); ?>

            <?php echo $form->textAreaRow($model, 'message', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>
