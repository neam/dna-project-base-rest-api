<?php

use nordsoftware\yii_account\models\ar\AccountToken;
use nordsoftware\yii_account\Module;
use nordsoftware\yii_account\helpers\Helper;

class SignupController extends \nordsoftware\yii_account\controllers\SignupController
{
    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();
        $this->emailSubject = Yii::t('app', 'Activate your Gapminder account');
    }

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
                $accountClass = $this->module->getClassName(Module::CLASS_ACCOUNT);

                /** @var \nordsoftware\yii_account\models\ar\Account|\Account $account */
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

                    if (defined('CONFIG_ENVIRONMENT') && CONFIG_ENVIRONMENT !== 'test') {
                        $this->sendActivationMail($account);
                    } else {
                        $account->save();
                    }

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

        $this->render('//account/signup/index', array('model' => $model));
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
     * @inheritDoc
     */
    protected function sendActivationMail(\CActiveRecord $account)
    {
        if (!$account->save(false)) {
            $this->fatalError();
        }

        $token = $this->module->generateToken(Module::TOKEN_ACTIVATE, $account->id);

        $activateUrl = $this->createAbsoluteUrl('/account/signup/activate', array('token' => $token));

        $config = array();
        $config['from'] = Yii::app()->params['signupEmail'];

        $this->module->sendMail(
            $account->email,
            $this->emailSubject,
            $this->renderPartial('/email/activate', array('activateUrl' => $activateUrl), true),
            $config
        );
    }

    /**
     * Displays the 'done' page.
     */
    public function actionDone()
    {
        $this->render('//account/signup/done');
    }

}
