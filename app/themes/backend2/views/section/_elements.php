<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'page',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'page_id', $input);
            ?>

            <?php
            $formId = 'section-page_id-' . \uniqid() . '-form';
            ?>

            <div class="control-group">
                <div class="controls">
                    <?php
                    echo $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => Yii::t('model', 'Create {model}', array('{model}' => Yii::t('model', 'Page'))),
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
            $this->renderPartial('//page/_modal_form', array(
                'formId' => $formId,
                'inputSelector' => '#Section_page_id',
                'model' => new Page,
                'pk' => 'id',
                'field' => 'itemLabel',
            ));
            $this->endClip();
            ?>

            <?php echo $form->textFieldRow($model, '_title', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_en', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'ordinal'); ?>

            <?php echo $form->textFieldRow($model, '_menu_label', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'node_id', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'slug_es', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_fa', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_hi', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_pt', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_sv', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_cn', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_de', array('maxlength' => 255)); ?>
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
