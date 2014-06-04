<?php
/* @var \nordsoftware\yii_account\controllers\AuthenticateController $this */
/* @var \nordsoftware\yii_account\models\form\LoginForm $model */
?>
<?php $this->pageTitle = Yii::app()->name . ' - ' . Yii::t('user', 'Login'); ?>
<div class="login-controller login-action">
    <div class="row">
        <div class="form-container">
            <div class="brand-logo">
                <?php echo Html::renderLogoWithLink(); ?>
            </div>

            <div class="container-lead">
                <h1 class="login-heading"><?php echo Yii::t('user', 'Please login with your account credentials'); ?></h1>
            </div>

            <?php if (Yii::app()->user->hasFlash('loginMessage')): ?>
                <div class="success">
                    <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
                </div>
            <?php endif; ?>

            <?php echo TbHtml::beginForm('', 'post', array('id' => $this->loginFormId)); ?>

            <?php echo TbHtml::errorSummary($model); ?>
            <?php echo TbHtml::activeTextFieldControlGroup($model, 'username'); ?>
            <?php echo TbHtml::activePasswordFieldControlGroup($model, 'password'); ?>
            <?php $this->widget(
                'yiistrap.widgets.TbNav',
                array(
                    'type' => TbHtml::NAV_TYPE_PILLS,
                    'items' => array(
                        array('label' => 'Register', 'url' => array('/account/register')),
                        array('label' => 'Forgot your password?', 'url' => array('/account/password/forgot')),
                    ),
                )
            ); ?>
            <?php echo TbHtml::activeCheckBoxControlGroup($model, 'stayLoggedIn'); ?>
            <?php echo TbHtml::formActions(array(
                TbHtml::submitButton(
                    Yii::t('app', 'Login'),
                    array(
                        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                        'size' => TbHtml::BUTTON_SIZE_LARGE,
                    )
                ),
                TbHtml::resetButton(
                    'Reset',
                    array(
                        'color' => TbHtml::BUTTON_COLOR_LINK,
                        'size' => TbHtml::BUTTON_SIZE_LARGE,
                    )
                ),
            )); ?>
            <?php echo TbHtml::endForm(); ?>

            <?php $form = new CForm(array(
                'elements' => array(
                    'username' => array(
                        'type' => 'text',
                        'maxlength' => 32,
                    ),
                    'password' => array(
                        'type' => 'password',
                        'maxlength' => 32,
                    ),
                    'rememberMe' => array(
                        'type' => 'checkbox',
                    )
                ),

                'buttons' => array(
                    'login' => array(
                        'type' => 'submit',
                        'label' => 'Login',
                    ),
                ),
            ), $model); ?>
        </div>
    </div>
</div>