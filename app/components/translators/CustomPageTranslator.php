<?php

class CustomPageTranslator extends CompositionItemTranslator
{
    /**
     * @inheritdoc
     */
    public function translate(TranslatableResource $model, array $params)
    {
        $attributes = $model->getTranslationAttributes();
        if (!empty($attributes) && !empty($params)) {
            foreach ($params as $attr => $value) {
                if (!in_array($attr, $attributes)) {
                    continue;
                }
                /*
                 * Translatable attributes have a value structured like:
                 * array("value" => "the translated text")
                 *
                 * While the `composition` attribute as a value structured like:
                 * array("data" => array( array("type" => "text" ... ) ... ))
                 */
                if (is_array($value)) {
                    if ($attr === 'composition' && isset($value['data']) && is_array($value['data'])) {
                        // sir trevor composition blocks are translated via their block models.
                        foreach ($value['data'] as $block) {
                            $this->translateSirTrevorBlock($model, $block);
                        }
                    } elseif (isset($value['value'], $model->{$attr}) && is_string($value['value'])) {
                        // regular model attributes are translated via the `I18nAttributeMessagesBehavior` behavior.
                        $model->{$attr} = $value['value'];
                    }
                }
            }
        }
    }
}
