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
    public function actionJqcList()
    {
        $this->sendResponse(200, array());
    }

    /**
     *
     */
    public function actionJqcCreate()
    {
        $comment = new Comment;
        $comment->_comment = $_REQUEST['comment'];
        if (isset($_REQUEST['parentId'])) {
            $comment->parent_id = $_REQUEST['parentId'];
        }

        if (!$comment->save()) {
            throw new SaveException($comment);
        }

        $comment->refresh();

        $attributes = $comment->jqcAttributes();

        $attributes['CanReply'] = true;
        $attributes['CanDelete'] = Yii::app()->user->id == $comment->author_user_id;

        $this->sendResponse(200, $attributes);
    }

    /**
     * @fake stub
     */
    public function actionJqcDelete()
    {
        $response = "foo-comment-id";
        $this->sendResponse(200, $response);
    }

}