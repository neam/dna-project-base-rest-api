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

        if (empty($suggestions)) {
            throw new HttpException(401, "No suggestions requested");
        }

        if (!empty($suggestions) && !is_array($suggestions)) {
            $suggestions = [$suggestions];
        }

        $postedAlgorithms = $suggestions;
        $requiresRollbackSupport = !$save;
        $algorithms = Suggestions::preparePostedAlgorithmData($postedAlgorithms, $requiresRollbackSupport);

        $itemTypesAffectedByAlgorithms = Suggestions::getItemTypesAffectedByAlgorithms(
            $algorithms,
            Suggestions::ANY
        );

        if (empty($itemTypesAffectedByAlgorithms)) {
            throw new Exception("No item types affected by selected algorithms");
        }

        // Disable propel instance pooling for suggestion requests
        \Propel\Runtime\Propel::disableInstancePooling();

        $pdo = Suggestions::getPdoForSuggestions();

        try {

            $results = Suggestions::run($algorithms, $pdo);

            if ($save) {
                $pdo->commit();
            }

            // Return item lists of all affected item types (filtered as usual)

            $return = [];

            // We set the filter params in $_GET so that the controller methods pick them up when they use getParam()
            foreach ((array) $filters as $key => $filter) {
                $_GET[$key] = $filter;
            }

            foreach ($itemTypesAffectedByAlgorithms as $itemTypeAffected) {
                $modelClassSingular = $itemTypeAffected;
                $modelClassSingularWords = PhInflector::camel2words($modelClassSingular);
                $modelClassPluralWords = PhInflector::pluralize($modelClassSingularWords);
                $modelClassPlural = PhInflector::camelize($modelClassPluralWords);
                $controllerClass = $itemTypeAffected . "Controller";
                $controller = new $controllerClass(false);
                $return[lcfirst($modelClassPlural)] = $controller->getPaginatedListActionResults(
                    Suggestions::getModelOfItemType($itemTypeAffected)
                );
            }

            // Rollback if we are not saving

            if (!$save) {
                Suggestions::rollbackTransactionAndReclaimAutoIncrement($algorithms, $pdo);
            }

            // Send response

            $this->sendResponse(200, $return);

        } catch (Exception $e) {
            Suggestions::rollbackTransactionAndReclaimAutoIncrement($algorithms, $pdo);
            throw $e;
        }

    }

}
