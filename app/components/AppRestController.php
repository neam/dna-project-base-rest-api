<?php

class AppRestController
{

    use RestApiControllerTrait;
    use RestApiPropelObjectControllerTrait;

    /**
     * The default list-action for the REST api controllers
     */
    public function actionList()
    {

        $model = $this->getModel();
        $result = $this->getPaginatedListActionResults($model);
        $this->sendResponse(200, $result);

    }

}