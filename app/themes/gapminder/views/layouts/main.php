<?php
/* @var string $content */
?>
<!DOCTYPE html>
<html class="layout-main" lang="<?php echo Yii::app()->language ?>">
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta charset="utf-8">
    <?php Html::registerCss(); ?>
    <?php Html::jsDirtyForms(); // TODO: Load this only when needed. ?>
    <?php Yii::app()->ga->registerTracking(); ?>
</head>
<body>
    <?php $this->renderPartial('application.themes.gapminder.views.layouts._menu'); ?>
    <?php $this->widget('\TbAlert'); ?>
    <?php echo $content; ?>
    <?php Yii::app()->yiistrap->registerAllScripts(); ?>
</body>
</html>
