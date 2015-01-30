<?php

/**
 * Translation resource controller.
 * This is a wrapper for all item translation resources, e.g. pages, go items, video files etc.
 */
class BaseTranslationController extends AppRestController
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
                    'update' // todo: remove
                )
            ),
            // Logged in users can do whatever they want to.
            array('allow', 'users' => array('@')),
            // Not logged in users can't do anything except above.
            array('deny'),
        );
    }

    /**
     * Gets a translation resource for requested item.
     * Responds to path 'api/<version>/item/translation/{nodeId}'.
     * This endpoint is public but the resources are restricted by "RestrictedAccessBehavior".
     *
     * @param int $nodeId the item node ID.
     */
    public function actionGet($nodeId)
    {
        /** @var TranslatableResource $model */
        $model = $this->loadModel($nodeId);
        $this->sendResponse(200, $model->getTranslatedAttributes());
    }

    /**
     * Updates a translation resource for requested item.
     * Responds to path 'api/<version>/item/translation/{nodeId}'.
     *
     * @param int $nodeId the item node ID.
     * @throws CException
     * @throws CHttpException
     */
    public function actionUpdate($nodeId)
    {
        // todo: access rights

        /** @var TranslatableResource $model */
        $model = $this->loadModel($nodeId);
        $params = Yii::app()->getRequest()->parseJsonParams();
        // Hack for converting stdClass to Array as the Wrest extension does not allow us to get the params as Array.
        $params = json_decode(json_encode($params), true);
        if (empty($params) || empty($params['translations'])) {
            throw new CHttpException(400, Yii::t('rest-api', 'Invalid input data.'));
        }
        $trx = Yii::app()->getDb()->beginTransaction();
        try {
            /** @var ItemTranslator $translator */
            $translator = Yii::app()->getComponent('itemTranslatorFactory')->forgeTranslator($model);
            $translator->translate($model, $params['translations']);
            if (!$model->save()) {
                throw new CHttpException(400, Yii::t('rest-api', 'Unable to save translations.'));
            }
            $trx->commit();
        } catch (CException $e) {
            $trx->rollback();
            throw $e;
        }
        $this->sendResponse(200, $model->getTranslatedAttributes());
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
        $node = $this->loadNodeByIdOrRoute($id);
        $item = $this->loadItemByNode($node);
        $model = RestApiModel::loadTranslatable($item);
        if ($model === null) {
            throw new CHttpException(404, sprintf(Yii::t('rest-api', 'Could not find resource for "%s".'), get_class($item)));
        }
        return $model;
    }
}
