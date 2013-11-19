<?php

$messages_to_translate = $model->getParsedSubtitles();
?>

    <ul>
        <?php foreach ($messages_to_translate as $message_to_translate): ?>

            <li><?php echo Yii::t('subtitles_foo', $message_to_translate["sourceMessage"]); ?></li>

        <?php endforeach; ?>
    </ul>

<?php

var_dump($messages_to_translate);