<div class="row">
    <div class="span8"> <!-- main inputs -->


        <?php echo $form->textFieldRow($model, 'title_en', array('maxlength' => 255)); ?>

        <?php
        $input = $this->widget(
            'Relation', array(
            'model' => $model,
            'relation' => 'slideshowFile',
            'fields' => 'itemLabel',
            'allowEmpty' => true,
            'style' => 'dropdownlist',
            'htmlOptions' => array(
                'checkAll' => 'all'),
            )
            , true);
        echo $form->customRow($model, 'slideshow_file_id', $input);
        ?>

        <?php
        $formId = 'presentation-slideshow_file_id-' . \uniqid() . '-form';
        ?>

        <div class="control-group">
            <div class="controls">
                <?php
                echo $this->widget('bootstrap.widgets.TbButton', array(
                    'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Slideshow File'))),
                    'icon' => 'icon-plus',
                    'htmlOptions' => array(
                        'data-toggle' => 'modal',
                        'data-target' => '#' . $formId . '-modal',
                    ),
                    ), true);
                ?>
            </div>
        </div>

        <?php
        $this->beginClip('modal:' . $formId . '-modal');
        $this->renderPartial('/slideshowFile/_modal_form', array(
            'formId' => $formId,
            'inputSelector' => '#Presentation_slideshow_file_id',
            'model' => new SlideshowFile,
            'pk' => 'id',
            'field' => 'itemLabel',
        ));
        $this->endClip();
        ?>


        <?php echo $form->textFieldRow($model, 'title_es', array('maxlength' => 255)); ?>

        <?php echo $form->textFieldRow($model, 'title_fa', array('maxlength' => 255)); ?>

        <?php echo $form->textFieldRow($model, 'title_hi', array('maxlength' => 255)); ?>

        <?php echo $form->textFieldRow($model, 'title_pt', array('maxlength' => 255)); ?>

        <?php echo $form->textFieldRow($model, 'title_sv', array('maxlength' => 255)); ?>

        <?php echo $form->textFieldRow($model, 'title_de', array('maxlength' => 255)); ?>
    </div> <!-- main inputs -->


    <div class="span4"> <!-- sub inputs -->

    </div> <!-- sub inputs -->
</div>
