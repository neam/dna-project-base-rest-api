<?php

class AccountModule extends \nordsoftware\yii_account\Module
{
    /**
     * @inheritDoc
     */
    protected function init()
    {
        parent::init();

        $this->attachBehavior(
            'emailer',
            'vendor.nordsoftware.yii-emailer.behaviors.EmailBehavior'
        );
    }

    /**
     * @inheritDoc
     */
    public function sendMail($to, $subject, $body, array $config = array())
    {
        $config = array(
            'body' => $body,
        );

        /** @var EmailBehavior $this */
        $mail = $this->createEmail(app()->params['adminEmail'], $to, $subject, $config);
        $this->sendEmail($mail);
    }
}
