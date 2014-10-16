<?php

/**
 * Video file resource controller.
 */
class BaseVideoFileController extends AppRestController
{
    /**
     * @var string the resource model name.
     */
    protected $_modelName = 'RestApiVideoFile';

    /**
     * @inheritdoc
     */
    public function actions()
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
     * Returns a video files subtitles.
     *
     * @param int $id the video file resource id.
     */
    public function actionSubtitles($id)
    {
        $model = $this->loadModel($id);

        $parsedSubtitles = $model->getParsedSubtitles();
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Authorization, Origin, Content-Type, Accept");
        echo $model->getTranslatedSubtitles($parsedSubtitles);

        exit;
    }
}
