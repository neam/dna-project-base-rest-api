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
     * @var array map of AR classes to REST resource classes.
     */
    protected static $classMap = array(
        'Composition' => 'RestApiComposition',
        'Page' => 'RestApiCustomPage',
    );

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
        $model = $this->loadModel($id);
        $this->sendResponse(200, $model->getAllAttributes());
    }

    /**
     * Loads a Rest API model based on node id or model route.
     *
     * @param int|string $id either node id or model route, e.g. 1234, "/1234", "/terms".
     * @return ActiveRecord the Rest API model.
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $node = null;
        if (ctype_digit($id)) {
            $command = Yii::app()->getDb()->createCommand()
                ->select('id, model_class')
                ->from('item')
                ->where('node_id=:nodeId');
            $row = $command->queryRow(true, array(':nodeId' => (int)$id));
            if (!empty($row)) {
                $modelId = (int)$row['id'];
                $modelClass = (string)$row['model_class'];
            }
        } else {
            $command = Yii::app()->getDb()->createCommand()
                ->select('item.id, item.model_class, route.translation_route_language')
                ->from('route')
                ->leftJoin('item', 'item.node_id=route.node_id')
                ->where('route.route=:route');
            $row = $command->queryRow(true, array(':route' => strtolower((string)$id)));
            if (!empty($row)) {
                $modelId = (int)$row['id'];
                $modelClass = (string)$row['model_class'];
                // Set the application language to the route language.
                // This way we know which language the item and it's relations should be returned in.
                if (!empty($row['translation_route_language']) && Yii::app()->language !== $row['translation_route_language']) {
                    Yii::app()->language = $row['translation_route_language'];
                }
            }
        }
        if (!isset($modelId, $modelClass)) {
            throw new CHttpException(404, sprintf(Yii::t('rest-api', 'Could not find node %s.'), $id));
        }
        if (!isset(self::$classMap[$modelClass])) {
            throw new CHttpException(404, sprintf(Yii::t('rest-api', 'Could not find resource for %s.'), $modelClass));
        }
        $resourceClass = self::$classMap[$modelClass];
        /** @var ActiveRecord $model */
        $model = CActiveRecord::model($resourceClass)->findByPk($modelId);
        if ($model === null) {
            throw new CHttpException(404, sprintf(Yii::t('rest-api', 'Could not find resource for %s#%d.'), $modelClass, $modelId));
        }
        return $model;
    }
}
