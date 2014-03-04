<?php

/**
 * Helpers to build SQL views used in the application
 *
 * Class DatabaseViewGeneratorCommand
 */
class DatabaseViewGeneratorCommand extends CConsoleCommand
{

    /**
     * item
     *      node_id
     *      id
     *      _title
     *      status
     *      preview_validation_progress
     *      public_validation_progress
     *      approval_progress
     *      proofing_progress
     *      translate_into_{$language}_validation_progress
     *      model_class
     *      item_type
     *      created
     *      modified
     */
    public function actionItem()
    {

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

        // preview_validation_progress
        $sql .= "   CASE\n";

        foreach (DataModel::qaModels() as $modelClass => $table) {
            if ($this->_checkTableAndColumnExists($table . "_qa_state", "preview_validation_progress")) {
                $sql .= "       WHEN {$table}_qa_state.preview_validation_progress IS NOT NULL THEN {$table}_qa_state.preview_validation_progress\n";
            }
        }

        $sql .= "       ELSE NULL\n";
        $sql .= "END AS preview_validation_progress,\n";

        // public_validation_progress
        $sql .= "   CASE\n";

        foreach (DataModel::qaModels() as $modelClass => $table) {
            if ($this->_checkTableAndColumnExists($table . "_qa_state", "public_validation_progress")) {
                $sql .= "       WHEN {$table}_qa_state.public_validation_progress IS NOT NULL THEN {$table}_qa_state.public_validation_progress\n";
            }
        }

        $sql .= "       ELSE NULL\n";
        $sql .= "END AS public_validation_progress,\n";

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

        echo "\n";
        echo $viewSql;
        echo "\n";

        $selectResult = Yii::app()->db->createCommand($sql . " LIMIT 2")->queryAll();
        Yii::app()->db->createCommand($viewSql)->execute();
        $selectViewResult = Yii::app()->db->createCommand("SELECT * FROM $viewName LIMIT 2")->queryAll();
        var_dump(compact("selectResult", "selectViewResult"));

        $selectExistingItemsResult = Yii::app()->db->createCommand("SELECT * FROM $viewName WHERE model_class IS NOT NULL LIMIT 2")->queryAll();

        var_dump(compact("selectExistingItemsResult"));
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
