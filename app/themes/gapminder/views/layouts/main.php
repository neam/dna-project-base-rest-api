<?php
/* @var string $content */
?>
<!DOCTYPE html>
<html class="layout-main" lang="<?php echo Yii::app()->language ?>">
<?php Yii::app()->controller->renderPartial('application.themes.gapminder.views.layouts._head'); ?>
<body>
    <div class="layout-main">
        <?php echo $content; ?>
    </div>
</body>
</html>
