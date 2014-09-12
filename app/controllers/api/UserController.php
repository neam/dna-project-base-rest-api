<?php

class UserController extends AppRestController
{
    protected $_modelName = 'Account';

    public function actions()
    {
        return array(
            'get' => 'WRestGetAction',
        );
    }

}
