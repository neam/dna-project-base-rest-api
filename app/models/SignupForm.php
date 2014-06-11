<?php

class SignupForm extends \nordsoftware\yii_account\models\form\SignupForm
{
    /**
     * @var int
     */
    public $acceptTerms;

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return array(
            array('password, verifyPassword', 'required'),
            array('verifyPassword', 'compare', 'compareAttribute' => 'password'),
            array('username', 'length', 'min' => Account::USERNAME_MIN_LENGTH),
            array('password', 'length', 'min' => Account::PASSWORD_MIN_LENGTH),
            array('email, username', 'required'),
            array('email', 'email'),
            array('username, email', 'unique', 'className' => '\nordsoftware\yii_account\models\ar\Account'),
            array('acceptTerms', 'validateAcceptTerms'),
        );
    }

    /**
     * Validates the acceptTerms attribute.
     * @param string $attribute
     */
    public function validateAcceptTerms($attribute)
    {
        if ((int) $this->{$attribute} !== 1) {
            $this->addError($attribute, Yii::t('model', 'You must accept the terms and conditions.'));
        }
    }

    /**
     * @inheritDoc
     */
    public function attributeLabels()
    {
        return array(
            'acceptTerms' => Yii::t('labels', 'Accept terms and conditions'),
        );
    }
}
