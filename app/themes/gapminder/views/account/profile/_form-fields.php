<?php /** @var Profile $model */ ?>
<?php /** @var AppActiveForm|TbActiveForm $form */ ?>
<div class="fields-left">
    <div class="profile-picture">
        <div class="picture-select">
            <?php echo $form->select2ControlGroup(
                $model,
                'picture_media_id',
                $model->getPictureOptions(),
                array(
                    'empty' => Yii::t('app', 'None'),
                )
            ); ?>
        </div>
        <div class="picture-upload">
            <label class="control-label"><?php echo Yii::t('account', '&nbsp;'); ?></label>
            <div>
                <?php echo TbHtml::button(
                    Yii::t('app', 'Upload new'),
                    array(
                        'block' => true,
                        'class' => 'upload-btn',
                        'data-toggle' => 'modal',
                        'data-target' => '#' . $form->id . '-modal',
                    )
                ); ?>
            </div>
        </div>
    </div>
    <?php $this->renderPartial(
        '//p3Media/_modal_form',
        array(
            'formId' => $form->id,
            'inputSelector' => "#Profile_original_media_id",
            'model' => new P3Media(),
            'pk' => 'id',
            'field' => 'itemLabel',
        )
    ); ?>
    <h3 class="fields-heading"><?php echo Yii::t('app', 'Languages'); ?> <?php echo Html::hintTooltip(Yii::t('app', 'Please list the languages you can help us translate into (sorted by proficiency).')); ?></h3>
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
    <div class="username-and-password">
        <div class="username">
            <?php echo $form->textFieldControlGroup(
                $model->account,
                'username',
                array(
                    'class' => 'span9',
                    'maxlength' => 255,
                )
            ); ?>
        </div>
        <div class="password">
            <div class="form-group">
                <label class="control-label"><?php echo Yii::t('account', '&nbsp;'); ?></label>
                <div>
                    <?php echo TbHtml::linkButton(
                        Yii::t('account', 'Change password'),
                        array(
                            'block' => true,
                            'url' => array('user/profile/changepassword', 'returnUrl' => Yii::app()->request->url),
                        )
                    ); ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo $form->textFieldControlGroup($model->account, 'email', array('maxlength' => 255, 'class' => 'span9')); ?>
    <?php echo $form->checkBoxControlGroup($model, 'others_may_contact_me'); ?>
    <?php echo $form->textFieldControlGroup($model, 'website', array('maxlength' => 255, 'class' => 'span9')); ?>
    <?php echo $form->textAreaControlGroup($model, 'about', array('ControlGroups' => 6, 'cols' => 50, 'class' => 'span9')); ?>
    <?php echo $form->textFieldControlGroup($model, 'lives_in', array('maxlength' => 255, 'class' => 'span9')); ?>
</div>
