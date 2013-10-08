<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php echo $form->textFieldRow($model, 'version'); ?>

            <?php echo $form->textFieldRow($model, 'title_en', array('maxlength' => 255)); ?>

            <?php echo $form->textAreaRow($model, 'embed_template', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'authoringWorkflowExecution',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'authoring_workflow_execution_id', $input);
            ?>

            <?php echo $form->textFieldRow($model, 'title_es', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_fa', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_hi', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_pt', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_sv', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_cn', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_de', array('maxlength' => 255)); ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>
