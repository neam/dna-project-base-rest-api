<?php

class AppRestController extends WRestController
{

    use RestApiControllerTrait;
    use RestApiPropelObjectControllerTrait;
    // use RestApiYiiModelControllerTrait;

    /**
     * @inheritdoc
     */
    public function filters()
    {
        return array_merge(
            parent::filters(),
            array(
                'accessControl - preflight',
                /*
                array(
                    'application.filters.ContentNegotiator',
                    'languages' => LanguageHelper::getCodes(),
                ),
                */
            )
        );
    }

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
                )
            ),
            // Logged in users can do whatever they want to.
            array('allow', 'users' => array('@')),
            // Not logged in users can't do anything.
            array('deny', 'users' => array('*')),
        );
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        ini_set('html_errors', 0);
        $this->_responseFormat = 'json';
        return parent::init();
    }

    /*
    public function runDefaultWrestListAction()
    {
        $actions = $this->actions();
        $params = $actions["list"];
        $action = new WRestListAction($this, "list");
        if (is_array($params)) {
            foreach ($params as $param => $value) {
                if (property_exists($action, $param)) {
                    $action->$param = $value;
                }
            }
        }
        $action->run();
    }

    public function runDefaultWrestDeleteAction()
    {
        $actions = $this->actions();
        $params = $actions["delete"];
        $action = new WRestDeleteAction($this, "delete");
        if (is_array($params)) {
            foreach ($params as $param => $value) {
                if (property_exists($action, $param)) {
                    $action->$param = $value;
                }
            }
        }
        $action->run();
    }

    /**
     * When the default wrest list action is not enough, this
     * method comes in handy since it uses controller-specific overrides (if present)
     * of getFilterCriteria($filterBy) and getListCriteria() above.
     * /
    protected function getListActionResults($model)
    {

        $c = $this->getListCriteria($model);

        $models = $model->findAll($c);
        $result = array();
        if ($models) {
            foreach ($models as $item) {
                $result[] = $item->getAllAttributes();
            }
        }

        return $result;

    }

    */

    protected function runNonPaginatedListAction()
    {

        $model = $this->getModel();
        $result = $this->getListActionResults($model);
        $this->sendResponse(200, $result);

    }

    protected function runPaginatedListAction()
    {

        $model = $this->getModel();
        $result = $this->getPaginatedListActionResults($model);
        $this->sendResponse(200, $result);

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