<?php

Yii::import('vendor.mishamx.yii-user.models.RegistrationForm');

/**
 * Class AppRegistrationForm
 */
class AppRegistrationForm extends RegistrationForm
{
    public $verifyPassword;
    public $verifyCode;
    public $acceptTerms;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        $rules = array(
            array('acceptTerms', 'compare', 'compareValue' => true, 'message' => UserModule::t('You must agree to the terms and privacy policy')),
            array('username, password, verifyPassword, email', 'required'),
            array('username', 'length', 'max' => 20, 'min' => 3, 'message' => UserModule::t('Incorrect username (length between 3 and 20 characters).')),
            array('password', 'length', 'max' => 128, 'min' => 4, 'message' => UserModule::t('Incorrect password (minimal length 4 symbols).')),
            array('email', 'email'),
            array('username', 'unique', 'message' => UserModule::t("This user's name already exists.")),
            array('email', 'unique', 'message' => UserModule::t("This user's email address already exists.")),
            array('verifyPassword', 'compare', 'compareAttribute' => 'password', 'message' => UserModule::t('Passwords do not match.')),
            array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u', 'message' => UserModule::t('Invalid character. Allowed: A-z 0-9.')),
        );

        if (!(isset($_POST['ajax']) && $_POST['ajax'] === 'registration-form')) {
            $rules[] = array('verifyCode', 'captcha', 'allowEmpty' => !UserModule::doCaptcha('registration'));
        }

        return $rules;
    }

    /**
     * @return array the attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'acceptTerms' => Yii::t('app', 'Accept Terms and Privacy Policy'),
        );
    }
}
