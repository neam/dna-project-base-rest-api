<?php

/**
 * Translator base class for composition items like `CustomPage` and `Composition`.
 */
abstract class CompositionItemTranslator extends ItemTranslator
{
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
