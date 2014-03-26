<?php

class VideoFileController extends AppRestController
{

    protected $_modelName = "VideoFile"; //model to be used as resource

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
     */
    public function actionGet()
    {

        $model = $this->getModel();

        $response = new stdClass();

        $response->id = $model->id;
        $response->title = $model->title;
        $response->slug = $model->slug;
        $response->caption = $model->caption;
        $response->about = $model->about;
        //$response->tags = $model->tags;
        $response->subtitles = Yii::app()->createAbsoluteUrl('videoFile/subtitles', array('id' => $model->id));
        $response->thumbnail = !is_null($model->thumbnail_media_id) ? Yii::app()->request->getBaseUrl(true) . '/media/' . $model->thumbnailMedia->path : null;
        $response->clipWebm = !is_null($model->clip_webm_media_id) ? Yii::app()->request->getBaseUrl(true) . '/media/' . $model->clipWebmMedia->path : null;
        $response->clipMp4 = !is_null($model->clip_mp4_media_id) ? Yii::app()->request->getBaseUrl(true) . '/media/' . $model->clipMp4Media->path : null;
        //$response->related = $model->related;
        //$response->overlays = $model->overlays;
        //$response->dubbing = $model->dubbing;

        $this->sendResponse(200, $response);

    }

}