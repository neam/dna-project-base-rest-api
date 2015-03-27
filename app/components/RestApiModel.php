<?php

/**
 * Helper for loading different types of Rest API models.
 */
class RestApiModel
{
    /**
     * @var array runtime cache for AR models by class and id.
     */
    private static $_arCache = array();

    /**
     * @var array map of models that act as `item` model, i.e. most models utilized by the API app.
     * These models can be accessed through the `item/{nodeId}` endpoint.
     * Must implement `WRestModelBehavior` behavior.
     */
    protected static $itemModels = array(
        'Composition' => 'RestApiComposition',
        'Page' => 'RestApiPage',
    );

    /**
     * @var array map of models that act as `related` models which can be included in other resource responses.
     * Must implement `RelatedResource` interface.
     */
    protected static $relatedModels = array(
        'Composition' => 'RestApiComposition',
    );

    /**
     * @var array map of models that act as `translatable` models which can be translated through the API.
     * The list does not include models that can be translated as a part of a sir trevor composition, only the ones
     * that can be translated directly through the `/item/translation/{nodeId}` endpoint.
     * Must implement `TranslatableResource` interface.
     */
    protected static $translatableModels = array(
        // 'Page' => 'RestApiPage',
        'Composition' => 'RestApiComposition',
    );

    /**
     * @var array map of models that act as sir trevor blocks in a composition structure.
     */
    protected static $sirTrevorBlockModels = array(
        'HtmlChunk' => 'RestApiHtmlChunk',
        'DownloadLink' => 'RestApiDownloadLink',
        'SlideshowFile' => 'RestApiSlideshowFile',
        'VideoFile' => 'RestApiVideoFile',
        'ItemListConfig' => 'RestApiItemListConfig',
        'Visualization' => 'RestApiVisualization',
    );

    /**
     * @var array map of models valid in `item_list_config` items.
     * Must implement `RelatedResource` interface.
     */
    protected static $itemListModels = array(
        'Composition' => 'RestApiComposition',
        'Profile' => 'RestApiProfile',
    );

    /**
     * Returns a Rest API `item` model based on id and class.
     *
     * @see RestApiModel::$itemModels
     * @param int $modelId the model id.
     * @param string $modelClass the model class name.
     * @return ActiveRecord|null the model or null if not found.
     */
    public static function loadItemByIdAndClass($modelId, $modelClass)
    {
        return self::loadByIdAndClass($modelId, $modelClass, self::$itemModels);
    }

    /**
     * Returns a Rest API `related` model based on model id and class.
     *
     * @see RestApiModel::$relatedModels
     * @param int $modelId the model id.
     * @param string $modelClass the model class name.
     * @return RelatedResource|null the model or null if not found.
     */
    public static function loadRelatedByIdAndClass($modelId, $modelClass)
    {
        return self::loadByIdAndClass($modelId, $modelClass, self::$relatedModels);
    }

    /**
     * Returns a Rest API `translatable` model based on node id.
     *
     * @see RestApiModel::$translatableModels
     * @param int $nodeId the node id.
     * @return ActiveRecord|null the model or null if not found.
     */
    public static function loadTranslatableById($nodeId)
    {
        $result = self::loadByNodeId($nodeId);
        if (is_null($result)) {
            return null;
        }
        return self::loadByIdAndClass($result['modelId'], $result['modelClass'], self::$translatableModels);
    }

    /**
     * Returns a Rest API `sir trevor block` model based on node id.
     *
     * @see RestApiModel::$sirTrevorBlockModels
     * @param int $nodeId the node id.
     * @return ActiveRecord|null the model or null if not found.
     */
    public static function loadSirTrevorBlockById($nodeId)
    {
        $result = self::loadByNodeId($nodeId);
        if (is_null($result)) {
            return null;
        }
        return self::loadByIdAndClass($result['modelId'], $result['modelClass'], self::$sirTrevorBlockModels);
    }

    /**
     * Checks if given class has an `item_list_config` model and returns it's class name.
     *
     * @see RestApiModel::$itemListModels
     * @param string $modelClass the class name to search the model by.
     * @return string|bool the class name or false if not found.
     */
    public static function getItemListConfigItemClass($modelClass)
    {
        return isset(self::$itemListModels[$modelClass]) ? self::$itemListModels[$modelClass] : false;
    }

    /**
     * Loads the model id and class for given node id.
     *
     * @param int $nodeId the node id.
     * @return array|null an array with keys `modelId` and `modelClass` or null if not found.
     */
    protected static function loadByNodeId($nodeId)
    {
        $modelId = null;
        $modelClass = null;
        $command = \barebones\Barebones::fpdo()
            ->from('item')
            ->where('node_id=:nodeId', array(':nodeId' => (int) $nodeId));
        $row = $command->fetch();
        if (!empty($row)) {
            $modelId = (int) $row['id'];
            $modelClass = (string) $row['model_class'];
        }
        if (empty($modelId) || empty($modelClass)) {
            return null;
        }
        return array('modelId' => $modelId, 'modelClass' => $modelClass);
    }

    /**
     * Loads a model base don id and class from given map.
     *
     * @param int $modelId the model id.
     * @param string $modelClass the model class.
     * @param array $map the map.
     * @return CActiveRecord|null the rest model or null if not found.
     */
    protected static function loadByIdAndClass($modelId, $modelClass, array $map)
    {
        if (!isset($map[$modelClass])) {
            return null;
        }
        $restModelClass = $map[$modelClass];
        if (!isset(self::$_arCache[$restModelClass][$modelId])) {
            self::$_arCache[$restModelClass][$modelId] = $restModelClass::model()->findByPk($modelId);
        }
        return self::$_arCache[$restModelClass][$modelId];
    }
}
