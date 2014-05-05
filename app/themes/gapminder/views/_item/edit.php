<?php
/* @var Controller|ItemController $this */
/* @var ActiveRecord|ItemTrait $model */
/* @var AppActiveForm $form */
/* @var string $step */
/* @var string $stepCaption */
/* @var string $controllerCssClass */
?>
<?php $this->breadcrumbs[Yii::t('app', 'Gapminder Community')] = Yii::app()->homeUrl; // TODO: Get link dynamically. ?>
<?php $this->breadcrumbs[Yii::t('app', 'Dashboard')] = array('/account/dashboard'); ?>
<?php $this->breadcrumbs[] = $model->itemLabel; ?>
<div class="<?php echo $this->getCssClasses($model); ?>">
    <?php $this->widget(
        'ItemEditUi',
        array(
            'model' => $model,
            'step' => $step,
        )
    ); ?>
</div>
