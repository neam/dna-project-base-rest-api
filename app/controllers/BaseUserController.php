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
//            'get' => 'WRestGetAction',
            'login' => '\OAuth2Yii\Action\Token',
        );
    }

    /**
     * Custom get action for the user data.
     */
    public function actionGet()
    {
        $id = $this->request->getParam('id');
        if ($id === null) {
            $this->sendResponse(404);
        }
        if (is_int($id) || ctype_digit($id)) {
            $model = CActiveRecord::model($this->_modelName)->findByPk($id);
        } else {
            $model = CActiveRecord::model($this->_modelName)->findByattributes(array('username' => $id));
        }
        if (Yii::app()->getUser()->getIsGuest()) {
            // todo: if the users profile is not public, then we cannot show it. (check from QA state)
        }
        if ($model === null) {
            $this->sendResponse(404);
        }
        $this->sendResponse(200, $model->getAllAttributes());
    }

    /**
     * Authenticates that the user is currently "logged in", i.e. a the Authorization header needs to be set and valid.
     */
    public function actionAuthenticate()
    {
        if (!Yii::app()->getUser()->getIsGuest()) {
            $this->sendResponse(200);
        } else {
            $this->sendResponse(401);
        }
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
