<?php

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

        if (empty($suggestions)) {
            throw new CHttpException(401, "No suggestions requested");
        }

        if (!empty($suggestions) && !is_array($suggestions)) {
            $suggestions = [$suggestions];
        }

        $itemTypesAffectedByAlgorithms = Suggestions::getItemTypesAffectedByAlgorithms(
            $suggestions,
            Suggestions::ANY
        );

        if (empty($itemTypesAffectedByAlgorithms)) {
            throw new Exception("No item types affected by selected algorithms");
        }

        $results = Suggestions::run($suggestions);

        if ($save) {
            $results["transaction"]->commit();
        }

        // Return item lists of all affected item types (filtered as usual)

        $return = [];

        $itemTypesAffectedByAlgorithms = Suggestions::getItemTypesAffectedByAlgorithms(
            $suggestions,
            Suggestions::ANY
        );

        foreach ($itemTypesAffectedByAlgorithms as $itemTypeAffected) {
            $modelClassSingular = $itemTypeAffected;
            $modelClassSingularWords = PhInflector::camel2words($modelClassSingular);
            $modelClassPluralWords = PhInflector::pluralize($modelClassSingularWords);
            $modelClassPlural = PhInflector::camelize($modelClassPluralWords);
            $restApiModelClass = "RestApi" . $itemTypeAffected;
            $controllerClass = $itemTypeAffected . "Controller";
            $controller = new $controllerClass(false);
            $return[lcfirst($modelClassPlural)] = $controller->getPaginatedListActionResults(
                $restApiModelClass::model()
            );
        }

        // Rollback if we are not saving

        if (!$save) {
            Suggestions::rollbackTransactionAndReclaimAutoIncrement($suggestions, $results["transaction"]);
        }

        // Send response

        $this->sendResponse(200, $return);

    }

}