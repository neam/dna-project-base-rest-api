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

    <?php echo $form->dropDownListRow($model, 'language1', Html::getLanguages(), array(
        'empty' => Yii::t('app', '- None -'),
    )); ?>

    <?php echo $form->dropDownListRow($model, 'language2', Html::getLanguages(), array(
        'empty' => Yii::t('app', '- None -'),
    )); ?>

    <?php echo $form->dropDownListRow($model, 'language3', Html::getLanguages(), array(
        'empty' => Yii::t('app', '- None -'),
    )); ?>

    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
