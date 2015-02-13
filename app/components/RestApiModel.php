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
        'Page' => 'RestApiCustomPage',
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
        'Page' => 'RestApiCustomPage',
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
        'ItemListConfig' => 'RestApiItemList',
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
     * Returns a Rest API `item` model based on given AR.
     *
     * @see RestApiModel::$itemModels
     * @param ActiveRecord $item the AR to load the Rest API model by.
     * @return WRestModelBehavior|null the model or null if not found.
     */
    public static function loadItem(ActiveRecord $item)
    {
        return self::loadFromClassMap($item, self::$itemModels);
    }

    /**
     * Returns a Rest API `related` model based on given AR.
     *
     * @see RestApiModel::$relatedModels
     * @param ActiveRecord $item the AR to load the Rest API model by.
     * @return RelatedResource|null the model or null if not found.
     */
    public static function loadRelated(ActiveRecord $item)
    {
        return self::loadFromClassMap($item, self::$relatedModels);
    }

    /**
     * Returns a Rest API `translatable` model based on given AR.
     *
     * @see RestApiModel::$translatableModels
     * @param ActiveRecord $item the AR to load the Rest API model by.
     * @return TranslatableResource|null the model or null if not found.
     */
    public static function loadTranslatable(ActiveRecord $item)
    {
        return self::loadFromClassMap($item, self::$translatableModels);
    }

    /**
     * Returns a Rest API `sir trevor block node` model based on given AR.
     *
     * @see RestApiModel::$sirTrevorBlockModels
     * @param ActiveRecord $item the AR to load the Rest API model by.
     * @return WRestModelBehavior|null the model or null if not found.
     */
    public static function loadSirTrevorBlockNode(ActiveRecord $item)
    {
        return self::loadFromClassMap($item, self::$sirTrevorBlockModels);
    }

    /**
     * Checks if given class has an `item_list_config` model and returns it's class name.
     *
     * @param string $className the class name to search the model by.
     * @return string|bool the class name or false if not found.
     */
    public static function getItemListItemClass($className)
    {
        return isset(self::$itemListModels[$className]) ? self::$itemListModels[$className] : false;
    }

    /**
     * Loads an Rest API model from given class map based on provided AR's class.
     *
     * @param ActiveRecord $item the AR to load the Rest API model by.
     * @param array $map the map where to find the model.
     * @return ActiveRecord the model or null if not found.
     */
    protected static function loadFromClassMap(ActiveRecord $item, array $map)
    {
        $className = get_class($item);
        if (!isset($map[$className])) {
            return null;
        }
        return isset(self::$_arCache[$map[$className]][$item->id])
            ? self::$_arCache[$map[$className]][$item->id]
            : (self::$_arCache[$map[$className]][$item->id] = ActiveRecord::model($map[$className])->findByPk($item->id));
    }
} 