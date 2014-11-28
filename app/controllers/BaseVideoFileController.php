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
    public function accessRules()
    {
        return array(
            // Not logged in users can do the following actions.
            array(
                'allow',
                'actions' => array(
                    'preflight',
                    'get',
                    'list',
                    'subtitles',
                )
            ),
            // Logged in users can do whatever they want to.
            array('allow', 'users' => array('@')),
            // Not logged in users can't do anything except above.
            array('deny'),
        );
    }

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
        );
    }

    /**
     * Returns a video files subtitles.
     * Responds to path 'api/<version>/videoFile/subtitles/{id}'.
     *
     * @param int $id the video file resource id.
     */
    public function actionSubtitles($id)
    {
        $model = $this->loadModel($id);
        $subtitles = $model->getTranslatedSubtitles($model->getParsedSubtitles());
        // This is a bit of a hack that a JSON REST API returns data with content type text/html, but it is a
        // necessary evil at the moment as the video player in use requires the subtitles to be loaded as text.
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Authorization, Origin, Content-Type, Accept");
        echo $subtitles;
        exit;
    }
}
