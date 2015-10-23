<?php

use Propel\Runtime\Propel;
use Propel\Runtime\Exception\PropelException;
use barebones\HttpException;

trait RestApiPropelObjectControllerTrait
{

    /**
     * @inheritdoc
     */
    public function getModel()
    {
        $id = $this->request->getParam('id');
        $modelName = '\\propel\\models\\' . ucfirst(str_replace("RestApi", "", $this->_modelName));
        if (empty($this->_modelName) || !class_exists($modelName)) {
            throw new CHttpException(500, 'Invalid configuration');
        }
        if ($id) {
            $queryClass = $modelName . 'Query';
            $model = $queryClass::create()->findOneById($id);
        } else {
            $model = new $modelName();
        }
        if ($model === null) {
            throw new HttpException(404);
        }
        return $model;
    }

    public $page = 'Foo_page';
    public $limit = 'Foo_limit';
    //public $offset = 'Foo_offset';
    public $order = 'Foo_order';
    public $defaultLimit = 10;
    public $nullString = 'null';

    protected function applyFilterQuery($filterBy, \Propel\Runtime\ActiveQuery\ModelCriteria &$query)
    {

        // Make sure the filter parameters are allowed for rest-filtering
        if (!empty($filterBy) && is_array($filterBy)) {
            foreach ($filterBy as $key => $val) {
                if (!is_null($this->request->getParam($val))) {
                    // Add model name if no relation is specified
                    if (stripos($key, '.') === false) {
                        $key = $query->getModelShortName() . '.' . $key;
                    }
                    $param = $this->request->getParam($val);
                    if ($param === $this->nullString) {
                        $query->where($key . ' IS NULL');
                    } elseif ($param === "<>" . $this->nullString) {
                        $query->where($key . ' IS NOT NULL');
                    } else {
                        AppUtil::compare($query, $key, $param);
                    }
                }
            }
        }

    }

    protected function applyListQuery(\Propel\Runtime\ActiveQuery\ModelCriteria &$query)
    {

        $actions = $this->actions();
        $params = $actions["list"];

        $filterBy = $params["filterBy"];
        $this->applyFilterQuery($filterBy, $query);

        /*
        $c->limit = (int) (($limit = $this->request->getParam($this->limit)) ? $limit : $this->defaultLimit);
        $page = (int) $this->request->getParam($this->page) - 1;
        $c->offset = ($offset = $limit * $page) ? $offset : 0;
        */

        $orderParam = $this->request->getParam($this->order);

        if (!empty($orderParam)) {

            // Split into propel syntax, for instance 'Foo.official_ordinal DESC, Bar.ordinal'
            $orderByStatements = explode(",", $orderParam);
            foreach ($orderByStatements as $orderByStatement) {
                if (stripos($orderByStatement, ' desc') !== false) {
                    $columnName = str_ireplace(' desc', '', $orderByStatement);
                    $order = 'desc';
                    $query->orderBy(trim($columnName), $order);
                } elseif (stripos($orderByStatement, ' asc') !== false) {
                    $columnName = str_ireplace(' asc', '', $orderByStatement);
                    $order = 'asc';
                    $query->orderBy(trim($columnName), $order);
                } else {
                    $columnName = $orderByStatement;
                    $query->orderBy(trim($columnName));
                }
            }

        }

        /*
        $reverse = $this->request->getParam('reverse');
        if ($reverse == 1) {
            $c->order .= " DESC";
        } else {
            $c->order .= " ASC";
        }
        */

    }

