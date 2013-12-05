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

    public function actionGoItems()
    {


    }

}
