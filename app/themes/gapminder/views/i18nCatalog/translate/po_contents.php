<?php
/* @var I18nCatalogController|ItemController $this */
/* @var I18nCatalog|ItemTrait $model */
/* @var AppActiveForm $form */
?>
<?php $messages_to_translate = $model->getParsedPoContentsForTranslation(); ?>
<?php $translateInto = $this->workflowData['translateInto']; ?>
<?php $dataProvider = new CArrayDataProvider(array_values($messages_to_translate), array(
    'id' => 'user',
    'sort' => array(
        'attributes' => array(
            'id', 'sourceMessage',
        ),
    ),
    'pagination' => array(
        'pageSize' => 1000, // TODO: Fix that TbEditable
    ),
)); ?>
<?php $this->widget(
    '\TbGridView',
    array(
        'id' => 'message-grid',
        'dataProvider' => $dataProvider,
        //'filter' => $model,
        'template' => '{pager}{items}{pager}',
        'pager' => array(
            'class' => '\TbPager',
            'hideFirstAndLast' => false,
        ),
        'columns' => array(
            'id',
            array(
                'name' => 'Source message',
                'value' => function ($data) use ($translateInto) {
                        echo $data->sourceMessage;
                    },
                'filter' => true,
            ),
            array(
                'name' => 'Translation',
                'value' => function ($data) use ($model, $form, $translateInto) {

                        $sourceMessage = SourceMessage::ensureSourceMessage($model->getTranslationCategory('po_contents'), $data->sourceMessage, $translateInto);

                        $currentFallbackTranslation = Yii::t($model->getTranslationCategory('po_contents'), $data->sourceMessage, array(), 'displayedMessages', $translateInto);
                        $currentTranslation = Yii::t($model->getTranslationCategory('po_contents'), $data->sourceMessage, array(), 'editedMessages', $translateInto);

                        //var_dump(compact("currentFallbackTranslation", "currentTranslation"));

                        echo TbHtml::textAreaControlGroup("SourceMessage[{$sourceMessage->id}]", $currentTranslation);
                        echo Yii::t('app', 'Current fallback') . ": " . $currentFallbackTranslation;

                    },
                //'filter' => CHtml::listData($model->getMissingTranslations('category'), 'category', 'category'),
            ),

        ),
    )
); ?>
<?php /*
<ul>
    <?php foreach ($messages_to_translate as $message_to_translate): ?>
        <li><?php echo Yii::t('subtitles_foo', $message_to_translate['sourceMessage']); ?></li>
    <?php endforeach; ?>
</ul>
*/
?>
<?php publishJs('/themes/frontend/js/popover-focus-caret.js', CClientScript::POS_END); ?>
<?php //publishJs('/themes/frontend/js/force-clean-dirty-forms.js', CClientScript::POS_END); ?>
