<?php

class ItemTranslatorFactory extends \CApplicationComponent
{
    /**
     * @var array map of translators per resource model.
     * The resource model must implement TranslatableResource interface.
     */
    protected static $translators = array(
//        'RestApiPage' => 'application.components.translators.CompositionItemTranslator',
        'RestApiComposition' => 'application.components.translators.CompositionItemTranslator',
    );

    /**
     * Forges a new translator for the given resource and returns it.
     *
     * @param TranslatableResource $resource the resource model to create the translator for.
     * @return ItemTranslator the translator component.
     * @throws CException if the translator cannot be created.
     */
    public function forgeTranslator(TranslatableResource $resource)
    {
        $className = get_class($resource);
        if (!isset(self::$translators[$className])) {
            throw new \CException(sprintf('No translator found for "%s".', $className));
        }
        return \Yii::createComponent(array('class' => self::$translators[$className]));
    }
}
