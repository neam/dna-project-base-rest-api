<?php

class AccountLinkColumn extends CLinkColumn
{
    protected function renderDataCellContent($row, $data)
    {
        $this->linkHtmlOptions['id'] = "viewLink_{$data->username}";

        parent::renderDataCellContent($row, $data);
    }
}