<div class="wide form">

    <?php
    $form = $this->beginWidget('\TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>
    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'version'); ?>
        <?php echo $form->textField($model, 'version'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'cloned_from_id'); ?>
        <?php echo $form->textField($model, 'cloned_from_id', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, '_title'); ?>
        <?php echo $form->textField($model, '_title', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_en'); ?>
        <?php echo $form->textField($model, 'slug_en', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, '_about'); ?>
        <?php echo $form->textArea($model, '_about', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'original_media_id'); ?>
        <?php echo $form->textField($model, 'original_media_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'generate_processed_media'); ?>
        <?php echo $form->checkBox($model, 'generate_processed_media'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_en'); ?>
        <?php echo $form->textField($model, 'processed_media_id_en'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'created'); ?>
        <?php echo $form->textField($model, 'created'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'modified'); ?>
        <?php echo $form->textField($model, 'modified'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'owner_id'); ?>
        <?php echo $form->textField($model, 'owner_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'node_id'); ?>
        <?php echo $form->textField($model, 'node_id', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_es'); ?>
        <?php echo $form->textField($model, 'processed_media_id_es'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_hi'); ?>
        <?php echo $form->textField($model, 'processed_media_id_hi'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_pt'); ?>
        <?php echo $form->textField($model, 'processed_media_id_pt'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_sv'); ?>
        <?php echo $form->textField($model, 'processed_media_id_sv'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_de'); ?>
        <?php echo $form->textField($model, 'processed_media_id_de'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_es'); ?>
        <?php echo $form->textField($model, 'slug_es', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_hi'); ?>
        <?php echo $form->textField($model, 'slug_hi', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_pt'); ?>
        <?php echo $form->textField($model, 'slug_pt', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_sv'); ?>
        <?php echo $form->textField($model, 'slug_sv', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_de'); ?>
        <?php echo $form->textField($model, 'slug_de', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'text_doc_qa_state_id'); ?>
        <?php echo $form->textField($model, 'text_doc_qa_state_id', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_zh'); ?>
        <?php echo $form->textField($model, 'slug_zh', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_ar'); ?>
        <?php echo $form->textField($model, 'slug_ar', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_bg'); ?>
        <?php echo $form->textField($model, 'slug_bg', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_ca'); ?>
        <?php echo $form->textField($model, 'slug_ca', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_cs'); ?>
        <?php echo $form->textField($model, 'slug_cs', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_da'); ?>
        <?php echo $form->textField($model, 'slug_da', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_en_gb'); ?>
        <?php echo $form->textField($model, 'slug_en_gb', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_en_us'); ?>
        <?php echo $form->textField($model, 'slug_en_us', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_el'); ?>
        <?php echo $form->textField($model, 'slug_el', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_fi'); ?>
        <?php echo $form->textField($model, 'slug_fi', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_fil'); ?>
        <?php echo $form->textField($model, 'slug_fil', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_fr'); ?>
        <?php echo $form->textField($model, 'slug_fr', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_hr'); ?>
        <?php echo $form->textField($model, 'slug_hr', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_hu'); ?>
        <?php echo $form->textField($model, 'slug_hu', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_id'); ?>
        <?php echo $form->textField($model, 'slug_id', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_iw'); ?>
        <?php echo $form->textField($model, 'slug_iw', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_it'); ?>
        <?php echo $form->textField($model, 'slug_it', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_ja'); ?>
        <?php echo $form->textField($model, 'slug_ja', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_ko'); ?>
        <?php echo $form->textField($model, 'slug_ko', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_lt'); ?>
        <?php echo $form->textField($model, 'slug_lt', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_lv'); ?>
        <?php echo $form->textField($model, 'slug_lv', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_nl'); ?>
        <?php echo $form->textField($model, 'slug_nl', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_no'); ?>
        <?php echo $form->textField($model, 'slug_no', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_pl'); ?>
        <?php echo $form->textField($model, 'slug_pl', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_pt_br'); ?>
        <?php echo $form->textField($model, 'slug_pt_br', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_pt_pt'); ?>
        <?php echo $form->textField($model, 'slug_pt_pt', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_ro'); ?>
        <?php echo $form->textField($model, 'slug_ro', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_ru'); ?>
        <?php echo $form->textField($model, 'slug_ru', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_sk'); ?>
        <?php echo $form->textField($model, 'slug_sk', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_sl'); ?>
        <?php echo $form->textField($model, 'slug_sl', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_sr'); ?>
        <?php echo $form->textField($model, 'slug_sr', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_th'); ?>
        <?php echo $form->textField($model, 'slug_th', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_tr'); ?>
        <?php echo $form->textField($model, 'slug_tr', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_uk'); ?>
        <?php echo $form->textField($model, 'slug_uk', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_vi'); ?>
        <?php echo $form->textField($model, 'slug_vi', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_zh_cn'); ?>
        <?php echo $form->textField($model, 'slug_zh_cn', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_zh_tw'); ?>
        <?php echo $form->textField($model, 'slug_zh_tw', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_zh'); ?>
        <?php echo $form->textField($model, 'processed_media_id_zh'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_ar'); ?>
        <?php echo $form->textField($model, 'processed_media_id_ar'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_bg'); ?>
        <?php echo $form->textField($model, 'processed_media_id_bg'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_ca'); ?>
        <?php echo $form->textField($model, 'processed_media_id_ca'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_cs'); ?>
        <?php echo $form->textField($model, 'processed_media_id_cs'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_da'); ?>
        <?php echo $form->textField($model, 'processed_media_id_da'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_en_gb'); ?>
        <?php echo $form->textField($model, 'processed_media_id_en_gb'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_en_us'); ?>
        <?php echo $form->textField($model, 'processed_media_id_en_us'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_el'); ?>
        <?php echo $form->textField($model, 'processed_media_id_el'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_fi'); ?>
        <?php echo $form->textField($model, 'processed_media_id_fi'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_fil'); ?>
        <?php echo $form->textField($model, 'processed_media_id_fil'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_fr'); ?>
        <?php echo $form->textField($model, 'processed_media_id_fr'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_hr'); ?>
        <?php echo $form->textField($model, 'processed_media_id_hr'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_hu'); ?>
        <?php echo $form->textField($model, 'processed_media_id_hu'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_id'); ?>
        <?php echo $form->textField($model, 'processed_media_id_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_iw'); ?>
        <?php echo $form->textField($model, 'processed_media_id_iw'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_it'); ?>
        <?php echo $form->textField($model, 'processed_media_id_it'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_ja'); ?>
        <?php echo $form->textField($model, 'processed_media_id_ja'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_ko'); ?>
        <?php echo $form->textField($model, 'processed_media_id_ko'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_lt'); ?>
        <?php echo $form->textField($model, 'processed_media_id_lt'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_lv'); ?>
        <?php echo $form->textField($model, 'processed_media_id_lv'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_nl'); ?>
        <?php echo $form->textField($model, 'processed_media_id_nl'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_no'); ?>
        <?php echo $form->textField($model, 'processed_media_id_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_pl'); ?>
        <?php echo $form->textField($model, 'processed_media_id_pl'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_pt_br'); ?>
        <?php echo $form->textField($model, 'processed_media_id_pt_br'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_pt_pt'); ?>
        <?php echo $form->textField($model, 'processed_media_id_pt_pt'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_ro'); ?>
        <?php echo $form->textField($model, 'processed_media_id_ro'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_ru'); ?>
        <?php echo $form->textField($model, 'processed_media_id_ru'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_sk'); ?>
        <?php echo $form->textField($model, 'processed_media_id_sk'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_sl'); ?>
        <?php echo $form->textField($model, 'processed_media_id_sl'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_sr'); ?>
        <?php echo $form->textField($model, 'processed_media_id_sr'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_th'); ?>
        <?php echo $form->textField($model, 'processed_media_id_th'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_tr'); ?>
        <?php echo $form->textField($model, 'processed_media_id_tr'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_uk'); ?>
        <?php echo $form->textField($model, 'processed_media_id_uk'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_vi'); ?>
        <?php echo $form->textField($model, 'processed_media_id_vi'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_zh_cn'); ?>
        <?php echo $form->textField($model, 'processed_media_id_zh_cn'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_zh_tw'); ?>
        <?php echo $form->textField($model, 'processed_media_id_zh_tw'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
