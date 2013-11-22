<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php echo $form->textFieldRow($model, 'version'); ?>

            <?php echo $form->textFieldRow($model, '_title', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_en', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, '_question', array('maxlength' => 255)); ?>

            <?php echo $form->textAreaRow($model, '_description', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'thumbnailMedia',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'thumbnail_media_id', $input);
            ?>

            <?php
            $formId = 'exercise-thumbnail_media_id-' . \uniqid() . '-form';
            ?>

            <div class="control-group">
                <div class="controls">
                    <?php
                    echo $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => Yii::t('model', 'Create {model}', array('{model}' => Yii::t('model', 'P3 Media'))),
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
            $this->renderPartial('//p3Media/_modal_form', array(
                'formId' => $formId,
                'inputSelector' => '#Exercise_thumbnail_media_id',
                'model' => new P3Media,
                'pk' => 'id',
                'field' => 'itemLabel',
            ));
            $this->endClip();
            ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'slideshowFile',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'slideshow_file_id', $input);
            ?>

            <?php
            $formId = 'exercise-slideshow_file_id-' . \uniqid() . '-form';
            ?>

            <div class="control-group">
                <div class="controls">
                    <?php
                    echo $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => Yii::t('model', 'Create {model}', array('{model}' => Yii::t('model', 'Slideshow File'))),
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
            $this->renderPartial('//slideshowFile/_modal_form', array(
                'formId' => $formId,
                'inputSelector' => '#Exercise_slideshow_file_id',
                'model' => new SlideshowFile,
                'pk' => 'id',
                'field' => 'itemLabel',
            ));
            $this->endClip();
            ?>

            <?php echo $form->textFieldRow($model, 'owner_id'); ?>

            <?php echo $form->textFieldRow($model, 'node_id', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'slug_es', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_fa', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_hi', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_pt', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_sv', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_cn', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_de', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'exercise_qa_state_id_en', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'exercise_qa_state_id_es', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'exercise_qa_state_id_fa', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'exercise_qa_state_id_hi', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'exercise_qa_state_id_pt', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'exercise_qa_state_id_sv', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'exercise_qa_state_id_cn', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'exercise_qa_state_id_de', array('maxlength' => 20)); ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>
