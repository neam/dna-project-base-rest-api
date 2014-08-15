<?php

use nordsoftware\yii_account\Module;
use nordsoftware\yii_account\helpers\Helper;

class AuthenticateController extends \nordsoftware\yii_account\controllers\AuthenticateController
{
    /**
     * @inheritDoc
     */
    public function actionLogin()
    {
        $modelClass = $this->module->getClassName(Module::CLASS_LOGIN_FORM);

        /** @var \nordsoftware\yii_account\models\form\LoginForm $model */
        $model = new $modelClass();

        $request = \Yii::app()->request;

        $this->runAjaxValidation($model, $this->loginFormId);

        if ($request->isPostRequest) {
            $model->attributes = $request->getPost(Helper::classNameToPostKey($modelClass));

            if ($model->validate() && $model->login()) {
                /** @var \nordsoftware\yii_account\models\ar\Account $account */
                $account = \Yii::app()->user->loadAccount();

                // Check if the password has expired and require a password change if necessary.
                if ($model->hasPasswordExpired($account->id)) {
                    $account->saveAttributes(array('requireNewPassword' => true));
                }

                // Redirect the logged in user to change the password if it needs to be changed.
                if ($account->requireNewPassword) {
                    $token = $this->module->generateToken(Module::TOKEN_CHANGE_PASSWORD, $account->id);

                    // Logout the user to deny access to restricted actions until the password has been changed.
                    \Yii::app()->user->logout();

                    $this->redirect(array('/account/password/change', 'token' => $token));
                }

                $this->redirect(\Yii::app()->user->returnUrl);
            }
        }

        $this->render(
            'application.views.account.authenticate.login',
            array(
                'model' => $model,
            )
        );
    }
}
