<?php

/**
 * Translator app component for translating node resources, including composition (sir trevor) blocks.
 */
class ItemTranslator extends CApplicationComponent
{
    /**
     * Translates a translatable node resource.
     * Translation is done for both regular node attributes as well as for Sir Trevor compositions.
     * Regular node attributes are saved through the `I18nAttributeMessagesBehavior` behavior, while the Sir Trevor
     * composition blocks are saved explicitly with Yii::t(). Note that Sir Trevor composition blocks that have a node
     * reference, and that node implements `TranslatableResource`, are translated through the
     * `I18nAttributeMessagesBehavior` as well.
     *
     * @param TranslatableResource $model the node resource model to translate.
     * @param array $params the translations indexed on node attribute.
     */
    public function translate(TranslatableResource $model, array $params)
    {
        $attributes = $model->getTranslatableAttributes();
        if (!empty($attributes) && !empty($params)) {
            foreach ($params as $attr => $value) {
                if (!in_array($attr, $attributes)) {
                    continue;
                }
                if (is_string($value)) {
                    // regular model string attributes
                    // todo: how on earth do you translate these? assign the new value to $model->heading or $model->_heading or $model->heading_sv or what?
                    // todo: what about URLs?
                } elseif (is_array($value)) {
                    if ($attr === 'composition' && isset($value['data']) && is_array($value['data'])) {
                        // sir trevor composition blocks
                        foreach ($value['data'] as $block) {
                            $this->translateSirTrevorBlock($model, $block);
                        }
                    }
                }
            }
        }
    }

    /**
     * Translates a sir trevor block using Yii::t(), i.e. writes the new translation into the `Message` db table.
     *
     * @param TranslatableResource $parent the node resource model where the block is defined.
     * @param array $block the block data to translate
     * @throws CException if the passed block data is invalid.
     */
    protected function translateSirTrevorBlock(TranslatableResource $parent, array $block)
    {
        // If this block has a node reference, then we need to translate it as a separate node.
        if (isset($block['data']['node_id'], $block['data']['attributes']) && is_array($block['data']['attributes'])) {
            // todo:
            // 1. load model and check it implements TranslatableResource
            // 2. call $this->translate($model, $block['data']['attributes']);
            $node = Node::model()->findByPk((int)$block['data']['node_id']);
            if ($node !== null) {
                try {
                    $item = $node->item();
                } catch (NodeItemExistsButIsRestricted $e) {
                    return;
                }
                $model = RestApiModelFactory::getTranslatableModel($item);
                if ($model !== null) {
                    $this->translate($model, $block['data']['attributes']);
                }
            }
        } else {
            $model = SirTrevorModelFactory::createBlockModel($block);
            if ($model !== null) {
                $model->contextId = $parent->getNodeId();
                $model->translate($block, $parent);
            }
        }
    }
}