    protected function getPaginatedListActionResults($model)
    {

        // Get list action configuration from controller list action configuration
        $actions = $this->actions();
        $params = $actions["list"];
        if (is_array($params)) {
            foreach ($params as $param => $value) {
                if (property_exists($this, $param)) {
                    $this->$param = $value;
                }
            }
        }

        // Initiate propel object query
        $propelObjectQueryClass = get_class($model) . "Query";

        /** @var \Propel\Runtime\ActiveQuery\ModelCriteria $query */
        $query = $propelObjectQueryClass::create();
        // $query->setFormatter(\Propel\Runtime\ActiveQuery\ModelCriteria::FORMAT_ON_DEMAND); // Does not work with populateRelation() below...

        // Compile criteria
        /** @var \Propel\Runtime\ActiveQuery\ModelCriteria $query */
        $this->applyListQuery($query);
        //var_dump(__LINE__, $query->toString());

        // Get pagination options from request parameters
        $pageSize = (int) $this->request->getParam($this->limit);
        $page = (int) $this->request->getParam($this->page);

        // Support global (as in all item types) per-request defaults
        if (empty($pageSize)) {
            $pageSize = (int) $this->request->getParam("default_limit");
        }
        if (empty($page)) {
            $page = (int) $this->request->getParam("default_page");
        }

        // Always set a page size
        if (empty($pageSize)) {
            $pageSize = $this->defaultLimit;
        }

        // Pager
        $models = $query->paginate($page, $pageSize);

        $result = array(
            "items" => [],
            "_meta" => [
                "totalCount" => (int) $models->getNbResults(),
                "pageCount" => (int) $models->getLastPage(),
                "getFirstIndex" => (int) $models->getFirstIndex(),
                "getLastIndex" => (int) $models->getLastIndex(),
                "currentPage" => (int) $models->getPage(),
                "perPage" => (int) $models->getMaxPerPage()
            ],
        );

        // Invoke hook for controller to modify the collection before iterating through it to build the response tree
        $this->beforeIteratingThroughPaginatedItems($result, $models, $query);

        if ($models) {
            foreach ($models as $item) {
                $restApiModelClass = $this->_modelName;
                $result["items"][] = $restApiModelClass::getApiAttributes($item);
            }
        }

        // Invoke hook for controller to modify the response, for instance in order to specify additional metadata about the collection
        $this->beforeReturningPaginatedListActionResults($result, $models, $query);

        return $result;

    }

    /**
     * Hook for controller to modify the collection before iterating through it to build the response tree
     * @return null
     */
    protected function beforeIteratingThroughPaginatedItems(
        &$result,
        \Propel\Runtime\Util\PropelModelPager &$pager,
        \Propel\Runtime\ActiveQuery\ModelCriteria &$query
    ) {

    }

    /**
     * Hook for controller to override in order to modify the response, for instance in order to specify additional metadata about the collection
     * @return null
     */
    protected function beforeReturningPaginatedListActionResults(
        &$result,
        \Propel\Runtime\Util\PropelModelPager &$pager,
        \Propel\Runtime\ActiveQuery\ModelCriteria &$query
    ) {

    }

    public $scenario = null;

    public function actionUpdate()
    {

        // Disable propel instance pooling for update requests
        Propel::disableInstancePooling();

        // PDO
        $pdo = Propel::getWriteConnection('default');

        // set autocommit to 0 to prevent saving of data within transaction
        $pdo->exec("SET autocommit=0");

        // start transaction
        $pdo->beginTransaction();
        try {

            $this->request->parseJsonParams();
            $requestAttributes = $this->request->getAllRestParams();

            $model = $this->getModel();
            $restApiModelClass = $this->_modelName;
            $restApiModelClass::setUpdateAttributes($model, $requestAttributes);
            $model->save();

            $pdo->commit();
            $this->sendResponse(200, $restApiModelClass::getApiAttributes($model));

        } catch (PDOException $e) {

            $pdo->rollback();
            throw $e;

        } catch (PropelException $e) {

            $pdo->rollback();
            $this->sendResponse(500, array('errors' => $e->getMessage()));
            exit;

        }

    }

    public function actionCreate()
    {

        // Disable propel instance pooling for update requests
        Propel::disableInstancePooling();

        // PDO
        $pdo = Propel::getWriteConnection('default');

        // set autocommit to 0 to prevent saving of data within transaction
        $pdo->exec("SET autocommit=0");

        // start transaction
        $pdo->beginTransaction();
        try {

            $this->request->parseJsonParams();
            $requestAttributes = $this->request->getAllRestParams();

            $model = $this->getModel();
            $restApiModelClass = $this->_modelName;
            $restApiModelClass::setCreateAttributes($model, $requestAttributes);
            $model->save();

            $pdo->commit();
            $this->sendResponse(200, $restApiModelClass::getApiAttributes($model));

        } catch (PDOException $e) {

            $pdo->rollback();
            throw $e;

        } catch (PropelException $e) {

            $pdo->rollback();
            throw $e;

        }

    }

    public function actionDelete()
    {

        // Disable propel instance pooling for update requests
        Propel::disableInstancePooling();

        $model = $this->getModel();
        $id = $model->getId();
        $model->delete();
        $this->sendResponse(200, array('id' => $id));

    }

    public function actionGet()
    {

        $model = $this->getModel();
        $restApiModelClass = $this->_modelName;
        $this->sendResponse(200, $restApiModelClass::getApiAttributes($model));

    }

}