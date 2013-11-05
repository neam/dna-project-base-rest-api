<?php
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
?>

<?php
$formId = 'chapter-thumbnail_media_id-' . \uniqid() . '-form';
?>

<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('app', 'Upload'),
            'icon' => 'icon-plus',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#' . $formId . '-modal',
            ),
        ), true);
        ?>
    </div>
</div>

<?php
$this->beginClip('modal:' . $formId . '-modal');
$this->renderPartial('//p3Media/_modal_form', array(
    'formId' => $formId,
    'inputSelector' => '#Chapter_thumbnail_media_id',
    'model' => new P3Media,
    'pk' => 'id',
    'field' => 'itemLabel',
));
$this->endClip();
?>


<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("thumbnail"); ?>
</p>