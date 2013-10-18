<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php echo $form->textFieldRow($model, 'version'); ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'clonedFrom',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'cloned_from_id', $input);
            ?>

            <?php
            $formId = 'exam-question-cloned_from_id-' . \uniqid() . '-form';
            ?>

            <div class="control-group">
                <div class="controls">
                    <?php
                    echo $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => Yii::t('model', 'Create {model}', array('{model}' => Yii::t('model', 'Snapshot'))),
                        'icon' => 'icon-plus',
                        'htmlOptions' => array(
                            'data-toggle' => 'modal',
                            'data-target' => '#' . $formId . '-modal',
                        ),
                    ), true);
                    ?>                </div>
            </div>

            <?php
            $this->beginClip('modal:' . $formId . '-modal');
            $this->renderPartial('//snapshot/_modal_form', array(
                'formId' => $formId,
                'inputSelector' => '#ExamQuestion_cloned_from_id',
                'model' => new Snapshot,
                'pk' => 'id',
                'field' => 'itemLabel',
            ));
            $this->endClip();
            ?>

            <?php echo $form->textFieldRow($model, 'slug_en', array('maxlength' => 255)); ?>

            <?php echo $form->html5EditorRow($model, 'question_en', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
                'link' => true,
                'image' => false,
                'color' => false,
                'html' => true,
            ))); ?>

            <?php echo $form->textFieldRow($model, 'source_node_id', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'node_id', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'slug_es', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_fa', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_hi', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_pt', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_sv', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_cn', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_de', array('maxlength' => 255)); ?>

            <?php echo $form->html5EditorRow($model, 'question_es', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
                'link' => true,
                'image' => false,
                'color' => false,
                'html' => true,
            ))); ?>

            <?php echo $form->html5EditorRow($model, 'question_fa', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
                'link' => true,
                'image' => false,
                'color' => false,
                'html' => true,
            ))); ?>

            <?php echo $form->html5EditorRow($model, 'question_hi', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
                'link' => true,
                'image' => false,
                'color' => false,
                'html' => true,
            ))); ?>

            <?php echo $form->html5EditorRow($model, 'question_pt', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
                'link' => true,
                'image' => false,
                'color' => false,
                'html' => true,
            ))); ?>

            <?php echo $form->html5EditorRow($model, 'question_sv', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
                'link' => true,
                'image' => false,
                'color' => false,
                'html' => true,
            ))); ?>

            <?php echo $form->html5EditorRow($model, 'question_cn', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
                'link' => true,
                'image' => false,
                'color' => false,
                'html' => true,
            ))); ?>

            <?php echo $form->html5EditorRow($model, 'question_de', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
                'link' => true,
                'image' => false,
                'color' => false,
                'html' => true,
            ))); ?>

            <?php echo $form->textFieldRow($model, 'exam_question_qa_state_id_en', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'exam_question_qa_state_id_es', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'exam_question_qa_state_id_fa', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'exam_question_qa_state_id_hi', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'exam_question_qa_state_id_pt', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'exam_question_qa_state_id_sv', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'exam_question_qa_state_id_cn', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'exam_question_qa_state_id_de', array('maxlength' => 20)); ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>
