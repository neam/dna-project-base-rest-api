<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php echo $form->textFieldRow($model, 'slug', array('maxlength' => 255)); ?>

            <?php echo $form->html5EditorRow($model, 'question', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
                'link' => true,
                'image' => false,
                'color' => false,
                'html' => true,
            ))); ?>

            <?php echo $form->textFieldRow($model, 'source', array('maxlength' => 255)); ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>
