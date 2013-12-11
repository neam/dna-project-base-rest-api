<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php echo $form->textFieldRow($model, 'version'); ?>

            <?php echo $form->textFieldRow($model, '_title', array(
                'maxlength' => 255,
                'class' => 'slugit-from-1',
            )); ?>

            <?php echo $form->textFieldRow($model, 'slug_en', array(
                'maxlength' => 255,
                'class' => 'slugit-to-1',
            )); ?>

            <?php Html::jsSlugIt(array(
                '.slugit-from-1' => '.slugit-to-1',
            )); ?>

            <?php echo $form->textAreaRow($model, '_about', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'fileMedia',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'file_media_id', $input);
            ?>

            <?php
            $formId = 'data-chunk-file_media_id-' . \uniqid() . '-form';
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
                'inputSelector' => '#DataChunk_file_media_id',
                'model' => new P3Media,
                'pk' => 'id',
                'field' => 'itemLabel',
            ));
            $this->endClip();
            ?>

            <?php echo $form->textAreaRow($model, 'metadata', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

            <?php echo $form->textFieldRow($model, 'owner_id'); ?>

            <?php echo $form->textFieldRow($model, 'node_id', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'slug_es', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_hi', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_pt', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_sv', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_de', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'data_chunk_qa_state_id', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'slug_zh', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_ar', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_bg', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_ca', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_cs', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_da', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_en_gb', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_en_us', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_el', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_fi', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_fil', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_fr', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_hr', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_hu', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_id', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_iw', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_it', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_ja', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_ko', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_lt', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_lv', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_nl', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_no', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_pl', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_pt_br', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_pt_pt', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_ro', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_ru', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_sk', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_sl', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_sr', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_th', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_tr', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_uk', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_vi', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_zh_cn', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_zh_tw', array('maxlength' => 255)); ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>
