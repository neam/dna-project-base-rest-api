<?php
/*
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'thumbnailMedia',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'
        ),
    )
    , true);
echo $form->customRow($model, 'thumbnail_media_id', $input);
*/
?>

<?php
$formId = 'chapter-thumbnail_media_id-' . \uniqid() . '-form';
?>

<?php if ($model->getAttributeHint("thumbnail")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("thumbnail"); ?>
    </p>
<?php endif; ?>
