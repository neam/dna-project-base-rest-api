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


<div class="form-actions">
    <?php
    echo CHtml::Button(Yii::t('model', 'Cancel'), array(
            'submit' => (isset($_GET['returnUrl'])) ? $_GET['returnUrl'] : array('chapter/admin'),
            'class' => 'btn'
        )
    );
    echo ' ';
    echo CHtml::submitButton(Yii::t('model', 'Save'), array(
            'class' => 'btn btn-primary'
        )
    );
    ?>
</div>

<div class="alert alert-info">
    Hint: Lorem ipsum
</div>