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

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'authoringWorkflowExecutionIdEn',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'authoring_workflow_execution_id_en', $input);
            ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'node',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'node_id', $input);
            ?>

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

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'authoringWorkflowExecutionIdEs',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'authoring_workflow_execution_id_es', $input);
            ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'authoringWorkflowExecutionIdFa',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'authoring_workflow_execution_id_fa', $input);
            ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'authoringWorkflowExecutionIdHi',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'authoring_workflow_execution_id_hi', $input);
            ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'authoringWorkflowExecutionIdPt',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'authoring_workflow_execution_id_pt', $input);
            ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'authoringWorkflowExecutionIdSv',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'authoring_workflow_execution_id_sv', $input);
            ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'authoringWorkflowExecutionIdCn',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'authoring_workflow_execution_id_cn', $input);
            ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'authoringWorkflowExecutionIdDe',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'authoring_workflow_execution_id_de', $input);
            ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>
