<?php /** @var Profiles $model */ ?>

<div class="row-fluid">
    <div class="span4">
        <?php
            $relation = 'pictureMedia';
            $attribute = 'picture_media_id';
            $step = 'profile';
            $mimeTypes = array('image/jpeg', 'image/png');
            $this->renderPartial('//p3Media/_select', compact('model', 'form', 'relation', 'attribute', 'step', 'mimeTypes'));
        ?>
        <h3><?php echo Yii::t('app','Languages'); ?> <?php echo Html::hintTooltip(Yii::t('app', 'Please list the languages you can help us translate into (sorted by proficiency).')); ?></h3>
        <div class="row-fluid">
            <?php echo TbHtml::dropDownListControlGroup('language[0]', $model->getTranslatableLanguage(0), Html::getLanguages(), array(
                'label' => Yii::t('app', 'Language #1'),
                'class' => 'span12',
                'empty' => Yii::t('app', '- None -'),
            )); ?>
            <?php echo TbHtml::dropDownListControlGroup('language[1]', $model->getTranslatableLanguage(1), Html::getLanguages(), array(
                'label' => Yii::t('app', 'Language #2'),
                'class' => 'span12',
                'empty' => Yii::t('app', '- None -'),
            )); ?>
            <?php echo TbHtml::dropDownListControlGroup('language[2]', $model->getTranslatableLanguage(2), Html::getLanguages(), array(
                'label' => Yii::t('app', 'Language #3'),
                'class' => 'span12',
                'empty' => Yii::t('app', '- None -'),
            )); ?>
        </div>
    </div>
    <div class="span7 offset1">
        <?php echo $form->textFieldRow($model, 'first_name', array('maxlength' => 255, 'class' => 'span9')); ?>
        <?php echo $form->textFieldRow($model, 'last_name', array('maxlength' => 255, 'class' => 'span9')); ?>
        <?php echo $form->textFieldRow($model->account, 'username', array('maxlength' => 255, 'class' => 'span9')); ?>
        <label><?php echo CHtml::encode($model->account->getAttributeLabel('password')); ?></label>
        <?php print CHtml::link('Change password', array('user/profile/changepassword', 'returnUrl' => Yii::app()->request->url), array('class' => 'btn uneditable-input')); ?>
        <?php echo $form->textFieldRow($model->account, 'email', array('maxlength' => 255, 'class' => 'span9')); ?>
        <?php echo $form->toggleButtonRow($model, 'others_may_contact_me'); ?>
        <?php //echo $form->checkBoxRow($model, 'others_may_contact_me'); ?>
        <?php echo $form->textFieldRow($model, 'website', array('maxlength' => 255, 'class' => 'span9')); ?>
        <?php echo $form->textAreaRow($model, 'about', array('rows' => 6, 'cols' => 50, 'class' => 'span9')); ?>
        <?php echo $form->textFieldRow($model, 'lives_in', array('maxlength' => 255, 'class' => 'span9')); ?>
    </div>
</div>
