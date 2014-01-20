<?php

$messages_to_translate = $model->getParsedSubtitles();
$translateInto = $this->workflowData["translateInto"];

$dataProvider = new CArrayDataProvider(array_values($messages_to_translate), array(
    'id' => 'user',
    'sort' => array(
        'attributes' => array(
            'id', 'username', 'email',
        ),
    ),
    'pagination' => array(
        'pageSize' => 1000, // TODO: Fix that TbEditable
    ),
));
// $dataProvider->getData() will return a list of arrays.


$this->widget('TbGridView', array(
    'id' => 'message-grid',
    'dataProvider' => $dataProvider,
    //'filter' => $model,
    'template' => '{pager}{items}{pager}',
    'pager' => array(
        'class' => 'TbPager',
        'displayFirstAndLast' => true,
    ),
    'columns' => array(
        'id',
        array(
            'name' => 'Subtitle',
            'value' => function ($data) use ($translateInto) {

                    echo $data->timestamp;
                    echo "<br/>";
                    echo $data->sourceMessage;

                },
            'filter' => true,
        ),
        array(
            'name' => 'Translation',
            'value' => function ($data) use ($model, $translateInto) {

                    $category = "video-{$model->id}-subtitles";
                    $message = $data->sourceMessage;
                    $language = $translateInto;
                    $sourceMessage = SourceMessage::ensureSourceMessage($category, $message, $language);

                    $currentTranslation = Yii::t($category, $message, array(), 'editedMessages', $translateInto);
                    $currentFallbackTranslation = Yii::t($category, $message, array(), 'displayedMessages', $translateInto);

                    if ($message == $currentFallbackTranslation) {
                        $emptytext = 'Write {translateIntoLanguage} here';
                    } else {
                        $emptytext = 'Write {translateIntoLanguage} here. If left empty, the translation is "{currentFallbackTranslation}"';
                    }

                    $this->widget('TbEditableField', array(
                        'type' => 'text',
                        'text' => $currentTranslation,
                        'model' => $sourceMessage,
                        'attribute' => 'translation',
                        'emptytext' => Yii::t('app', $emptytext, array('{translateIntoLanguage}' => Yii::app()->params["languages"][$translateInto], '{currentFallbackTranslation}' => $currentFallbackTranslation)),
                        'url' => $this->createUrl('sourceMessage/editableTranslationSaver', array('id' => $sourceMessage->id, 'translateInto' => $translateInto)),
                    ));

                },
            //'filter' => CHtml::listData($model->getMissingTranslations('category'), 'category', 'category'),
        ),

    ),
));

/*
?>

    <ul>
        <?php foreach ($messages_to_translate as $message_to_translate): ?>

            <li><?php echo Yii::t('subtitles_foo', $message_to_translate["sourceMessage"]); ?></li>

        <?php endforeach; ?>
    </ul>

<?php

var_dump($messages_to_translate);
*/