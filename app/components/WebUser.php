<?php

class WebUser extends \OAuth2Yii\Component\WebUser
{
    /**
     * @var string the user model ID attribute.
     */
    public $idAttribute = 'id';

    /**
     * @var string the user model name.
     */
    public $modelClass = 'Account';

    /**
     * Treat the user as logged in user if a valid OAuth2 token is supplied.
     */
    public function init()
    {
        if ($this->getIsOAuth2Request()) {
            /** @var $oauth2 \OAuth2yii\Component\ServerComponent */
            $oauth2 = Yii::app()->getComponent($this->oauth2);
            if ($oauth2 === null) {
                throw new \CException("Invalid OAuth2Yii server component '{$this->oauth2}'");
            }
            if (($id = $oauth2->getUserId()) !== null) {
                $this->_isOAuth2User = true;
                $this->changeIdentity($id, 'oauth2user', array());
            }
            /** @var $response \OAuth2\Response */
            $response = $oauth2->getServer()->getResponse();
            if ($response->getStatusCode() !== 200) {
                $response->send();
                \Yii::app()->end();
            }
        }

        parent::init();
    }
}
