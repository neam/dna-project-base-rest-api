<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'chapter',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'chapter_id', $input);
            ?>

            <?php
            $formId = 'section-chapter_id-' . \uniqid() . '-form';
            ?>

            <div class="control-group">
                <div class="controls">
                    <?php
                    echo $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => Yii::t('model', 'Create {model}', array('{model}' => Yii::t('model', 'Chapter'))),
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
            $this->renderPartial('//chapter/_modal_form', array(
                'formId' => $formId,
                'inputSelector' => '#Section_chapter_id',
                'model' => new Chapter,
                'pk' => 'id',
                'field' => 'itemLabel',
            ));
            $this->endClip();
            ?>

            <?php echo $form->textFieldRow($model, 'title_en', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_en', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'ordinal'); ?>

            <?php echo $form->textFieldRow($model, 'menu_label_en', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'node_id', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'title_es', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_fa', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_hi', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_pt', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_sv', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_cn', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_de', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_es', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_fa', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_hi', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_pt', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_sv', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_cn', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_de', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'menu_label_es', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'menu_label_fa', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'menu_label_hi', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'menu_label_pt', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'menu_label_sv', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'menu_label_cn', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'menu_label_de', array('maxlength' => 255)); ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

        <h3>
            <?php echo Yii::t('model', 'htmlChunks'); ?>
        </h3>
        <?php ?>

        <h3>
            <?php echo Yii::t('model', 'snapshots'); ?>
        </h3>
        <?php ?>

        <h3>
            <?php echo Yii::t('model', 'videoFiles'); ?>
        </h3>
        <?php ?>

        <h3>
            <?php echo Yii::t('model', 'teachersGuides'); ?>
        </h3>
        <?php ?>

        <h3>
            <?php echo Yii::t('model', 'exercises'); ?>
        </h3>
        <?php ?>

        <h3>
            <?php echo Yii::t('model', 'slideshoFiles'); ?>
        </h3>
        <?php ?>

        <h3>
            <?php echo Yii::t('model', 'dataChunks'); ?>
        </h3>
        <?php ?>

        <h3>
            <?php echo Yii::t('model', 'downloadLinks'); ?>
        </h3>
        <?php ?>

        <h3>
            <?php echo Yii::t('model', 'examQuestions'); ?>
        </h3>
        <?php ?>

    </div>
    <!-- sub inputs -->
</div>
