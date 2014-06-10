<?php

use nordsoftware\yii_account\models\ar\Account;
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
     * @inheritDoc
     */
    public function actionActivate($token)
    {
        $tokenModel = $this->loadToken(Module::TOKEN_ACTIVATE, $token);

        $modelClass = $this->module->getClassName(Module::CLASS_MODEL);

        /** @var \nordsoftware\yii_account\models\ar\Account $model */
        $model = \CActiveRecord::model($modelClass)->findByPk($tokenModel->accountId);

        if ($model === null) {
            $this->pageNotFound();
        }

        $model->status = Account::STATUS_ACTIVATED;

        if (!$model->save(true, array('status'))) {
            $this->fatalError();
        }

        if (!$tokenModel->saveAttributes(array('status' => AccountToken::STATUS_USED))) {
            $this->fatalError();
        }

        // Create a profile model
        if (!$this->createProfile($model->id)) {
            $this->fatalError(Yii::t('error', 'Failed to create a profile.'));
        }

        $this->redirect(array('/account/authenticate/login'));
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
    protected function sendActivationMail(Account $account)
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
        $this->sendEmail($mail);
    }
}
