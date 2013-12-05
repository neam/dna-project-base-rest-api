<?php /** @var Profiles $model */ ?>

<div class='row'>
    <div class='span4'>
        <?php
            $relation = 'pictureMedia';
            $attribute = 'picture_media_id';
            $step = 'profile';
            $mimeTypes = array('image/jpeg', 'image/png');
            $this->renderPartial('//p3Media/_select', compact('model', 'form', 'relation', 'attribute', 'step', 'mimeTypes'));
        ?>
    </div>
    <div class='span4'>
        <?php echo $form->textFieldRow($model, 'first_name', array('maxlength' => 255, 'class' => 'span4')); ?>
        <?php echo $form->textFieldRow($model, 'last_name', array('maxlength' => 255, 'class' => 'span4')); ?>
        <?php echo $form->textFieldRow($model->user, 'username', array('maxlength' => 255, 'class' => 'span4')); ?>
        <label><?php echo CHtml::encode($model->user->getAttributeLabel('password')); ?></label>
        <?php print CHtml::link('Change password', array('user/profile/changepassword', 'returnUrl' => Yii::app()->request->url), array('class' => 'btn uneditable-input')); ?>
        <?php echo $form->textFieldRow($model->user, 'email', array('maxlength' => 255, 'class' => 'span4')); ?>
        <?php echo $form->toggleButtonRow($model, 'others_may_contact_me'); ?>
        <?php //echo $form->checkBoxRow($model, 'others_may_contact_me'); ?>
        <?php echo $form->textFieldRow($model, 'website', array('maxlength' => 255, 'class' => 'span4')); ?>
    </div>
</div>
<div class='row'>
    <div class='span8'>
        <?php echo $form->textAreaRow($model, 'about', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
        <?php echo $form->textFieldRow($model, 'lives_in', array('maxlength' => 255, 'class' => 'span8')); ?>
        <div class='form-actions'>
            <div class='btn-toolbar pull-right'>
                <div class='btn-group'>
                    <?php echo CHtml::submitButton(Yii::t('model', 'Save'), array(
                        'class' => 'btn btn-primary btn-dirtyforms',
                    )); ?>
                    <?php $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => Yii::t('model', 'Undo'),
                        'url' => Yii::app()->request->url,
                        'htmlOptions' => array(
                            'class' => 'btn-dirtyforms',
                        ),
                    )); ?>
                </div>
            </div>
        </div>
    </div>
</div>
