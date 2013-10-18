<?php
// GIIC CONFIG FILE
// ----------------

// define table list (eg. you don't need MANY_MANY tables)
$baseModels = array(
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

// merge
$models = $baseModels;
foreach ($qaModels as $model => $table) {
    $models[$model . "QaState"] = $table . "_qa_state";
}

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