<?php

use nordsoftware\yii_account\helpers\Helper;
use nordsoftware\yii_account\Module;

class PasswordController extends \nordsoftware\yii_account\controllers\PasswordController
{
    /**
     * @inheritDoc
     */
    public function filters()
    {
        return array(
            'accessControl',
            'ensureToken + reset, change',
        );
    }

    /**
     * @inheritDoc
     */
    public function accessRules()
    {
        return array(
            // Not logged in users can do the following actions.
            array(
                'allow',
                'actions' => array(
                    'forgot',
                    'reset',
                )
            ),
            // Logged in users can do whatever they want to.
            array('allow', 'users' => array('@')),
            // Not logged in users can't do anything except above.
            array('deny'),
        );
    }

    /**
     * @inheritDoc
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
     * Displays the 'Change password' page.
     *
     * This method works as a middle man for 'account/password/change' in order to provide the required access token.
     * This method is not be accessible to anonymous users.
     *
     * @see \PasswordController::accessRules()
     * @throws CHttpException
     */
    public function actionExchange()
    {
        $accountClass = $this->module->getClassName(Module::CLASS_ACCOUNT);
        /** @var \nordsoftware\yii_account\models\ar\Account $account */
        $account = \CActiveRecord::model($accountClass)->findByPk(Yii::app()->user->id);
        if ($account === null) {
            throw new CHttpException(404, Yii::t('model', 'The requested page does not exist.'));
        }
        $this->redirect(
            array(
                '/account/password/change',
                'token' => $this->module->generateToken(Module::TOKEN_CHANGE_PASSWORD, $account->id)
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function actionChange($token)
    {
        $tokenModel = $this->loadToken(Module::TOKEN_CHANGE_PASSWORD, $token);

        if ($this->module->hasTokenExpired($tokenModel, 3600/* 1h */)) {
            $this->accessDenied();
        }

        $model = $this->changePasswordInternal($tokenModel);

        $this->render('application.views.account.password.change', array('model' => $model));
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
