<?php /** @var VideoFile $model */ ?>

<?php echo $form->textAreaRow($model, 'subtitles_' . $model->source_language, array(
    'rows' => 50,
    'cols' => 50,
    'class' => 'span8',
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'subtitles_' . $model->source_language, 'subtitles'),
    ),
)); ?>
