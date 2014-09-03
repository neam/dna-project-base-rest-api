<?php
/* @var \nordsoftware\yii_account\controllers\SignupController $this */
/* @var \nordsoftware\yii_account\models\form\SignupForm $model */
/* @var Profile $profile */
/* @var TbActiveForm $form */
?>
<?php $this->pageTitle = Yii::app()->name . ' - ' . Yii::t('user', 'Registration'); ?>
<div class="signup-controller index-action">
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
                                )
                            ); ?>
                            <?php echo $form->errorSummary($model); ?>
                            <?php echo $form->textFieldControlGroup($model, 'username'); ?>
                            <?php echo $form->emailFieldControlGroup($model, 'email'); ?>
                            <?php echo $form->passwordFieldControlGroup($model, 'password'); ?>
                            <?php echo $form->passwordFieldControlGroup($model, 'verifyPassword'); ?>
                            <?php echo $form->checkBoxControlGroup(
                                $model,
                                'acceptTerms',
                                array(
                                    'help' => Yii::app()->renderPageLink('View the terms and conditions', 'terms'),
                                )
                            ); ?>
                            <div class="captcha">
                                <?php // TODO: Implement Captcha. ?>
                            </div>
                            <div class="form-actions">
                                <?php echo TbHtml::submitButton(
                                    Yii::t('app', 'Next'),
                                    array(
                                        'id' => 'signup-submit',
                                        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                        'size' => TbHtml::BUTTON_SIZE_LARGE,
                                    )
                                ); ?>
                            </div>
                            <?php $this->endWidget(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="container-right hidden-xs">
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
