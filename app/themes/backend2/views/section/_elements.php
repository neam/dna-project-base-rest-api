<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php echo $form->textFieldRow($model, 'version'); ?>

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
                    echo $this->widget('\TbButton', array(
                        'label' => Yii::t('model', 'Create {model}', array('{model}' => Yii::t('model', 'Page'))),
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

            <?php echo $form->textFieldRow($model, '_menu_label', array('maxlength' => 255)); ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'owner',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'owner_id', $input);
            ?>

            <?php
            $formId = 'section-owner_id-' . \uniqid() . '-form';
            ?>

            <div class="control-group">
                <div class="controls">
                    <?php
                    echo $this->widget('\TbButton', array(
                        'label' => Yii::t('model', 'Create {model}', array('{model}' => Yii::t('model', 'Account'))),
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
            $this->renderPartial('//account/_modal_form', array(
                'formId' => $formId,
                'inputSelector' => '#Section_owner_id',
                'model' => new Account,
                'pk' => 'id',
                'field' => 'itemLabel',
            ));
            $this->endClip();
            ?>

            <?php echo $form->textFieldRow($model, 'node_id', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'slug_es', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_hi', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_pt', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_sv', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_de', array('maxlength' => 255)); ?>

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

            <?php echo $form->textFieldRow($model, 'section_qa_state_id', array('maxlength' => 20)); ?>
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
            <?php echo Yii::t('model', 'dataArticles'); ?>
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
