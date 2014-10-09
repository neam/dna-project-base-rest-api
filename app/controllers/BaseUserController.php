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
                    'get',
                    'login',
                    'authenticate',
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

    /**
     * Authenticates that the user is currently "logged in", i.e. a the Authorization header needs to be set and valid.
     */
    public function actionAuthenticate()
    {
        if (!Yii::app()->getUser()->getIsGuest())
            $this->sendResponse(200);
        else
            $this->sendResponse(401);
    }

    /**
     * Returns the currently logged in users profile data.
     */
    public function actionProfile()
    {
        /** @var Account $model */
        $model = $this->loadModel(Yii::app()->getUser()->id);
        $this->sendResponse(200, $model->getAllAttributes());
    }
}
