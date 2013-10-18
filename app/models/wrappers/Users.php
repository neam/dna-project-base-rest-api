<?php

Yii::import('vendor.mishamx.yii-user.models.User');
class Users extends User
{

    public function getItemLabel()
    {
        return $this->username;
    }

}