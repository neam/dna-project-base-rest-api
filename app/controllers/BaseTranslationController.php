<?php

/**
 * Translation resource controller.
 * This is a wrapper for all item translation resources, e.g. video files etc.
 */
class BaseTranslationController extends AppRestController
{
    /**
     * @var array map of AR classes to REST resource classes.
     */
    protected static $classMap = array(
        'videoFile' => 'RestApiVideoFileTranslation',
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
     * Responds to path 'api/<version>/translation/{itemType}/{itemId}'.
     * This endpoint is public but the resources are restricted by "RestrictedAccessBehavior".
     *
     * @param string $itemType the item class, i.e. AR model class name.
     * @param int $itemId the AR model id.
     */
    public function actionGet($itemType, $itemId)
    {
        $model = $this->loadResource($itemType, $itemId);
        $this->sendResponse(200, $model->getAllAttributes());
    }

    /**
     * Updates a translation resource for requested item.
     * Responds to path 'api/<version>/translation/{itemType}/{itemId}'.
     *
     * @param string $itemType the item class, i.e. AR model class name.
     * @param int $itemId the AR model id.
     * @throws CHttpException
     */
    public function actionUpdate($itemType, $itemId)
    {
        // todo: make this respond to /item/translation/999
        // todo: rewrite this to handle translation of any item node with or without all data (also sir trevor blocks).

        $model = $this->loadResource($itemType, $itemId);
        $attributes = Yii::app()->getRequest()->parseJsonParams();
        if (empty($attributes)) {
            throw new CHttpException(400, Yii::t('rest-api', 'Invalid input data.'));
        }

        $trx = Yii::app()->getDb()->beginTransaction();
        try {
            // todo: do we need to save the model for each section (i.e. step) with different scenario??
            $model->scenario = 'into_'.Yii::app()->language.'-step_info';
            $model->setUpdateAttributes($attributes);
            // todo: save fails with "CException(0): Property \"RestApiVideoFileTranslation.about_en\" is not defined. (/code/cms/yiiapps/rest-api/vendor/yiisoft/yii/framework/base/CComponent.php:130)"
            if (!$model->save()/* todo !$model->saveAppropriately()*/) {
                throw new CHttpException(400, Yii::t('rest-api', 'Unable to update translations.'));
            }
        } catch (Exception $e) {
            $trx->rollback();
            throw $e;
        }

        $this->sendResponse(200, $model->getAllAttributes());
    }

    /**
     * Loads the translation resource for given item.
     *
     * @param string $itemType the item class, i.e. AR model class name.
     * @param int $itemId the AR model id.
     * @return WRestModelBehavior
     * @throws CHttpException
     */
    protected function loadResource($itemType, $itemId)
    {
        if (!isset(self::$classMap[$itemType])) {
            throw new CHttpException(404, sprintf(Yii::t('rest-api', 'Could not find translation resource for %s.'), $itemType));
        }
        $className = self::$classMap[$itemType];
        $model = CActiveRecord::model($className)->findByPk((int)$itemId);
        if ($model === null) {
            throw new CHttpException(404, sprintf(Yii::t('rest-api', 'Could not find translation resource for %s #%s.'), $itemType, $itemId));
        }
        return $model;
    }
}
