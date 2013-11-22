<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php echo $form->textAreaRow($model, 'contents', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

            <?php echo $form->textFieldRow($model, 'user_id'); ?>

            <?php echo $form->textFieldRow($model, 'node_id', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'reward'); ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>
