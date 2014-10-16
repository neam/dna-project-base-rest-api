<?php

/**
 * Language resource controller.
 */
class BaseLanguageController extends AppRestController
{
    /**
     * Lists all language resources.
     */
    public function actionList()
    {
        $this->sendResponse(200, LanguageHelper::getLanguageListWithDirection());
    }
}