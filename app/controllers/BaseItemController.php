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
     * @return WRestModelBehavior the Rest API model.
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $node = null;
        if (ctype_digit($id)) {
            $node = Node::model()->findByPk($id);
        } else {
            /** @var Route $route */
            $route = Route::model()->with('node')->findByAttributes(array('route' => strtolower((string)$id)));
            if ($route !== null) {
                $node = $route->node;
                // Set the application language to the route language.
                // This way we know which language the item and it's relations should be returned in.
                if (!empty($route->translation_route_language) && Yii::app()->language !== $route->translation_route_language) {
                    Yii::app()->language = $route->translation_route_language;
                }
            }
        }
        if ($node === null) {
            throw new CHttpException(404, sprintf(Yii::t('rest-api', 'Could not find node %s.'), $id));
        }
        try {
            $item = $node->item();
        } catch (CException $e) {
            throw new CHttpException(404, Yii::t('rest-api', $e->getMessage()));
        }
        if ($item === null) {
            throw new CHttpException(404, sprintf(Yii::t('rest-api', 'Could not find item for node %s.'), $id));
        }
        $classname = get_class($item);
        if (!isset(self::$classMap[$classname])) {
            throw new CHttpException(404, sprintf(Yii::t('rest-api', 'Could not find resource for "%s".'), $classname));
        }
        $resourceClassname = self::$classMap[$classname];
        $model = CActiveRecord::model($resourceClassname)->findByPk($item->id);
        if ($model === null) {
            throw new CHttpException(404, sprintf(Yii::t('rest-api', 'Could not find resource for "%s".'), $classname));
        }
        return $model;
    }
}
