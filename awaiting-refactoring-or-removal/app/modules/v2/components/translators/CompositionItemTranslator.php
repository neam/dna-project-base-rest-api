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
                 * "the translated text"
                 *
                 * While the `composition` attribute as a value structured like:
                 * array("data" => array( array("type" => "text" ... ) ... ))
                 */
                if ($attr === 'composition' && isset($value['data']) && is_array($value['data'])) {
                    // sir trevor composition blocks are translated via their block models.
                    foreach ($value['data'] as $block) {
                        $this->translateSirTrevorBlock($model, $block);
                    }
                } elseif (isset($model->{$attr}) && is_string($value)) {
                    // regular model attributes are translated via the `I18nAttributeMessagesBehavior` behavior.
                    $model->{$attr} = $value;
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
        try {
            /** @var RestApiSirTrevorBlock $model */
            $model = \Yii::app()->getComponent('sirTrevorBlockFactory')->forgeBlock($block, $parent);
            $model->translate($block);
        } catch (\RestApiNoBlockModelFound $e) {
            // No block model exists for this type of block. Just ignore it.
        }

        if (isset($block['type'])) {
            $recAttr = $block['type'];
            if (isset($block['data'][$recAttr]) && is_array($block['data'][$recAttr])) {
                foreach ($block['data'][$recAttr] as $child) {
                    $this->translateSirTrevorBlock($parent, $child);
                }
            }
        }
    }
}
