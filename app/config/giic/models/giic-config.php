<?php
// GIIC CONFIG FILE
// ----------------

$baseModels = Yii::app()->params['dataModelMeta']['crudModels'];
$qaModels = Yii::app()->params['dataModelMeta']['qaModels'];
$qaStateModels = Yii::app()->params['dataModelMeta']['qaStateModels'];

// merge
$models = array_merge($baseModels, $qaModels, $qaStateModels);

// init actions
$actions = array();

// generate default models
foreach ($models AS $model => $table) {
    $actions[] = array(
        "codeModel" => "FullModelCode",
        "generator" => 'vendor.phundament.gii-template-collection.fullModel.FullModelGenerator',
        "templates" => array(
            'default' => dirname(__FILE__) . '/../../../../vendor/phundament/gii-template-collection/fullModel/templates/default',
        ),
        "model" => array(
            "tableName" => $table,
            "modelClass" => $model,
            "modelPath" => "application.models",
            "template" => "default"
        )
    );
}

return array(
    "actions" => $actions
);