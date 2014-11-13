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

//    /**
//     * Returns a video files subtitles.
//     *
//     * @param int $id the video file resource id.
//     */
//    public function actionSubtitles($id)
//    {
//        $model = $this->loadModel($id);
//
//        $parsedSubtitles = $model->getParsedSubtitles();
//        header("Access-Control-Allow-Origin: *");
//        header("Access-Control-Allow-Headers: Authorization, Origin, Content-Type, Accept");
//        echo $model->getTranslatedSubtitles($parsedSubtitles);
//
//        exit;
//    }
}
