<?php
/** @var ActiveRecord $model */
/** @var TbActiveForm $form */
/** @var array $htmlOptions */
?>
<?php foreach ($attributes as $attribute): ?>
    <?php echo $form->dropDownListRow($model, $attribute, Html::getLanguages(), $htmlOptions); ?>
<?php endforeach; ?>
