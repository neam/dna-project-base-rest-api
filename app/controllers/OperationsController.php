<?php

use barebones\HttpException;

class OperationsController extends AppRestController
{

    /**
     * @inheritdoc
     */
    /*
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
    */

    /**
     * Responds to POST against v0/operations
     *
     * Note: Action create is the default action due to the configured rule
     * array('<version>/<controller>/create', 'pattern' => '<version:v\d+>/<controller:\w+>', 'verb' => 'POST'),
     *
     * @throws CDbException
     * @throws CHttpException
     * @throws Exception
     */
    public function actionCreate()
    {
        $suggestions = $this->request->getParam('suggestions');
        $save = $this->request->getParam('save');
        $filters = $this->request->getParam('filters');
        $refresh = $this->request->getParam('refresh');
        $activeItemIds = $this->request->getParam('activeItemIds');

        // Use cache for non-saving requests which does not specifically state that cache should be bypassed (refresh=1)
        $serializationFormat = "20161021b"; // Increment to programmatically invalidate new cache requests due to format of the cached objects has changed in the code
        $key = "affectedData_in_format_{$serializationFormat}_" . md5(
                serialize(compact("suggestions", "filters", "itemIds"))
            );
        $cachedResponse = null;
        if (!$refresh && !$save) {
            $cachedResponse = AppCache::get($key);
        }

        if ($cachedResponse) {

            $response = $cachedResponse;

            // Append to status log that this request was fetched from cache
            $response->cachedFetch = [
                "date" => (new DateTime())->format("Y-m-d H:i:s")
            ];
            $response->statusLog[] = "Request fetched from cache. Originally generated {$cachedResponse->requestStart->date}";

        } else {

            // Otherwise run the suggestions
            $requestStart = (object) [
                "microtime" => microtime(true),
                "date" => (new DateTime())->format("Y-m-d H:i:s")
            ];
            $response = $this->run($suggestions, $save, $filters, $activeItemIds);

            // Add timing data to response
            $response->requestStart = $requestStart;
            $response->requestEnd = (object) [
                "microtime" => microtime(true),
                "date" => (new DateTime())->format("Y-m-d H:i:s")
            ];
            $response->requestDuration = round(
                $response->requestEnd->microtime - $response->requestStart->microtime,
                2
            );

            // Save to cache
            AppCache::set($key, $response);

        }

        // Send response
        $this->sendResponse(200, $response);

    }

    protected function run($suggestions, $save, $filters, $activeItemIds)
    {

        if (empty($suggestions)) {
            throw new HttpException(401, "No suggestions requested");
        }

        $response = new stdClass();
        $response->collections = [];
        $response->items = [];

        // Hook that is guaranteed to have access to the results of the operations, used to return the affected item types response data
        $hookToRunInModifiedState = function (&$itemTypesAffectedByAlgorithms, $pdo) use (
            $filters,
            $activeItemIds,
            &$response
        ) {

            // We set the filter params in $_GET so that the controller methods pick them up when they use getParam()
            foreach ((array) $filters as $key => $filter) {
                $_GET[$key] = $filter;
            }

            // Enable propel instance pooling for returning the rest api response
            // TODO: Enable again after making sure that the same records are not supplied again and again in response listings
            // Relevant issue:
            // Propel InstancePooling must be disabled for querying tables without a PrimaryKey (such as Views)
            // https://github.com/propelorm/Propel2/issues/797
            //\Propel\Runtime\Propel::enableInstancePooling();

            foreach ($itemTypesAffectedByAlgorithms as $itemTypeAffected) {
                $modelClassSingular = $itemTypeAffected;
                $modelClassSingularWords = PhInflector::camel2words($modelClassSingular);
                $modelClassPluralWords = PhInflector::pluralize($modelClassSingularWords);
                $modelClassPlural = PhInflector::camelize($modelClassPluralWords);
                $controllerClass = $itemTypeAffected . "Controller";
                $restApiModelClass = "RestApi" . $modelClassSingular;
                /** @var RestApiPropelObjectControllerTrait $controller */
                $controller = new $controllerClass(false);
                $model = Operations::getModelOfItemType($itemTypeAffected);
                // Collections
                $response->collections[lcfirst($modelClassPlural)] = $controller->getPaginatedListActionResults(
                    $model
                );
                // Items
                $key = $itemTypeAffected . "Id";
                if ($itemTypeAffected && isset($activeItemIds->$key)) {
                    $_GET['id'] = $activeItemIds->$key;
                    $response->items[lcfirst($modelClassSingular)] = $restApiModelClass::getApiAttributes(
                        $controller->getModel()
                    );
                }
            }

        };

        // Run operations
        Operations::run($suggestions, $save, $hookToRunInModifiedState);

        // Add status messages if we are in dev mode
        $response->statusLog = [];
        if (DEV) {
            $response->statusLog = Operations::$statusLog;
        }

        return $response;

    }

}
