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
        /** @var TranslatableResource $model */
        $model = $this->loadModel($nodeId);
        if (!$this->canUserTranslateModel($model)) {
            throw new CHttpException(403, Yii::t('rest-api', 'You are not allowed to translate this resource.'));
        }
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
     * Loads a Rest API model based on node id.
     *
     * @param int|string $id either node id.
     * @return TranslatableResource|ActiveRecord the Rest API model.
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = RestApiModel::loadTranslatableById($id);
        if (is_null($model)) {
            throw new CHttpException(404, sprintf('Could not find resource for node #%s.', $id));
        }
        return $model;
    }

    /**
     * Checks if the current user has re access rights to translate the model.
     * The access rights required is the have the role "GroupTranslator" in on of the groups the model belongs to.
     *
     * @param TranslatableResource|ActiveRecord $model the model we want to check access for.
     * @return bool true if access is granted, false otherwise.
     */
    protected function canUserTranslateModel($model)
    {
        $command = Yii::app()->getDb()->createCommand()
            ->select('group.id AS group_id')
            ->from('group')
            ->leftJoin('node_has_group', '`node_has_group`.`group_id`=`group`.`id`')
            ->where('`node_has_group`.`node_id`=:nodeId', array(':nodeId' => (int) $model->node_id));

        $userId = (int)Yii::app()->getUser()->id;
        foreach ($command->queryAll() as $row) {
            if (PermissionHelper::hasRole($userId, PermissionHelper::groupIdToName($row['group_id']), Role::GROUP_TRANSLATOR)) {
                return true;
            }
        }

        return false;
    }
}
