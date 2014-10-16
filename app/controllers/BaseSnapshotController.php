<?php

class BaseSnapshotController extends AppRestController
{
    /**
     * @var string the model class used as resource.
     */
    protected $_modelName = "Snapshot";

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return array(
            'list' => array(
                'class' => 'WRestListAction',
                'limit' => 'limit',
                'page' => 'page',
                'order' => 'order',
            ),
            'get' => 'WRestGetAction',
//            'delete' => 'WRestDeleteAction',
//            'create' => 'WRestCreateAction',
//            'update' => array(
//                'class' => 'WRestUpdateAction',
//                'scenario' => 'update',
//            )
        );
    }
}
