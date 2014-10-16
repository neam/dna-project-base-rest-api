<?php

/**
 * Profile resource controller.
 */
class BaseProfileController extends AppRestController
{
    /**
     * @var string the resource model name.
     */
    protected $_modelName = 'RestApiProfile';

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
                    'public',
                )
            ),
            // Logged in users can do whatever they want to.
            array('allow', 'users' => array('@')),
            // Not logged in users can't do anything except above.
            array('deny'),
        );
    }

    /**
     * Returns the 'public' profile for the given account.
     * Responds to path 'api/<version>/user/<accountId>/profile'.
     *
     * @param int $accountId the account model id.
     */
    public function actionPublic($accountId)
    {
        $model = $this->loadModel($accountId);
        $this->sendResponse(200, $model->getAllAttributes());
    }

    /**
     * Returns the current authenticated users profile.
     * Responds to path 'api/<version>/user/profile'.
     */
    public function actionGet()
    {
        $model = $this->loadModel(Yii::app()->getUser()->id);
        $this->sendResponse(200, $model->getAllAttributes());
    }

//    /**
//     * Updates the current authenticated users profile.
//     * Responds to path 'api/<version>/user/profile'.
//     */
//    public function actionUpdate()
//    {
//        // todo: implement updating of current users profile.
//    }

    /**
     * @inheritdoc
     */
    public function loadModel($accountId)
    {
        $model = RestApiProfile::model()->with('account')->findByAttributes(array('account_id' => (int)$accountId));
        if ($model === null) {
            $this->sendResponse(404);
        }
        return $model;
    }
}
