<?php

use barebones\HttpException;

class SuggestionsController extends AppRestController
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
     * Responds to POST against v0/suggestions
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

        // Use cache for non-saving requests which does not specifically state that cache should be bypassed (refresh=1)
        $key = md5(serialize(compact("suggestions", "filters")));
        $cachedValue = null;
        if (!$refresh && !$save) {
            $cachedValue = AppCache::redis()->get($key);
        }

        if ($cachedValue) {

            $affectedItemTypesData = $cachedValue->affectedItemTypesData;

            // Append to status log that this request was fetched from cache
            $affectedItemTypesData["statusLog"][] = "Request fetched from cache. Originally generated {$cachedValue->requestStart->date}";

        } else {

            // Otherwise run the suggestions
            $requestStart = (object) [
                "microtime" => microtime(true),
                "date" => (new DateTime())->format("Y-m-d H:i:s")
            ];
            $affectedItemTypesData = $this->run($suggestions, $save, $filters);

            // Save to cache
            $cachedValue = new stdClass();
            $cachedValue->affectedItemTypesData = $affectedItemTypesData;
            $cachedValue->requestStart = $requestStart;
            $cachedValue->requestEnd = (object) [
                "microtime" => microtime(true),
                "date" => (new DateTime())->format("Y-m-d H:i:s")
            ];
            AppCache::redis()->set($key, $cachedValue);

        }

        // Send response
        $this->sendResponse(200, $affectedItemTypesData);

    }

    protected function runThroughCache($suggestions, $save, $filters)
    {


    }

    protected function run($suggestions, $save, $filters)
    {

        if (empty($suggestions)) {
            throw new HttpException(401, "No suggestions requested");
        }

        $affectedItemTypesData = [];

        // Hook that is guaranteed to have access to the results of the operations, used to return the affected item types response data
        $hookToRunInModifiedState = function (&$itemTypesAffectedByAlgorithms, $pdo) use (
            $filters,
            &$affectedItemTypesData
        ) {

            // We set the filter params in $_GET so that the controller methods pick them up when they use getParam()
            foreach ((array) $filters as $key => $filter) {
                $_GET[$key] = $filter;
            }

            // Enable propel instance pooling for returning the rest api response
            // TODO: Enable again after making sure that the same records are not supplied again and again in response listings
            //\Propel\Runtime\Propel::enableInstancePooling();

            foreach ($itemTypesAffectedByAlgorithms as $itemTypeAffected) {
                $modelClassSingular = $itemTypeAffected;
                $modelClassSingularWords = PhInflector::camel2words($modelClassSingular);
                $modelClassPluralWords = PhInflector::pluralize($modelClassSingularWords);
                $modelClassPlural = PhInflector::camelize($modelClassPluralWords);
                $controllerClass = $itemTypeAffected . "Controller";
                $controller = new $controllerClass(false);
                $affectedItemTypesData[lcfirst($modelClassPlural)] = $controller->getPaginatedListActionResults(
                    Suggestions::getModelOfItemType($itemTypeAffected)
                );
            }

        };

        // Run suggestions
        Suggestions::run($suggestions, $save, $hookToRunInModifiedState);

        // Add status messages if we are in dev mode
        $affectedItemTypesData["statusLog"] = [];
        if (DEV) {
            $affectedItemTypesData["statusLog"] = Suggestions::$statusLog;
        }

        return $affectedItemTypesData;

    }

}
