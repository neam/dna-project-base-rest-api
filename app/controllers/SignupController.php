<?php

use nordsoftware\yii_account\models\ar\AccountToken;
use nordsoftware\yii_account\Module;
use nordsoftware\yii_account\helpers\Helper;

class SignupController extends \nordsoftware\yii_account\controllers\SignupController
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return CMap::mergeArray(
            parent::behaviors(),
            array(
                'emailer' => array(
                    'class' => 'vendor.nordsoftware.yii-emailer.behaviors.EmailBehavior',
                ),
            )
        );
    }

    /**
     * Displays the 'sign up' page.
     */
    public function actionIndex()
    {
        $modelClass = $this->module->getClassName(Module::CLASS_SIGNUP_FORM);

        /** @var \nordsoftware\yii_account\models\form\SignupForm $model */
        $model = new $modelClass();

        $request = \Yii::app()->request;

        $this->runAjaxValidation($model, $this->formId);

        if ($request->isPostRequest) {
            $model->attributes = $request->getPost(Helper::classNameToPostKey($modelClass));

            if ($model->validate()) {
                $accountClass = $this->module->getClassName(Module::CLASS_MODEL);

                /** @var \nordsoftware\yii_account\models\ar\Account $account */
                $account = new $accountClass();
                $account->attributes = $model->attributes;

                if ($account->validate()) {
                    if (!$account->save(false/* already validated */)) {
                        $this->fatalError();
                    }

                    // Create a profile model
                    if (!$this->createProfile($account->id)) {
                        $this->fatalError(Yii::t('error', 'Failed to create a profile.'));
                    }

                    $account->assignDefaultGroupRoles();

                    $model->createHistoryEntry($account->id, $account->salt, $account->password);

                    if (!$this->module->enableActivation) {
                        $account->saveAttributes(array('status' => \nordsoftware\yii_account\models\ar\Account::STATUS_ACTIVATED));
                        $this->redirect(array('/account/authenticate/login'));
                    }

                    $this->sendActivationEmail($account);

                    $this->redirect(array('done'));
                }

                // todo: figure out how to avoid this, the problem is that password validation is done on the account

                foreach ($account->getErrors() as $attribute => $errors) {
                    foreach ($errors as $error) {
                        $model->addError($attribute, $error);
                    }
                }
            }
        }

        $this->render('index', array('model' => $model));
    }

    /**
     * Creates an account profile.
     * @param $accountId
     */
    public function createProfile($accountId)
    {
        $model = new Profile();
        $model->user_id = $accountId;

        return $model->save();
    }

    /**
     * Sends the activation email to the given account.
     * @param Account $account account model.
     * @throws \nordsoftware\yii_account\exceptions\Exception
     */
    protected function sendActivationEmail($account)
    {
        if (!$account->save(false)) {
            $this->fatalError();
        }

        $token = $this->module->generateToken(Module::TOKEN_ACTIVATE, $account->id);
        $activationUrl = $this->createAbsoluteUrl('/account/signup/activate', array('token' => $token));

        $message = Yii::t(
            'app', 'Welcome to Gapminder! Activate your account by visiting the following URL: {activationUrl}',
            array(
                '{activationUrl}' => $activationUrl,
            )
        );

        $config = array(
            'body' => $message,
        );

        /** @var EmailBehavior $this */
        $mail = $this->createEmail(app()->params['adminEmail'], $account->email, $this->emailSubject, $config);

        if (defined('CONFIG_ENVIRONMENT') && CONFIG_ENVIRONMENT !== 'test') {
            $this->sendEmail($mail);
        }
    }
}
