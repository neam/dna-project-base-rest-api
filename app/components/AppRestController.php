<?php

class AppRestController
{

    use RestApiControllerTrait;
    use RestApiPropelObjectControllerTrait;

    /**
     * @var RequestParser
     */
    public $request;

    public function __construct()
    {
        $this->request = new RequestParser();
    }

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