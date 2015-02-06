<?php

/**
 * Helper factory for loading different types of Rest API models.
 */
class RestApiModel
{
    /**
     * @var array map of models that act as `item` model, i.e. most models utilized by the API app.
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
     * Must implement `TranslatableResource` interface.
     */
    protected static $translatableModels = array(
        'Page' => 'RestApiCustomPage',
        'HtmlChunk' => 'RestApiHtmlChunk',
        'DownloadLink' => 'RestApiDownloadLink',
        'SlideshowFile' => 'RestApiSlideshowFile',
    );

    /**
     * Returns a Rest API `item` model based on given AR.
     *
     * @see RestApiModelFactory::$itemModels
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
     * @see RestApiModelFactory::$relatedModels
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
     * @see RestApiModelFactory::$translatableModels
     * @param ActiveRecord $item the AR to load the Rest API model by.
     * @return TranslatableResource|null the model or null if not found.
     */
    public static function loadTranslatable(ActiveRecord $item)
    {
        return self::loadFromClassMap($item, self::$translatableModels);
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
        return CActiveRecord::model($map[$className])->findByPk($item->id);
    }
} 