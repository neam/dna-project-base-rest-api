<?php
/* @var string $content */
?>
<!DOCTYPE html>
<html lang="<?php echo Yii::app()->language ?>">
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta charset="utf-8">
    <?php Yii::app()->registerCss(); ?>
    <?php Yii::app()->registerScripts(); ?>
</head>
<body>
    <div class="layout-main">
        <?php echo $content; ?>
    </div>
</body>
</html>
