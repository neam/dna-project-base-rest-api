<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php echo $form->textFieldRow($model, 'username', array('maxlength' => 20)); ?>

            <?php echo $form->passwordFieldRow($model, 'password', array('maxlength' => 128)); ?>

            <?php echo $form->textFieldRow($model, 'email', array('maxlength' => 128)); ?>

            <?php echo $form->textFieldRow($model, 'activkey', array('maxlength' => 128)); ?>

            <?php echo $form->textFieldRow($model, 'superuser'); ?>

            <?php echo $form->textFieldRow($model, 'status'); ?>

            <?php echo $form->textFieldRow($model, 'create_at'); ?>

            <?php echo $form->textFieldRow($model, 'lastvisit_at'); ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

        <h3>
            <?php echo Yii::t('model', 'profiles'); ?>
        </h3>
        <?php ?>

    </div>
    <!-- sub inputs -->
</div>
