<?php

class GroupRoleToggleColumn extends TbToggleColumn
{
    protected function initButton()
    {
        parent::initButton();

        $this->button['url'] = 'Yii::app()->controller->createUrl("' . $this->toggleAction . '",array("id"=>$data->accountId,"attribute"=>"{$data->groupName}_' . $this->name . '"))';
    }
}