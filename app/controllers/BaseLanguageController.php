<?php

class BaseLanguageController extends AppRestController
{
    public function actionList()
    {
        $this->sendResponse(200, LanguageHelper::getLanguageListWithDirection());
    }
}