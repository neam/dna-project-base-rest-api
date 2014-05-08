<?php
/* @var string $content */
?>
<!DOCTYPE html>
<html class="layout-main" lang="<?php echo Yii::app()->language ?>">
<?php Yii::app()->controller->renderPartial('application.themes.gapminder.views.layouts._head'); ?>
<body>
    <?php $this->renderPartial('application.themes.gapminder.views.layouts._menu'); ?>
    <?php $this->widget('\TbAlert'); ?>
    <?php echo $content; ?>
    <?php $this->renderPartial('application.themes.gapminder.views.layouts._footer'); ?>
</body>
</html>
