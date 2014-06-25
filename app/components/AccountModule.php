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
        $config['body'] = $body;
        $from = isset($config['from']) ? $config['from'] : Yii::app()->params['adminEmail'];

        /** @var EmailBehavior $this */
        $mail = $this->createEmail($from, $to, $subject, $config);
        $this->sendEmail($mail);
    }
}
