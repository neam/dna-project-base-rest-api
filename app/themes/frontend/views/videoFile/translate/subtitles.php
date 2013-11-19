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
            'value' => '$data->sourceMessage',
            'filter' => true,
        ),
        array(
            'name' => 'Translation',
            'value' => function ($data) use ($translateInto) {

                    $category = 'video-' . $data->id . '-subtitles';
                    $message = $data->sourceMessage;
                    $language = $translateInto;
                    $message = SourceMessage::ensureMessage($category, $message, $language);

                    $this->widget('TbEditableField', array(
                        'type' => 'text',
                        'model' => $message,
                        'attribute' => 'translation',
                        'url' => $this->createUrl('message/editableSaver'),
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