<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>
    <div class="row">
        <?php echo $form->label($model, 'user_id'); ?>
        <?php ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'first_name'); ?>
        <?php echo $form->textField($model, 'first_name', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'last_name'); ?>
        <?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'public_profile'); ?>
        <?php echo $form->checkBox($model, 'public_profile'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'picture_media_id'); ?>
        <?php echo $form->textField($model, 'picture_media_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'website'); ?>
        <?php echo $form->textField($model, 'website', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'others_may_contact_me'); ?>
        <?php echo $form->checkBox($model, 'others_may_contact_me'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'about'); ?>
        <?php echo $form->textArea($model, 'about', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'lives_in'); ?>
        <?php echo $form->textField($model, 'lives_in', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_en'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_en'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_es'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_es'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_hi'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_hi'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_pt'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_pt'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_sv'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_sv'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_de'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_de'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_zh'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_zh'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_ar'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_ar'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_bg'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_bg'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_ca'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_ca'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_cs'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_cs'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_da'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_da'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_en_gb'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_en_gb'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_en_us'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_en_us'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_el'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_el'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_fi'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_fi'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_fil'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_fil'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_fr'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_fr'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_hr'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_hr'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_hu'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_hu'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_id'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_iw'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_iw'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_it'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_it'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_ja'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_ja'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_ko'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_ko'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_lt'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_lt'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_lv'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_lv'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_nl'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_nl'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_no'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_no'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_pl'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_pl'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_pt_br'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_pt_br'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_pt_pt'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_pt_pt'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_ro'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_ro'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_ru'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_ru'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_sk'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_sk'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_sl'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_sl'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_sr'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_sr'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_th'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_th'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_tr'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_tr'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_uk'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_uk'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_vi'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_vi'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_zh_cn'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_zh_cn'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'can_translate_to_zh_tw'); ?>
        <?php echo $form->checkBox($model, 'can_translate_to_zh_tw'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
