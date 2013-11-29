<?php
// GIIC CONFIG FILE
// ----------------

$crudModels = DataModel::crudModels();
$restModels = DataModel::restModels();
$qaModels = DataModel::qaModels();
$qaStateModels = DataModel::qaStateModels();

// merge
$models = array_merge($crudModels, $restModels, $qaModels, $qaStateModels);

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
            "baseClass" => "ActiveRecord",
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