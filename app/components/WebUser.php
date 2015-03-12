<?php

class WebUser extends \OAuth2Yii\Component\WebUser
{

    use RestrictedAccessWebUserTrait;

    /**
     * @var string the user model ID attribute.
     */
    public $idAttribute = 'id';

    /**
     * @var string the user model name.
     */
    public $modelClass = 'Account';
}
