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
                if (is_string($value)) {
                    // regular model attributes are translated via the `I18nAttributeMessagesBehavior` behavior.
                    if (isset($model->{$attr})) {
                        $model->{$attr} = $value;
                    }
                    // todo: what about URLs?
                } elseif (is_array($value)) {
                    if ($attr === 'composition' && isset($value['data']) && is_array($value['data'])) {
                        // sir trevor composition blocks are translated via their block models.
                        foreach ($value['data'] as $block) {
                            $this->translateSirTrevorBlock($model, $block);
                        }
                    }
                }
            }
        }
    }
}
