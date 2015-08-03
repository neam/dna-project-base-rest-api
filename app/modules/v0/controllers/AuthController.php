<?php

class AuthController extends AppRestController
{

    /**
     * @var string the resource model name.
     */
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
                    'preflight',
                    'loginNotify',
                )
            ),
            // Logged in users can do whatever they want to.
            array('allow', 'users' => array('@')),
            // Not logged in users can't do anything except above.
            array('deny'),
        );
    }

    public function actionLoginNotify()
    {
        Yii::app()->sendCorsHeaders();
        if (empty(Yii::app()->getUser()->id)) {
            throw new CException("Local session user id is empty albeit user component is initialized");
        }
        $this->sendResponse(200, (object) ["status" => "ok"]);
    }

}