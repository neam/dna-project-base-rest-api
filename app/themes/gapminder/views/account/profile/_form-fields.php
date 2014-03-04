<?php /** @var Profiles $model */ ?>
<?php /** @var AppActiveForm $form */ ?>
<div class="fields-left">
    <?php
    // TODO: Fix this.
    $relation = 'pictureMedia';
    $attribute = 'picture_media_id';
    $step = 'profile';
    $mimeTypes = array('image/jpeg', 'image/png');
    //$this->renderPartial('//p3Media/_select', compact('model', 'form', 'relation', 'attribute', 'step', 'mimeTypes'));
    ?>
    <h3><?php echo Yii::t('app', 'Languages'); ?> <?php echo Html::hintTooltip(Yii::t('app', 'Please list the languages you can help us translate into (sorted by proficiency).')); ?></h3>

    <div class="row-fluid">
        <?php $this->widget('frontend.widgets.SelectProfileLanguage.SelectProfileLanguage', array(
            'model' => $model,
            'attributes' => array(
                'language1',
                'language2',
                'language3',
            ),
            'form' => $form,
            'htmlOptions' => array(
                'class' => 'span12',
            ),
        )); ?>
    </div>
</div>
<div class="fields-right">
    <?php echo $form->textFieldControlGroup($model, 'first_name', array('maxlength' => 255, 'class' => 'span9')); ?>
    <?php echo $form->textFieldControlGroup($model, 'last_name', array('maxlength' => 255, 'class' => 'span9')); ?>
    <?php echo $form->textFieldControlGroup($model->account, 'username', array('maxlength' => 255, 'class' => 'span9')); ?>
    <label><?php echo CHtml::encode($model->account->getAttributeLabel('password')); ?></label>
    <?php print CHtml::link('Change password', array('user/profile/changepassword', 'returnUrl' => Yii::app()->request->url), array('class' => 'btn uneditable-input')); ?>
    <?php echo $form->textFieldControlGroup($model->account, 'email', array('maxlength' => 255, 'class' => 'span9')); ?>
    <?php
    // todo: fix toggle button control groups
    //echo $form->toggleButtonControlGroup($model, 'others_may_contact_me'); ?>
    <?php //echo $form->checkBoxControlGroup($model, 'others_may_contact_me'); ?>
    <?php echo $form->textFieldControlGroup($model, 'website', array('maxlength' => 255, 'class' => 'span9')); ?>
    <?php echo $form->textAreaControlGroup($model, 'about', array('ControlGroups' => 6, 'cols' => 50, 'class' => 'span9')); ?>
    <?php echo $form->textFieldControlGroup($model, 'lives_in', array('maxlength' => 255, 'class' => 'span9')); ?>
</div>