<?php
// GIIC CONFIG FILE
// ----------------

// define table list (eg. you don't need MANY_MANY tables)
$models = array(
    'Chapter' => 'chapter',
    'DataChunk' => 'data_chunk',
    'DataSource' => 'data_source',
    'DownloadLink' => 'download_link',
    'ExamQuestion' => 'exam_question',
    'ExamQuestionAlternative' => 'exam_question_alternative',
    'Exercise' => 'exercise',
    'HtmlChunk' => 'html_chunk',
    'PoFile' => 'po_file',
    'Section' => 'section',
    'SectionContent' => 'section_content',
    'SlideshowFile' => 'slideshow_file',
    'Snapshot' => 'snapshot',
    'SpreadsheetFile' => 'spreadsheet_file',
    'TeachersGuide' => 'teachers_guide',
    'TextDoc' => 'text_doc',
    'Tool' => 'tool',
    'VectorGraphic' => 'vector_graphic',
    'VideoFile' => 'video_file',
);

$qaModels = array(
    'Chapter' => 'chapter',
    'DataChunk' => 'data_chunk',
    'DataSource' => 'data_source',
    'ExamQuestion' => 'exam_question',
    'Exercise' => 'exercise',
    'PoFile' => 'po_file',
    'SlideshowFile' => 'slideshow_file',
    'Snapshot' => 'snapshot',
    'TextDoc' => 'text_doc',
    'Tool' => 'tool',
    'VectorGraphic' => 'vector_graphic',
    'VideoFile' => 'video_file',
);

$qaStateModels = array_keys($qaModels);
array_walk($qaStateModels, function (&$value, $key) {
    $value .= "QaState";
});

$qaStateTables = array_values($qaModels);
array_walk($qaStateTables, function (&$value, $key) {
    $value .= "_qa_state";
});

// init actions
$actions = array();

$cruds = array_merge($models, array_combine($qaStateModels, $qaStateTables));

// generate hybrid CRUDs into application
foreach ($cruds AS $model => $table) {
    $action = array(
        "codeModel" => "FullCrudCode",
        "generator" => 'vendor.phundament.gii-template-collection.fullCrud.FullCrudGenerator',
        "templates" => array(
            'hybrid' => dirname(__FILE__) . '/../../../../vendor/phundament/gii-template-collection/fullCrud/templates/hybrid',
        ),
        "model" => array(
            "model" => "application.models." . $model,
            "controller" => lcfirst($model),
            "template" => "hybrid",
            "internalModels" => array_merge(array(
                "Node",
                "EzcExecution",
            ), $qaStateModels),
        )
    );

    if (in_array($model, array(
        "ExamQuestion",
        "ExamQuestionAlternative",
        "HtmlChunk",
    ))
    ) {
        $action["model"]["textEditor"] = "html5Editor";
    }

    $actions[] = $action;
}
return array(
    "actions" => $actions
);