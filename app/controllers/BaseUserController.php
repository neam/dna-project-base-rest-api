<?php

class BaseUserController extends AppRestController
{
    protected $_modelName = 'Account';

    /**
     * @inheritdoc
     */
    public function accessRules()
    {
        return array(
            // Not logged in users can do the following actions.
            array(
                'allow',
                'actions' => array(
                    'login',
                )
            ),
            // Logged in users can do whatever they want to.
            array('allow', 'users' => array('@')),
            // Not logged in users can't do anything except above.
            array('deny'),
        );
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return array(
            'get' => 'WRestGetAction',
            'login' => '\OAuth2Yii\Action\Token',
        );
    }
}
