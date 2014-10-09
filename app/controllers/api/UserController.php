<?php

class UserController extends AppRestController
{
    protected $_modelName = 'Account';

    public function actions()
    {
        return array(
            'get' => 'WRestGetAction',
        );
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
