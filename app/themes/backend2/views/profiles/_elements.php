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
            echo $form->customRow($model, 'picture_media_id', $input);
            ?>

            <?php
            $formId = 'profiles-picture_media_id-' . \uniqid() . '-form';
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
                'inputSelector' => '#Profiles_picture_media_id',
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

            <?php echo $form->textFieldRow($model, 'can_translate_to_en'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_es'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_hi'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_pt'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_sv'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_de'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_zh'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_ar'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_bg'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_ca'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_cs'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_da'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_en_gb'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_en_us'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_el'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_fi'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_fil'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_fr'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_hr'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_hu'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_id'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_iw'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_it'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_ja'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_ko'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_lt'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_lv'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_nl'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_no'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_pl'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_pt_br'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_pt_pt'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_ro'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_ru'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_sk'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_sl'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_sr'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_th'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_tr'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_uk'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_vi'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_zh_cn'); ?>

            <?php echo $form->textFieldRow($model, 'can_translate_to_zh_tw'); ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>
