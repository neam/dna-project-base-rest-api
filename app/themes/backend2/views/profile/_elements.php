<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php echo $form->textFieldRow($model, 'first_name', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'last_name', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'public_profile'); ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'pictureMedia',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customControlGroup($model, 'picture_media_id', $input);
            ?>

            <?php
            $formId = 'profile-picture_media_id-' . \uniqid() . '-form';
            ?>

            <div class="control-group">
                <div class="controls">
                    <?php
                    echo $this->widget('\TbButton', array(
                        'label' => Yii::t('model', 'Create {model}', array('{model}' => Yii::t('model', 'P3 Media'))),
                        'icon' => 'glyphicon-plus',
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
                'inputSelector' => '#Profile_picture_media_id',
                'model' => new P3Media,
                'pk' => 'id',
                'field' => 'itemLabel',
            ));
            $this->endClip();
            ?>

            <?php echo $form->textFieldRow($model, 'website', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'others_may_contact_me'); ?>

            <?php echo $form->textAreaRow($model, 'about', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

            <?php echo $form->textFieldRow($model, 'lives_in', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'language1', array('maxlength' => 10)); ?>

            <?php echo $form->textFieldRow($model, 'language2', array('maxlength' => 10)); ?>

            <?php echo $form->textFieldRow($model, 'language3', array('maxlength' => 10)); ?>

            <?php echo $form->textFieldRow($model, 'language4', array('maxlength' => 10)); ?>

            <?php echo $form->textFieldRow($model, 'language5', array('maxlength' => 10)); ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>
