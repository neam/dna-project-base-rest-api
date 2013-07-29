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

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php
    $cs = Yii::app()->getClientScript();
    $cs->registerMetaTag('width=device-width, initial-scale=1.0', 'viewport');
    $cs->registerLinkTag('shortcut icon', NULL, '/favicon.ico', NULL, NULL);

    // CSS files
    $css = Yii::app()->assetManager->publish(
        Yii::app()->theme->basePath . '/css',
        false,
        -1,
        true
    ); // set last param to `true` for development
    $cs->registerCssFile($css . "/backend.css");
    ?>
</head>

<body id="backend">

<div class="container-fluid">
    <div class="subwrapper">
        <div class="row-fluid">
            <div class="span10 content-container">
                <div class="row-fluid">
                    <?php echo $content; ?>
                </div>
            </div>
            <div class="span2 sidebar-container">
                <div class="sidebar-wrapper">
                    <?php $this->renderFile(__DIR__ . '/_sidebar.php') ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- /container -->

<footer></footer>

<?php $this->renderFile(__DIR__ . '/_navbar.php') ?>

</body>
</html>