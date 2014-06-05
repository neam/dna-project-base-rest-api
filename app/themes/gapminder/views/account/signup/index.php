<?php
/* @var AppRegistrationController $this */
/* @var AppRegistrationForm $model */
/* @var AppProfile $profile */
/* @var ProfileField[] $profileFields */
/* @var TbActiveForm $form */
?>
<?php $this->pageTitle = Yii::app()->name . ' - ' . Yii::t('user', 'Registration'); ?>
<div class="registration-controller register-action">
    <div class="row">
        <div class="registration-container">
            <div class="brand-logo">
                <h1 class="registration-heading"><?php echo Html::renderLogoWithLink(Yii::app()->name); ?></h1>
            </div>
            <div class="row">
                <div class="container-left">
                    <div class="container-inner">
                        <?php if (Yii::app()->user->hasFlash('registration')): ?>
                            <div class="success">
                                <?php echo Yii::app()->user->getFlash('registration'); ?>
                            </div>
                        <?php else: ?>
                            <?php $form = $this->beginWidget(
                                '\TbActiveForm',
                                array(
                                    'id' => $this->formId,
                                    'enableAjaxValidation' => true,
                                    'clientOptions' => array(
                                        'validateOnSubmit' => true,
                                    ),
                                )
                            ); ?>
                            <?php echo $form->errorSummary($model); ?>
                            <?php echo $form->textFieldControlGroup($model, 'username'); ?>
                            <?php echo $form->emailFieldControlGroup($model, 'email'); ?>
                            <?php echo $form->passwordFieldControlGroup($model, 'password'); ?>
                            <?php echo $form->passwordFieldControlGroup($model, 'verifyPassword'); ?>
                            <?php if (!empty($profileFields)): ?>
                                <?php foreach ($profileFields as $field): ?>
                                    <?php if ($widgetEdit = $field->widgetEdit($profile)): ?>
                                        <?php echo $widgetEdit; ?>
                                    <?php elseif (!empty($field->range)): ?>
                                        <?php echo $form->dropDownListControlGroup(
                                            $profile,
                                            $field->varname,
                                            UserProfile::range($field->range)
                                        ); ?>
                                    <?php elseif ($field->field_type === 'TEXT'): ?>
                                        <?php echo $form->textAreaControlGroup(
                                            $profile,
                                            $field->varname,
                                            array(
                                                'rows' => 6,
                                                'cols' => 50,
                                            )
                                        ); ?>
                                    <?php else: ?>
                                        <?php echo $form->textFieldControlGroup(
                                            $profile,
                                            $field->varname,
                                            array(
                                                'size' => 60,
                                                'maxlength' => !empty($field->field_size) ? $field->field_size : 255,
                                            )
                                        ); ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <div class="captcha">
                                <?php // TODO: Implement Captcha. ?>
                            </div>
                            <?php //echo $form->checkBoxControlGroup($model, 'acceptTerms'); // TODO: Implement this. ?>
                            <div class="form-actions">
                                <?php echo TbHtml::submitButton(
                                    Yii::t('app', 'Next'),
                                    array(
                                        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'size' => TbHtml::BUTTON_SIZE_LARGE,
                                    )
                                ); ?>
                            </div>
                            <?php $this->endWidget(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="container-right">
                    <p><?php echo Yii::t('app', 'Thank you for deciding to join the Gapminder community!'); ?></p>
                    <p><?php echo Yii::t('app', 'By joining, you will get'); ?></p>
                    <div class="benefits">
                        <div class="row">
                            <div class="benefit">
                                <div class="row">
                                    <div class="benefit-image">
                                        <?php echo TbHtml::image('http://placehold.it/90x60'); ?>
                                    </div>
                                    <div class="benefit-description">
                                        <?php echo Yii::t('user', 'Benefit #1'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="benefit">
                                <div class="row">
                                    <div class="benefit-image">
                                        <?php echo TbHtml::image('http://placehold.it/90x60'); ?>
                                    </div>
                                    <div class="benefit-description">
                                        <?php echo Yii::t('user', 'Benefit #2'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="benefit">
                                <div class="row">
                                    <div class="benefit-image">
                                        <?php echo TbHtml::image('http://placehold.it/90x60'); ?>
                                    </div>
                                    <div class="benefit-description">
                                        <?php echo Yii::t('user', 'Benefit #3'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
