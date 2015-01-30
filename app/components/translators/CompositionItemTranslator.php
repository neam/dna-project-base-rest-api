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
//        // If this block has a node reference, then we translate it via the `I18nAttributeMessagesBehavior` behavior.
//        if (isset($block['data']['node_id'], $block['data']['attributes']) && is_array($block['data']['attributes'])) {
//            $node = Node::model()->findByPk((int)$block['data']['node_id']);
//            if ($node !== null) {
//                try {
//                    $item = $node->item();
//                } catch (NodeItemExistsButIsRestricted $e) {
//                    return;
//                }
//                $model = RestApiModel::getTranslatableModel($item);
//                if ($model !== null) {
//                    $this->translate($model, $block['data']['attributes']);
//                }
//            }
//        }
        /** @var SirTrevorBehavior $parent */
        if ($parent->asa('sir-trevor-behavior') === null) {
            throw new \CException('Invalid parent node. Must implement `SirTrevorBehavior` keyed by `sir-trevor-behavior` in behaviors list.');
        }
        /** @var RestApiSirTrevorBlock $model */
        try {
            $model = \Yii::app()->getComponent('sirTrevorBlockFactory')->forgeBlock($block);
        } catch (\CException $e) {
            // No block model exists for this type of block. Just ignore it.
        }
        $model->context = $parent;
        $model->translate($block);
    }
}
