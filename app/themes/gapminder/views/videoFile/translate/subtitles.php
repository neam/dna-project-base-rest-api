<?php
/* @var VideoFileController|ItemController $this */
/* @var VideoFile|ItemTrait $model */
/* @var AppActiveForm $form */
?>
<?php $messages_to_translate = $model->getParsedSubtitles(); ?>
<?php $translateInto = $this->workflowData['translateInto']; ?>
<?php $dataProvider = new CArrayDataProvider(array_values($messages_to_translate), array(
    'id' => 'user',
    'sort' => array(
        'attributes' => array(
            'id', 'timestamp', 'sourceMessage',
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
        'htmlOptions' => array(
            'class' => 'translate-subtitles',
        ),
        'template' => '{pager}{items}{pager}',
        'pager' => array(
            'class' => '\TbPager',
            'hideFirstAndLast' => false,
        ),
        'columns' => array(
            'id',
            array(
                'name' => 'Subtitle',
                'htmlOptions' => array(
                    'class' => 'column-subtitle',
                ),
                'value' => function ($data) use ($translateInto) {
                        echo $data->timestamp;
                        echo '<br>';
                        echo nl2br($data->sourceMessage);
                    },
                'filter' => true,
            ),
            array(
                'name' => 'Translation',
                'htmlOptions' => array(
                    'class' => 'column-translation',
                ),
                'value' => function ($data) use ($model, $form, $translateInto) {

                        // TODO: Clean up.

                        $sourceMessage = SourceMessage::ensureSourceMessage($model->getTranslationCategory('subtitles'), $data->sourceMessage, $translateInto);

                        $currentTranslation = Yii::t($model->getTranslationCategory('subtitles'), $data->sourceMessage, array(), 'editedMessages', $translateInto);

                        echo TbHtml::textAreaControlGroup("SourceMessage[{$sourceMessage->id}]", $currentTranslation);

                        if (is_null($currentTranslation)) {
                            $currentFallbackTranslation = Yii::t($model->getTranslationCategory('subtitles'), $data->sourceMessage, array(), 'displayedMessages', $translateInto);
                            echo Yii::t('app', 'Current fallback for {lang}', array('{lang}' => Yii::app()->language)) . ": ";
                            echo '<br>';
                            echo nl2br($currentFallbackTranslation);
                        }

                        /*
                        $category = "video-{$model->id}-subtitles";
                        $message = $data->sourceMessage;
                        $language = $translateInto;
                        $sourceMessage = SourceMessage::ensureSourceMessage($category, $message, $language);

                        $currentTranslation = Yii::t($category, $message, array(), 'editedMessages', $translateInto);
                        $currentFallbackTranslation = Yii::t($category, $message, array(), 'displayedMessages', $translateInto);

                        if ($message == $currentFallbackTranslation) {
                            $emptytext = 'Write {translateIntoLanguage} here';
                        } else {
                            $emptytext = "Write {translateIntoLanguage} here. If left empty, the translation is '{currentFallbackTranslation}'";
                        }

                        $this->widget(
                            'TbEditableField', array(
                                'type' => 'textarea',
                                'text' => $currentTranslation,
                                'model' => $sourceMessage,
                                'attribute' => 'translation',
                                'emptytext' => Yii::t('app', $emptytext, array(
                                    '{translateIntoLanguage}' => Yii::app()->params['languages'][$translateInto],
                                    '{currentFallbackTranslation}' => $currentFallbackTranslation,
                                )),
                                'url' => $this->createUrl(
                                    'sourceMessage/editableTranslationSaver',
                                    array(
                                        'id' => $sourceMessage->id,
                                        'translateInto' => $translateInto,
                                    )
                                ),
                            )
                        );
                        */
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
