<?php

/**
 * Translator base class for composition items like `CustomPage` and `Composition`.
 */
class CompositionItemTranslator extends ItemTranslator
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

    /**
     * Translates a sir trevor block using Yii::t(), i.e. writes the new translation into the `Message` db table.
     *
     * @param TranslatableResource $parent the resource model where the block is defined.
     * @param array $block the block data to translate.
     * @throws CException if the passed block data is invalid.
     */
    protected function translateSirTrevorBlock(TranslatableResource $parent, array $block)
    {
        /** @var SirTrevorBehavior $parent */
        if ($parent->asa('sir-trevor-behavior') === null) {
            throw new \CException('Invalid parent node. Must implement `SirTrevorBehavior` keyed by `sir-trevor-behavior` in behaviors list.');
        }
        /** @var RestApiSirTrevorBlock $model */
        try {
            $model = \Yii::app()->getComponent('sirTrevorBlockFactory')->forgeBlock($block, $parent);
        } catch (\CException $e) {
            // No block model exists for this type of block. Just ignore it.
        }
        if (isset($model)) {
            $model->translate($block);
        }
    }
}
