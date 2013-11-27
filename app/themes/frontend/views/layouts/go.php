<!DOCTYPE html>
<html lang="<?php echo Yii::app()->language ?>">
<head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="description"
          content="<?php echo (P3Page::getActivePage()) ? P3Page::getActivePage()->t('description') : '' ?>">
    <meta name="keywords"
          content="<?php echo (P3Page::getActivePage()) ? P3Page::getActivePage()->t('keywords') : '' ?>">
    <meta name="author" content="">
</head>

<body>

<div id="go-page-container" class="container" style="height: 100%; width: 100%">
    <div id="banner"
         style="height: 16px; width: 100%; z-index: 1000; color: rgb(253, 253, 253); background-color: rgb(255, 153, 0); font-family: 'Arial Rounded MT Bold', sans-serif; font-size: 12pt; padding: 10px 0px 10px 0px;">
        <a href="http://www.gapminder.org" style=" text-decoration: none; color: inherit; padding: 10px 0px 10px 10px;">GAPMINDER</a>
    </div>
    <div id="go-page-content" style="height: 100%; width: 100%;">
        <?php echo $content; ?>
    </div>
</div>
</body>
<script type="text/javascript">
    function resize() {
        var padding = 20;
        var screenHeight = window.innerHeight - padding;
        document.getElementById('go-page-container').style.height = screenHeight + 'px';
        document.getElementById('go-page-content').style.height = (screenHeight - 60) + 'px';
    }

    resize();

    window.onresize = resize;

    window.dispatchEvent(new Event('resize'));
</script>
</html>