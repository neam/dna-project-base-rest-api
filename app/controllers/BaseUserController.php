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
                    'authenticate',
                    'publicProfile',
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
            'login' => '\OAuth2Yii\Action\Token',
        );
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
     * Returns the currently logged in users profile.
     */
    public function actionProfile()
    {
        /** @var Account $model */
        $model = $this->loadModel(Yii::app()->getUser()->id);
        $this->sendResponse(200, $model->getAllAttributes());
    }

    /**
     * Returns the user public profile.
     * This action responds to path api/<version>/friends/<username>.
     *
     * @param string $username the username to get the public profile for.
     */
    public function actionPublicProfile($username)
    {
        // Guest users can only see profiles that have been made public by the profile owner.
        // While logged in users can see all profiles regardless of if it is public or not.
        // todo: add the restriction logic once the QA state is implemented so we can check the publish state.
        $model = CActiveRecord::model($this->_modelName)
            ->with('profile')
            ->findByattributes(array('username' => $username));
        if ($model === null) {
            $this->sendResponse(404);
        }

        $this->sendResponse(200, $model->getAllAttributes());
    }
}
