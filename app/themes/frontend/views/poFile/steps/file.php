<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'originalMedia',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'
        ),
    )
    , true);
echo $form->customRow($model, 'original_media_id', $input);
?>

<?php
$formId = 'pofile-original_media_id-' . \uniqid() . '-form';
?>

<?php if ($model->getAttributeHint("thumbnail")): ?>
    <p class="alert alert-info help-block">
        <?php echo $model->getAttributeHint("file"); ?>
    </p>
<?php endif; ?>