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
    </div>
    <div class="span8">
        <?php echo $form->textFieldRow($model, 'first_name', array('maxlength' => 255, 'class' => 'span9')); ?>
        <?php echo $form->textFieldRow($model, 'last_name', array('maxlength' => 255, 'class' => 'span9')); ?>
        <?php echo $form->textFieldRow($model->user, 'username', array('maxlength' => 255, 'class' => 'span9')); ?>
        <label><?php echo CHtml::encode($model->user->getAttributeLabel('password')); ?></label>
        <?php print CHtml::link('Change password', array('user/profile/changepassword', 'returnUrl' => Yii::app()->request->url), array('class' => 'btn uneditable-input')); ?>
        <?php echo $form->textFieldRow($model->user, 'email', array('maxlength' => 255, 'class' => 'span9')); ?>
        <?php echo $form->toggleButtonRow($model, 'others_may_contact_me'); ?>
        <?php //echo $form->checkBoxRow($model, 'others_may_contact_me'); ?>
        <?php echo $form->textFieldRow($model, 'website', array('maxlength' => 255, 'class' => 'span9')); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span8 pull-right">
        <?php echo $form->textAreaRow($model, 'about', array('rows' => 6, 'cols' => 50, 'class' => 'span9')); ?>
        <?php echo $form->textFieldRow($model, 'lives_in', array('maxlength' => 255, 'class' => 'span9')); ?>
    </div>
</div>
