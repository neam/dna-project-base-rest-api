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
    <div id="logo" style="height: 60px; background: #fff url('http://www.gapminder.org/wp-content/themes/gapminder/images/interface/menu/border-bg.gif') bottom left repeat-x;">
        <a href="http://www.gapminder.org" title="Gapminder">
            <img class="logo" style="margin: 5px 5px 5px 30px" src="http://www.gapminder.org/wp-content/themes/gapminder/images/logos/gapminder_logo_home.jpg" alt="Gapminder - ">
        </a>
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
</script>
</html>