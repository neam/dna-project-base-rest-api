<?php

/**
 * Item resource controller.
 * This is a wrapper for all item resources, e.g. compositions, video files etc.
 * It works based on the node ID of the item which is provided instead of the resource ID when performing actions.
 */
class BaseItemController extends AppRestController
{
    /**
     * @inheritdoc
     */
    protected $_modelName = 'Item';

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
                )
            ),
            // Logged in users can do whatever they want to.
            array('allow', 'users' => array('@')),
            // Not logged in users can't do anything except above.
            array('deny'),
        );
    }

    /**
     * Returns the requested item resource.
     * Responds to path 'api/<version>/item/{id}'.
     * This endpoint is public but the resources are restricted by "RestrictedAccessBehavior".
     *
     * @param int|string $id the node id or the route of the item to get.
     */
    public function actionGet($id)
    {
        /** @var WRestModelBehavior $model */
        $model = $this->loadModel($id);
        $this->sendResponse(200, $model->getAllAttributes());
    }

    /**
     * @inheritdoc
     */
    public function loadModel($id)
    {
        $node = $this->loadNodeByIdOrRoute($id);
        $item = $this->loadItemByNode($node);
        $model = RestApiModel::loadItem($item);
        if ($model === null) {
            throw new CHttpException(404, sprintf(Yii::t('rest-api', 'Could not find resource for "%s".'), get_class($item)));
        }
        return $model;
    }
}
