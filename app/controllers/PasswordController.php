<?php

use nordsoftware\yii_account\helpers\Helper;
use nordsoftware\yii_account\models\ar\AccountToken;
use nordsoftware\yii_account\Module;

class PasswordController extends \nordsoftware\yii_account\controllers\PasswordController
{
    /**
     * Displays the 'forgot password' page.
     */
    public function actionForgot()
    {
        $modelClass = $this->module->getClassName(Module::CLASS_FORGOT_PASSWORD_FORM);

        /** @var \nordsoftware\yii_account\models\form\ForgotPasswordForm $model */
        $model = new $modelClass();

        $request = \Yii::app()->request;

        $this->runAjaxValidation($model, $this->forgotFormId);

        if ($request->isPostRequest) {
            $model->attributes = $request->getPost(Helper::classNameToPostKey($modelClass));

            if ($model->validate()) {
                $accountClass = $this->module->getClassName(Module::CLASS_ACCOUNT);

                /** @var \nordsoftware\yii_account\models\ar\Account $account */
                $account = \CActiveRecord::model($accountClass)->findByAttributes(array('email' => $model->email));

                $token = $this->module->generateToken(Module::TOKEN_RESET_PASSWORD, $account->id);

                $resetUrl = $this->createAbsoluteUrl('/account/password/reset', array('token' => $token));

                $fromEmail = Yii::app()->params['signupEmail'];
                $fromName = Yii::t('app', 'Gapminder Community');

                $config = array();
                $config['from'] = $fromEmail;

                $config['headers'] = array();
                $config['headers'][] = 'From: ' . "$fromName <$fromEmail>";
                $config['headers'][] = 'Reply-To: ' . "$fromName <$fromEmail>";

                $this->module->sendMail(
                    $account->email,
                    $this->emailSubject,
                    $this->renderPartial(
                        'application.views.email.resetPassword',
                        array(
                            'resetUrl' => $resetUrl,
                            'username' => $account->username,
                        ),
                        true
                    ),
                    $config
                );

                $this->redirect('sent');
            }
        }

        $this->render('application.views.account.password.forgot', array('model' => $model));
    }

    /**
     * Renders the forgot password confirmation page (email sent).
     */
    public function actionSent()
    {
        $this->layout = WebApplication::LAYOUT_NARROW;
        $this->render('application.views.password.sent');
    }
}
