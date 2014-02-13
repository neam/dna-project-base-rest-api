<!DOCTYPE html>
<html lang="<?php echo Yii::app()->language ?>">
<head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="description" content="<?php echo (P3Page::getActivePage()) ? P3Page::getActivePage()->description : '' ?>">
    <meta name="keywords" content="<?php echo (P3Page::getActivePage()) ? P3Page::getActivePage()->keywords : '' ?>">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php Html::registerHeadTags(); ?>
    <?php Html::registerCss(); ?>
    <?php Html::jsDirtyForms(); ?>
</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar" data-offset="60">

<div class="container">
    <?php $this->renderPartial('application.themes.frontend.views.layouts._menu'); ?>
    <?php $this->widget('\TbAlert'); ?>
    <div class="subwrapper">
        <?php echo $content; ?>
    </div>
    <hr>
    <?php $this->renderPartial('application.themes.frontend.views.layouts._footer'); ?>
</div>

<div id="backend">
    <?php
    // Not including navbar due to responsive-bugs and the fact that we don't use it
    //Html::renderBackendNavbar();
    ?>
</div>

<?php Yii::app()->yiistrap->registerAllScripts(); ?>

</body>
</html>
