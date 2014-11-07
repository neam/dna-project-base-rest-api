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
    protected function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            $language = Yii::app()->getRequest()->getParam('language');
            if ($language !== null) {
                $supportedLanguages = LanguageHelper::getLanguageList();
                if (isset($supportedLanguages[$language])) {
                    Yii::app()->language = $language;
                }
            }
            return true;
        }
        return false;
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
        $model = $this->loadResource($itemType, $itemId);
        $attributes = Yii::app()->getRequest()->parseJsonParams();
        if (empty($attributes)) {
            throw new CHttpException(400, Yii::t('rest-api', 'Invalid input data.'));
        }

        // todo: replace this with "$model->setUpdateAttributes($attributes);" once the profile edit branch has been merged.
        $values = array_intersect_key($attributes, array_flip($model->getUpdateAttributes()));
        foreach($values as $name => $value) {
            if (array_key_exists($name, $attributes)) {
                $setter = 'set'.$name;
                if (method_exists($model, $setter)) {
                    $model->$setter($value);
                } else {
                    $model->$name = $value;
                }
            }
        }

        // todo: save with change set??
        if (!$model->save()) {
            throw new CHttpException(400, Yii::t('rest-api', 'Unable to update video file translations.'));
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
