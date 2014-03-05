<?php

/**
 * Helpers to build SQL views used in the application
 *
 * Class DatabaseViewGeneratorCommand
 */
class DatabaseViewGeneratorCommand extends CConsoleCommand
{

    /**
     * If we should be verbose
     *
     * @var bool
     */
    private $_verbose = false;

    /**
     * item
     *      node_id
     *      id
     *      _title
     *      status
     *      draft_validation_progress
     *      reviewable_validation_progress
     *      publishable_validation_progress
     *      approval_progress
     *      proofing_progress
     *      translate_into_{$language}_validation_progress
     *      model_class
     *      item_type
     *      created
     *      modified
     */
    public function actionItem($verbose = false)
    {

        if (!empty($verbose)) {
            $this->_verbose = true;
        }

        $sql = "SELECT \n";

        // node_id
        $sql .= "   node.id as node_id,\n";

        // id
        $sql .= "   CASE\n";
        foreach (DataModel::qaModels() as $modelClass => $table) {
            if ($this->_checkTableAndColumnExists($table, "id")) {
                $sql .= "       WHEN $table.id IS NOT NULL THEN $table.id\n";
            }
        }
        $sql .= "       ELSE NULL\n";
        $sql .= "END AS id,\n";

        // _title
        $sql .= "   CASE\n";

        foreach (DataModel::qaModels() as $modelClass => $table) {
            if ($this->_checkTableAndColumnExists($table, "_title")) {
                $sql .= "       WHEN $table.id IS NOT NULL THEN $table._title\n";
            }
        }

        $sql .= "       ELSE NULL\n";
        $sql .= "END AS _title,\n";

        // status
        $sql .= "   CASE\n";

        foreach (DataModel::qaModels() as $modelClass => $table) {
            if ($this->_checkTableAndColumnExists($table . "_qa_state", "status")) {
                $sql .= "       WHEN {$table}_qa_state.status IS NOT NULL THEN {$table}_qa_state.status\n";
            }
        }

        $sql .= "       ELSE NULL\n";
        $sql .= "END AS status,\n";

        // draft_validation_progress
        $sql .= "   CASE\n";

        foreach (DataModel::qaModels() as $modelClass => $table) {
            if ($this->_checkTableAndColumnExists($table . "_qa_state", "draft_validation_progress")) {
                $sql .= "       WHEN {$table}_qa_state.draft_validation_progress IS NOT NULL THEN {$table}_qa_state.draft_validation_progress\n";
            }
        }

        $sql .= "       ELSE NULL\n";
        $sql .= "END AS draft_validation_progress,\n";

        // reviewable_validation_progress
        $sql .= "   CASE\n";

        foreach (DataModel::qaModels() as $modelClass => $table) {
            if ($this->_checkTableAndColumnExists($table . "_qa_state", "reviewable_validation_progress")) {
                $sql .= "       WHEN {$table}_qa_state.reviewable_validation_progress IS NOT NULL THEN {$table}_qa_state.reviewable_validation_progress\n";
            }
        }

        $sql .= "       ELSE NULL\n";
        $sql .= "END AS reviewable_validation_progress,\n";

        // publishable_validation_progress
        $sql .= "   CASE\n";

        foreach (DataModel::qaModels() as $modelClass => $table) {
            if ($this->_checkTableAndColumnExists($table . "_qa_state", "publishable_validation_progress")) {
                $sql .= "       WHEN {$table}_qa_state.publishable_validation_progress IS NOT NULL THEN {$table}_qa_state.publishable_validation_progress\n";
            }
        }

        $sql .= "       ELSE NULL\n";
        $sql .= "END AS publishable_validation_progress,\n";

        // approval_progress
        $sql .= "   CASE\n";

        foreach (DataModel::qaModels() as $modelClass => $table) {
            if ($this->_checkTableAndColumnExists($table . "_qa_state", "approval_progress")) {
                $sql .= "       WHEN {$table}_qa_state.approval_progress IS NOT NULL THEN {$table}_qa_state.approval_progress\n";
            }
        }

        $sql .= "       ELSE NULL\n";
        $sql .= "END AS approval_progress,\n";

        // proofing_progress
        $sql .= "   CASE\n";

        foreach (DataModel::qaModels() as $modelClass => $table) {
            if ($this->_checkTableAndColumnExists($table . "_qa_state", "proofing_progress")) {
                $sql .= "       WHEN {$table}_qa_state.proofing_progress IS NOT NULL THEN {$table}_qa_state.proofing_progress\n";
            }
        }

        $sql .= "       ELSE NULL\n";
        $sql .= "END AS proofing_progress,\n";

        // translate_into_{$language}_validation_progress
        foreach (Yii::app()->params["languages"] as $language => $label) {

            $sql .= "   CASE\n";

            foreach (DataModel::qaModels() as $modelClass => $table) {
                if ($this->_checkTableAndColumnExists($table . "_qa_state", "translate_into_{$language}_validation_progress")) {
                    $sql .= "       WHEN {$table}_qa_state.translate_into_{$language}_validation_progress IS NOT NULL THEN {$table}_qa_state.translate_into_{$language}_validation_progress\n";
                }
            }

            $sql .= "       ELSE NULL\n";
            $sql .= "END AS translate_into_{$language}_validation_progress,\n";

        }

        // model_class
        $sql .= "   CASE\n";

        foreach (DataModel::qaModels() as $modelClass => $table) {
            $sql .= "       WHEN $table.id IS NOT NULL THEN '$modelClass'\n";
        }

        $sql .= "       ELSE NULL\n";
        $sql .= "END AS model_class,\n";

        // item_type
        $sql .= "   CASE\n";

        foreach (DataModel::goItemModels() as $modelClass => $table) {
            $sql .= "       WHEN $table.id IS NOT NULL THEN 'go'\n";
        }
        foreach (DataModel::educationalItemModels() as $modelClass => $table) {
            $sql .= "       WHEN $table.id IS NOT NULL THEN 'educational'\n";
        }
        foreach (DataModel::websiteContentItemModels() as $modelClass => $table) {
            $sql .= "       WHEN $table.id IS NOT NULL THEN 'website_content'\n";
        }
        /*
        foreach (DataModel::waffleItemModels() as $modelClass => $table) {
            $sql .= "       WHEN $table.id IS NOT NULL THEN '$modelClass'\n";
        }
        */

        $sql .= "       ELSE NULL\n";
        $sql .= "END AS item_type,\n";

        // created
        $sql .= "   CASE\n";

        foreach (DataModel::qaModels() as $modelClass => $table) {
            if ($this->_checkTableAndColumnExists($table, "created")) {
                $sql .= "       WHEN $table.created IS NOT NULL THEN $table.created\n";
            }
        }

        $sql .= "       ELSE NULL\n";
        $sql .= "END AS created,\n";

        // created
        $sql .= "   CASE\n";

        foreach (DataModel::qaModels() as $modelClass => $table) {
            if ($this->_checkTableAndColumnExists($table, "modified")) {
                $sql .= "       WHEN $table.modified IS NOT NULL THEN $table.modified\n";
            }
        }

        $sql .= "       ELSE NULL\n";
        $sql .= "END AS modified\n";

        $sql .= "FROM node\n";

        foreach (DataModel::qaModels() as $modelClass => $table) {
            $sql .= "       LEFT JOIN ($table INNER JOIN {$table}_qa_state ON {$table}.{$table}_qa_state_id = {$table}_qa_state.id) ON $table.node_id = node.id \n";
        }

        $viewName = "item";

        $viewSql = "CREATE OR REPLACE VIEW item AS $sql";

        if ($this->_verbose) {
            echo "\n";
            echo $viewSql;
            echo "\n";
        }

        $selectResult = Yii::app()->db->createCommand($sql . " LIMIT 2")->queryAll();
        Yii::app()->db->createCommand($viewSql)->execute();
        $selectViewResult = Yii::app()->db->createCommand("SELECT * FROM $viewName LIMIT 2")->queryAll();

        if ($this->_verbose) {
            var_dump(compact("selectResult", "selectViewResult"));
        }

        $selectExistingItemsResult = Yii::app()->db->createCommand("SELECT * FROM $viewName WHERE model_class IS NOT NULL LIMIT 2")->queryAll();

        if ($this->_verbose) {
            var_dump(compact("selectExistingItemsResult"));
        }

    }

    /**
     * @param $model
     * @param $column
     * @return bool
     */
    protected function _checkTableAndColumnExists($table, $column)
    {
        $tables = Yii::app()->db->schema->getTables();
        // The column does not exist if the table does not exist
        return isset($tables[$table]) && (isset($tables[$table]->columns[$column]));
    }

}
