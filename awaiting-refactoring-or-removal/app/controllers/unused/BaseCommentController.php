<?php

class BaseCommentController extends AppRestController
{
    /**
     * @var string the resource model name.
     */
    protected $_modelName = "Comment";

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

    /**
     * @fake stub
     */
    public function actionJqcList()
    {

        // Get common criteria used for pagination
        $c = $this->getListCriteria();

        // Collect som metadata about table schema
        $comment = new Comment();
        //$account = new Account();
        $columns = array(
            "comment" => array_keys($comment->attributes),
            "account" => array("username"), //array_keys($account->attributes),
        );

        // Start building the sql-command
        $command = Yii::app()->db->createCommand()
            ->limit($c->limit)
            ->offset($c->offset)
            ->order($c->order);

        $command->order("created ASC");

        $select = U::prefixed_table_fields_wildcard('comment', 'comment', $columns['comment'])
            . "," . U::prefixed_table_fields_wildcard('account', 'account', $columns['account']);

        // Prevent double-escaping ("The method will automatically quote the column names unless a column contains some parenthesis (which means the column contains a DB expression).")
        $select .= ", (-1) AS foo";

        $command->select($select);

        $command->from('comment');

        $command->join('account account', 'account.id = comment.author_user_id');

        $command->params = array();
        /*
        $command->params = array(
            ':node_id' => $node_id,
        );
        */

        if (isset($_REQUEST['context_model'])) {
            $command->andWhere("context_model = :context_model");
            $command->params[":context_model"] = $_REQUEST['context_model'];
        }
        if (isset($_REQUEST['context_id'])) {
            $command->andWhere("context_id = :context_id");
            $command->params[":context_id"] = $_REQUEST['context_id'];
        }
        if (isset($_REQUEST['context_attribute'])) {
            $command->andWhere("context_attribute = :context_attribute");
            $command->params[":context_attribute"] = $_REQUEST['context_attribute'];
        }

        $formatResults = function ($records, $columns) use ($comment) {

            //var_dump(compact("records"));
            $rs = array();
            if ($records) {
                foreach ($records as $r) {
                    $attributes = Comment::convertToJqcAttributes($r);
                    $attributes['CanReply'] = true;
                    $attributes['CanDelete'] = Yii::app()->user->id == $r["comment.author_user_id"];
                    $rs[] = $attributes;
                }
            }
            //var_dump(compact("rs"));
            return $rs;
        };

        //print_r($command->text);print_r($command->params);
        $records = $command->queryAll();

        $this->sendResponse(200, $formatResults($records, $columns));

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
        if (isset($_REQUEST['context_model'])) {
            $comment->context_model = $_REQUEST['context_model'];
        }
        if (isset($_REQUEST['context_id'])) {
            $comment->context_id = $_REQUEST['context_id'];
        }
        if (isset($_REQUEST['context_attribute'])) {
            $comment->context_attribute = $_REQUEST['context_attribute'];
        }

        $comment->author_user_id = Yii::app()->user->id;

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
     *
     */
    public function actionJqcDelete()
    {
        $comment = Comment::model()->findByPk($_REQUEST['commentId']);
        if (!$comment->delete()) {
            throw new SaveException($comment);
        }
        $this->sendResponse(200, $_REQUEST['commentId']);
    }

}