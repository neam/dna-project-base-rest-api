<?php

class ActivateLinkColumn extends CLinkColumn
{
    protected function renderDataCellContent($row, $data)
    {
        $this->linkHtmlOptions['id'] = "activateLink_{$data->username}";

        parent::renderDataCellContent($row, $data);
    }
} 