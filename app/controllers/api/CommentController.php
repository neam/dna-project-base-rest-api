<?php

class CommentController extends AppRestController
{

    protected $_modelName = "Comment"; //model to be used as resource

    public function actions() //determine which of the standard actions will support the controller
    {
        return array(
            'list' => array( //use for get list of objects
                'class' => 'WRestListAction',
                'filterBy' => array( //this param user in `where` expression when forming an db query
                    'name_in_table' => 'request_param_name', // 'name_in_table' => 'request_param_name'
                ),
                'limit' => 'limit', //request parameter name, which will contain limit of object
                'page' => 'page', //request parameter name, which will contain requested page num
                'order' => 'order', //request parameter name, which will contain ordering for sort
            ),
            'delete' => 'WRestDeleteAction',
            'get' => 'WRestGetAction',
            'create' => 'WRestCreateAction', //provide 'scenario' param
            'update' => array(
                'class' => 'WRestUpdateAction',
                'scenario' => 'update', //as well as in WRestCreateAction optional param
            )
        );
    }

    /**
     * @fake stub
     */
    public function actionList()
    {
        $this->sendResponse(200, array());
    }

    /**
     * @fake stub
     */
    public function actionCreate()
    {
        $comment = $_REQUEST['comment'];
        $response = array(
            "Id" => "foo-comment-id",
            "Author" => "asdfa sdfasf",
            "Comment" => $comment,
            "Date" => "bar",
            "CanDelete" => true,
            "CanReply" => true,
        );
        $this->sendResponse(200, $response);
    }

    /**
     * @fake stub
     */
    public function actionDelete()
    {
        $response = "foo-comment-id";
        $this->sendResponse(200, $response);
    }

}