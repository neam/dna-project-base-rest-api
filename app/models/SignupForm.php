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
        return CMap::mergeArray(
            parent::rules(),
            array(
                array('acceptTerms', 'validateAcceptTerms'),
            )
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
