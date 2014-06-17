<?php
/* @var Controller|ItemController $this */
/* @var ActiveRecord|ItemTrait $model */
/* @var AppActiveForm $form */
/* @var string $step */
/* @var string $stepCaption */
/* @var string $controllerCssClass */
?>
<?php
$this->breadcrumbs = array(); // TODO: Find and unset previously defined breadcrumbs.
$this->breadcrumbs[Yii::t('app', 'Gapminder Community')] = Yii::app()->homeUrl; // TODO: Get link dynamically.
$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('browse');
$this->breadcrumbs[$model->title] = array('view', 'id' => $model->id);
$this->breadcrumbs[] = Yii::t('app', 'Edit');
?>
<div class="<?php echo $this->getCssClasses($model); ?>">
    <?php $this->widget(
        'ItemEditUi',
        array(
            'model' => $model,
            'step' => $step,
        )
    ); ?>
</div>
