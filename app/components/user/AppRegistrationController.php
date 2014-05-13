<?php

Yii::import('vendor.mishamx.yii-user.controllers.RegistrationController');

class AppRegistrationController extends RegistrationController
{

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array(
                'emailer' => array(
                    'class' => 'vendor.nordsoftware.yii-emailer.behaviors.EmailBehavior',
                ),
            )
        );
    }

    /**
     * Registers a user.
     * @see RegistrationController::actionRegistration()
     */
    public function actionRegistration()
    {
        $this->layout = WebApplication::LAYOUT_MINIMAL;

        // TODO: 1. This method should be refactored. It is too cluttered.
        // TODO: 2. Use ONE profile class throughout the entire app. Having multiple classes (Profiles, AppProfile) is confusing and creates duplicate code.
        Profile::$regMode = true;
        $model = new AppRegistrationForm;
        $profile = new AppProfile;

        // ajax validator
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'registration-form') {
            echo UActiveForm::validate(array($model, $profile));
            Yii::app()->end();
        }

        if (Yii::app()->user->id) {
            $this->redirect(Yii::app()->controller->module->profileUrl);
        } else {
            if (isset($_POST['AppRegistrationForm'])) {
                $model->attributes = $_POST['AppRegistrationForm'];
                $profile->attributes = ((isset($_POST['AppProfile']) ? $_POST['AppProfile'] : array()));

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

                        $model->assignDefaultGroupRoles();

                        if (Yii::app()->controller->module->sendActivationMail) {
                            $activation_url = $this->createAbsoluteUrl(
                                '/user/activation/activation',
                                array("activkey" => $model->activkey, "email" => $model->email)
                            );

                            $from = Yii::app()->params['signupSender'];
                            $to = $model->email;
                            $subject = Yii::t(
                                'user registration',
                                'Email Confirmation to activate your Gapminder Account'
                            );
                            $bodyTxt = <<<EOD
Please confirm your email address and activate your new Gapminder Account by clicking this link: {link}

Thanks
Gapminder Foundation

(Your email-address was provided to us by someone request to sign up for a new account at www.gapminder.org/signup/. If you did not provide the address, this email message must come as a surprise to you. We apologize for the inconvenience and ask you kindly to inform us about this incident so we can investigate what happened. Please tell us about this, by sending an email to info@gapminder.org
We are very sorry!
/The Gapminder Foundation.)
EOD;
                            $body = Yii::t(
                                'user registration',
                                $bodyTxt,
                                array(
                                    '{link}' => $activation_url,
                                )
                            );
                            $config = array(
                                'body' => $body
                            );
                            // TODO: method signature broken compared to component Emailer::create
                            $mail = $this->createEmail($from, $to, $subject, $config);
                            $this->sendEmail($mail);

                        }

                        if ((Yii::app()->controller->module->loginNotActiv
                                || (Yii::app()->controller->module->activeAfterRegister
                                    && Yii::app()->controller->module->sendActivationMail == false))
                            && Yii::app()->controller->module->autoLogin
                        ) {
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
                                $this->redirect(array('/user/registration/registrationSuccess'));
                            }

                            $this->refresh();
                        }
                    }
                } else {
                    $profile->validate();
                }
            }

            $this->render('/user/registration', array(
                'model' => $model,
                'profile' => $profile,
                'profileFields' => Profile::getFields(),
            ));
        }
    }

    /**
     * Renders the registration success page.
     */
    public function actionRegistrationSuccess()
    {
        $this->render('//user/registration-success');
    }
}
