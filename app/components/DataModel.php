<?php

class DataModel
{

    static public function crudModels()
    {

        return array(
            // Contents
            'Changeset' => 'changeset',
            'Chapter' => 'chapter',
            'DataChunk' => 'data_chunk',
            'DataSource' => 'data_source',
            'DownloadLink' => 'download_link',
            'ExamQuestion' => 'exam_question',
            'ExamQuestionAlternative' => 'exam_question_alternative',
            'Exercise' => 'exercise',
            'HtmlChunk' => 'html_chunk',
            'Node' => 'node',
            'Edge' => 'edge',
            'Page' => 'page',
            'PoFile' => 'po_file',
            'Section' => 'section',
            'SectionContent' => 'section_content',
            'SlideshowFile' => 'slideshow_file',
            'Snapshot' => 'snapshot',
            'SpreadsheetFile' => 'spreadsheet_file',
            'TextDoc' => 'text_doc',
            'Tool' => 'tool',
            'VectorGraphic' => 'vector_graphic',
            'VideoFile' => 'video_file',
            // User management
            'Account' => 'users',
            'Profiles' => 'profiles',
        );

    }

    static public function qaModels()
    {

        return array(
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

    }

    static public function qaStateModels()
    {

        $qaStateModels = array();
        foreach (self::qaModels() as $model => $table) {
            $qaStateModels[$model . "QaState"] = $table . "_qa_state";
        }
        return $qaStateModels;

    }

    static public function graphModels()
    {

        return array_merge(self::qaModels(), array(
            'ExamQuestionAlternative' => 'exam_question_alternative',
        ));

    }

    static public function internalModels()
    {

        return array_merge(array(
            "Node" => "node",
            "EzcExecution" => "ezc_execution",
        ), self::qaStateModels());

    }

}
