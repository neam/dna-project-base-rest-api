<head>
    <meta charset="utf-8">
    <meta name="language" content="en"/>
    <meta name="viewport" content="user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="icon" href="<?php echo baseUrl('favicon.ico'); ?>" type="image/x-icon"/>
    <?php app()->registerCss(); ?>
    <?php app()->registerScripts(); ?>
    <?php app()->clientScript->registerCoreScript('jquery', CClientScript::POS_END); ?>
    <?php js('js/bower_components/requirejs/require.js', CClientScript::POS_HEAD); ?>
    <script type="text/javascript">
        // Define the Gapminder namespace.
        var Gapminder = Gapminder || {};

        // Define the server configuration used by RequireJS.
        Gapminder.server = {
            baseUrl: '<?php echo baseUrl(); ?>',
            cacheBuster: '<?php echo md5(YII_DEBUG ? time() : app()->version); ?>',
            translations: {
            }
        };

        // Set up the application through RequireJS.
        require(['require', '<?php echo baseUrl('js/app/config.js'); ?>' + '?_=' + Gapminder.server.cacheBuster], function(require) {
            require(['app/index']);
        });
    </script>
</head>