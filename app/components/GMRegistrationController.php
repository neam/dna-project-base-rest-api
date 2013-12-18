<?php

Yii::import('vendor.mishamx.yii-user.controllers.RegistrationController');

class GMRegistrationController extends RegistrationController {
    /**
     * Registers a user.
     * @see RegistrationController::actionRegistration()
     */
    public function actionRegistration()
    {
        // TODO: 1. This method should be refactored. It is too cluttered.
        // TODO: 2. Use ONE profile class throughout the entire app. Having multiple classes (Profiles, GMProfile) is confusing and creates duplicate code.
        Profile::$regMode = true;
        $model = new GMRegistrationForm;
        $profile = new GMProfile;
        $profile->language1 = 'sv';

        // ajax validator
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'registration-form') {
            echo UActiveForm::validate(array($model, $profile));
            Yii::app()->end();
        }

        if (Yii::app()->user->id) {
            $this->redirect(Yii::app()->controller->module->profileUrl);
        } else {
            if (isset($_POST['GMRegistrationForm'])) {
                $model->attributes = $_POST['GMRegistrationForm'];
                $profile->attributes = ((isset($_POST['GMProfile']) ? $_POST['GMProfile'] : array()));

                if ($model->validate() && $profile->validate()) {
                    $soucePassword = $model->password;
                    $model->activkey = UserModule::encrypting(microtime() . $model->password);
                    $model->password = UserModule::encrypting($model->password);
                    $model->verifyPassword = UserModule::encrypting($model->verifyPassword);
                    $model->superuser = 0;
                    $model->status = ((Yii::app()->controller->module->activeAfterRegister) ? User::STATUS_ACTIVE : User::STATUS_NOACTIVE);

                    if ($model->save()) {
                        $profile->user_id = $model->id;
                        $profile->save();

                        if (Yii::app()->controller->module->sendActivationMail) {
                            $activation_url = $this->createAbsoluteUrl(
                                '/user/activation/activation',
                                array("activkey" => $model->activkey, "email" => $model->email)
                            );
                            UserModule::sendMail($model->email, UserModule::t(
                                    "You registered from {site_name}",
                                    array('{site_name}' => Yii::app()->name)
                                ),
                                UserModule::t(
                                    "Please activate you account go to {activation_url}",
                                    array('{activation_url}' => $activation_url)
                                ));
                        }

                        if ((Yii::app()->controller->module->loginNotActiv
                                || (Yii::app()->controller->module->activeAfterRegister
                                && Yii::app()->controller->module->sendActivationMail == false))
                                && Yii::app()->controller->module->autoLogin) {
                            $identity = new UserIdentity($model->username, $soucePassword);
                            $identity->authenticate();
                            Yii::app()->user->login($identity, 0);
                            $this->redirect(Yii::app()->controller->module->returnUrl);
                        } else {
                            if (!Yii::app()->controller->module->activeAfterRegister && !Yii::app()->controller->module->sendActivationMail) {
                                Yii::app()->user->setFlash('registration', UserModule::t("Thank you for your registration. Contact Admin to activate your account."));
                            } elseif (Yii::app()->controller->module->activeAfterRegister && Yii::app()->controller->module->sendActivationMail == false
                            ) {
                                Yii::app()->user->setFlash('registration', UserModule::t("Thank you for your registration. Please {{login}}.", array(
                                    '{{login}}' => CHtml::link(UserModule::t('Login'), Yii::app()->controller->module->loginUrl),
                                )));
                            } elseif (Yii::app()->controller->module->loginNotActiv) {
                                Yii::app()->user->setFlash('registration',
                                    UserModule::t("Thank you for your registration. Please check your email or login."));
                            } else {
                                Yii::app()->user->setFlash('registration',
                                    UserModule::t("Thank you for your registration. Please check your email."));
                            }

                            $this->refresh();
                        }
                    }
                } else {
                    $profile->validate();
                }
            }

            $this->render('/user/registration', array('model' => $model, 'profile' => $profile));
        }
    }
}
