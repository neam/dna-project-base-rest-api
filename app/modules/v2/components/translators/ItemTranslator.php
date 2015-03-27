<?php

/**
 * Translator base component.
 */
abstract class ItemTranslator extends \CComponent
{
    /**
     * Translates a resource.
     *
     * @param TranslatableResource $model the resource model to translate.
     * @param array $params the translations indexed on the resources translatable attributes.
     */
    abstract public function translate(TranslatableResource $model, array $params);
}
