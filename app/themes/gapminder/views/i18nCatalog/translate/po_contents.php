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
            //'id',
            array(
                'name' => 'Source message',
                'value' => function ($data) use ($translateInto) {
                        if ($data->plural_forms) {
                            $intoLocale = CLocale::getInstance($translateInto);
                            $ct = explode("|", $data->sourceMessage);
                            foreach ($intoLocale->pluralRules as $k => $pluralRule) {
                                echo $pluralRule . ":<br/>";
                                if (isset($ct[$k])) {
                                    $_ = explode("#", $ct[$k], 2);
                                    echo '<div class="well">';
                                    echo nl2br($_[1]);
                                    echo '</div>';
                                } else {
                                    echo Yii::t('app', 'No source message for this plural form');
                                }
                            }
                        } else {
                            echo '<div class="well">';
                            echo nl2br($data->sourceMessage);
                            echo '</div>';
                        }
                        echo Yii::t('app', 'Reference') . ": ";
                        echo "<br>";
                        echo "<small>" . implode("<br>", $data->reference) . "</small>";
                        if (isset($data->context)) {
                            echo "<br>";
                            echo Yii::t('app', 'Context') . ": ";
                            echo "<br>";
                            echo "<small>" . $data->context . "</small>";
                            echo "<br>";
                            echo Yii::t('app', 'Warning: Multiple contexts within I18n Catalogs are not supported');
                        }
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

                        if ($data->plural_forms) {
                            $intoLocale = CLocale::getInstance($translateInto);
                            $ct = explode("|", $currentTranslation);
                            foreach ($intoLocale->pluralRules as $k => $pluralRule) {

                                if (isset($ct[$k])) {
                                    $_ = explode("#", $ct[$k], 2);
                                    $currentTranslation = $_[1];
                                } else {
                                    $currentTranslation = "";
                                }

                                echo $pluralRule . ":<br/>";
                                echo TbHtml::textAreaControlGroup("SourceMessage[{$sourceMessage->id}][$k]", $currentTranslation);
                            }
                        } else {
                            echo TbHtml::textAreaControlGroup("SourceMessage[{$sourceMessage->id}]", $currentTranslation);
                        }
                        echo Yii::t('app', 'Current fallback for {lang}', array('{lang}' => Yii::app()->language)) . ": ";
                        echo '<br>';
                        echo nl2br($currentFallbackTranslation);

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
