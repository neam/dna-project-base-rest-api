<?php
/**
 * Yii-specific metadata about the data model used for code generation and behavior-configuration
 */

$config = & $gcmsConfig;

$config['params']['dataModelMeta'] = array();

// Models that should have CRUD generated
$config['params']['dataModelMeta']['crudModels'] = array(
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

// Models that are part of the qa process
$config['params']['dataModelMeta']['qaModels'] = array(
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

// The accompanying qa state models
$qaStateModels = array();
foreach ($config['params']['dataModelMeta']['qaModels'] as $model => $table) {
    $qaStateModels[$model . "QaState"] = $table . "_qa_state";
}
$config['params']['dataModelMeta']['qaStateModels'] = $qaStateModels;

// Internal models
$config['params']['dataModelMeta']['internalModels'] = array_merge(array(
    "Node" => "node",
    "EzcExecution" => "ezc_execution",
), $qaStateModels);

