<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php echo $form->textFieldRow($model, 'from_node_id', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'to_node_id', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'weight'); ?>

            <?php echo $form->textFieldRow($model, '_title', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'relation', array('maxlength' => 255)); ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>
