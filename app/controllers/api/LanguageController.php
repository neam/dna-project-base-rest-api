<?php

class LanguageController extends AppRestController
{

    public function actionList()
    {

        $this->sendResponse(200, Yii::app()->params["languages"]);

    }

}