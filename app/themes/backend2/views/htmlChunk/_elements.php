<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php echo $form->textFieldRow($model, 'version'); ?>

            <?php echo $form->html5EditorRow($model, 'markup_en', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
                'link' => true,
                'image' => false,
                'color' => false,
                'html' => true,
            ))); ?>

            <?php echo $form->textFieldRow($model, 'authoring_workflow_execution_id_en', array('maxlength' => 10)); ?>

            <?php echo $form->textFieldRow($model, 'node_id', array('maxlength' => 20)); ?>

            <?php echo $form->html5EditorRow($model, 'markup_es', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
                'link' => true,
                'image' => false,
                'color' => false,
                'html' => true,
            ))); ?>

            <?php echo $form->html5EditorRow($model, 'markup_fa', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
                'link' => true,
                'image' => false,
                'color' => false,
                'html' => true,
            ))); ?>

            <?php echo $form->html5EditorRow($model, 'markup_hi', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
                'link' => true,
                'image' => false,
                'color' => false,
                'html' => true,
            ))); ?>

            <?php echo $form->html5EditorRow($model, 'markup_pt', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
                'link' => true,
                'image' => false,
                'color' => false,
                'html' => true,
            ))); ?>

            <?php echo $form->html5EditorRow($model, 'markup_sv', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
                'link' => true,
                'image' => false,
                'color' => false,
                'html' => true,
            ))); ?>

            <?php echo $form->html5EditorRow($model, 'markup_cn', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
                'link' => true,
                'image' => false,
                'color' => false,
                'html' => true,
            ))); ?>

            <?php echo $form->html5EditorRow($model, 'markup_de', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
                'link' => true,
                'image' => false,
                'color' => false,
                'html' => true,
            ))); ?>

            <?php echo $form->textFieldRow($model, 'authoring_workflow_execution_id_es', array('maxlength' => 10)); ?>

            <?php echo $form->textFieldRow($model, 'authoring_workflow_execution_id_fa', array('maxlength' => 10)); ?>

            <?php echo $form->textFieldRow($model, 'authoring_workflow_execution_id_hi', array('maxlength' => 10)); ?>

            <?php echo $form->textFieldRow($model, 'authoring_workflow_execution_id_pt', array('maxlength' => 10)); ?>

            <?php echo $form->textFieldRow($model, 'authoring_workflow_execution_id_sv', array('maxlength' => 10)); ?>

            <?php echo $form->textFieldRow($model, 'authoring_workflow_execution_id_cn', array('maxlength' => 10)); ?>

            <?php echo $form->textFieldRow($model, 'authoring_workflow_execution_id_de', array('maxlength' => 10)); ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>
