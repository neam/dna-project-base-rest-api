<?php

/**
 * Helpers to build SQL views used in the application
 *
 * Class DatabaseViewGeneratorCommand
 */
class DatabaseViewGeneratorCommand extends CConsoleCommand
{

    public function actionSample()
    {

        $sql = "SELECT
    node.id,
    exercise.id AS exercise_id,
    exercise._title AS exercise_title,
    snapshot.id AS snapshot_id,
    snapshot._title AS snapshot_title,
    CASE
        WHEN snapshot.id IS NOT NULL THEN snapshot._title
        WHEN exercise.id IS NOT NULL THEN exercise._title
        ELSE NULL
    END AS _title,
    CASE
        WHEN snapshot.id IS NOT NULL THEN 'Snapshot'
        WHEN exercise.id IS NOT NULL THEN 'Exercise'
        ELSE NULL
    END AS model_class
FROM
    node
        LEFT JOIN
    exercise ON exercise.node_id = node.id
        LEFT JOIN
    snapshot ON snapshot.node_id = node.id
WHERE
    1
        AND (exercise.id IS NOT NULL OR snapshot.id IS NOT NULL)";

        $viewName = "node_with_exercise_or_snapshot";

        $viewSql = "CREATE OR REPLACE VIEW node_with_exercise_or_snapshot AS $sql";

        echo "\n";
        echo $viewSql;
        echo "\n";

        $selectResult = Yii::app()->db->createCommand($sql . " LIMIT 2")->queryAll();
        $updateViewResult = Yii::app()->db->createCommand($viewSql)->execute();
        $selectViewResult = Yii::app()->db->createCommand("SELECT * FROM $viewName LIMIT 2")->queryAll();

        var_dump(compact("selectResult", "updateViewResult", "selectViewResult"));

    }

    public function actionItem()
    {

        $sql = "SELECT \n";
        $sql .= "   node.id as node_id,\n";

        $sql .= "   CASE\n";
        foreach (DataModel::qaModels() as $modelClass => $table) {
            if ($this->_checkTableAndColumnExists($table, "id")) {
                $sql .= "       WHEN $table.id IS NOT NULL THEN $table.id\n";
            }
        }
        $sql .= "       ELSE NULL\n";
        $sql .= "END AS id,\n";

        if (false) {
            foreach (DataModel::qaModels() as $modelClass => $table) {

                $sql .= "   `$table`.`id` AS `$modelClass.id`,\n";
                if ($this->_checkTableAndColumnExists($table, "_title")) {
                    $sql .= "   `$table`.`_title` AS `$modelClass._title`,\n";
                }

            }
        }

        $sql .= "   CASE\n";

        foreach (DataModel::qaModels() as $modelClass => $table) {
            if ($this->_checkTableAndColumnExists($table, "_title")) {
                $sql .= "       WHEN $table.id IS NOT NULL THEN $table._title\n";
            }
        }

        $sql .= "       ELSE NULL\n";
        $sql .= "END AS _title,\n";

        $sql .= "   CASE\n";

        foreach (DataModel::qaModels() as $modelClass => $table) {
            $sql .= "       WHEN $table.id IS NOT NULL THEN '$modelClass'\n";
        }

        $sql .= "       ELSE NULL\n";
        $sql .= "END AS model_class,\n";

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
        $sql .= "END AS item_type\n";

        $sql .= "FROM node\n";

        foreach (DataModel::qaModels() as $modelClass => $table) {
            $sql .= "       LEFT JOIN $table ON $table.node_id = node.id\n";
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

        $selectExistingGoItemsResult = Yii::app()->db->createCommand("SELECT * FROM $viewName WHERE model_class IS NOT NULL LIMIT 2")->queryAll();

        var_dump(compact("selectExistingGoItemsResult"));
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
