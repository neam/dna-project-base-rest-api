<?php
//$this->breadcrumbs[Yii::t('crud', 'Chapters')] = array('index');
$this->breadcrumbs[] = $model->title;

$sections = $this->chapterSections($model);

// Deps for smooth scroll
$cs = Yii::app()->getClientScript();
$cs->registerCoreScript('jquery');
$smootScrollJs = Yii::app()->assetManager->publish(Yii::getPathOfAlias('vendor.kswedberg.jquery-smooth-scroll') . '/jquery.smooth-scroll.js');
$cs->registerScriptFile($smootScrollJs, CClientScript::POS_HEAD);
?>

<script>
    $(function () {

        // smooth scroll

        $('.bs-docs-sidebar li a').click(function (event) {
            event.preventDefault();
        });

        // http://stackoverflow.com/questions/645202/can-i-update-window-location-hash-without-having-the-web-page-scroll
        function changeHashWithoutScrolling(hash) {
            var id = hash.replace(/^.*#/, ''),
                elem = document.getElementById(id);
            elem.id = id + '-tmp';
            window.location.hash = hash;
            elem.id = id;
        }

        $('.bs-docs-sidebar li a').smoothScroll({
            offset: -57,
            afterScroll: function (e) {
                // Necessary to do manually
                changeHashWithoutScrolling(e.scrollTarget);
            }
        });

        // side bar affix (disabled since G3 gs does not sport affix behavior)
        /*
         var $window = $(window)
         setTimeout(function() {
         $('.bs-docs-sidenav').affix({
         offset: {
         top: function() {
         return $window.width() <= 980 ? 290 : 210
         }
         , bottom: 270
         }
         })
         }, 100);
         */

        $('#P3WidgetContainerShowControls')
            .click(function () {
                $('.admin-container').toggleClass('hide show', 0);
            });

    });
</script>

<div class="row-fluid">
    <div class="span3 bs-docs-sidebar">
        <?php if (!empty($sections)): ?>
            <ul class="nav nav-list bs-docs-sidenav affix">

                <?php
                foreach ($sections as $i => $section) {
                    echo CHtml::openTag('li', array('class' => $i == 0 ? 'active' : null));
                    echo CHtml::link('<i class="icon-chevron-right"></i> ' . $section["menu_label"], '#' . $section["slug"]);
                    echo CHtml::closeTag('li');
                }
                ?>
            </ul>
        <?php
        else:
            echo Yii::t('app', 'Chapter contains no sections');
        endif;
        ?>

    </div>
    <div class="span9">

        <?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
        <!--<h1><?php echo Yii::t('crud', 'Chapter') ?> <small><?php echo CHtml::encode($model->title); ?></small></h1>-->

        <?php if (Yii::app()->user->checkAccess('Chapter.*')): ?>
            <div class="admin-container show">
                <?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($sections)): ?>
            <?php foreach ($sections as $section): ?>

                <section id="<?= $section["slug"] ?>">

                    <div class="page-header">
                        <h1><?= $section["title"] ?></h1>
                    </div>

                    <?php if (isset($section["subsections"])): ?>
                        <?php foreach ($section["subsections"] as $subsection): ?>

                            <div class="view">

                                <h2><?= $subsection["title"] ?></h2>

                                <?php
                                if (isset($subsection["model"])) {
                                    $this->renderPartial('/' . lcfirst(get_class($subsection["model"])) . '/_view', array("data" => $subsection["model"]));
                                } else {
                                    print $subsection["markup"];
                                }
                                ?>

                            </div>
                        <?php endforeach; ?>

                    <?php else: ?>
                        <?php
                        if (isset($section["model"])) {
                            $this->renderPartial('/' . lcfirst(get_class($section["model"])) . '/_view', array("data" => $section["model"]));
                        } else {
                            print $section["markup"];
                        }
                        ?>
                    <?php endif; ?>

                </section>

            <?php endforeach; ?>

        <?php
        else:
            ?>
            <div class="alert">
                <?php echo Yii::t('app', 'Chapter contains no sections'); ?>
            </div>

        <?php
        endif;
        ?>
    </div>
</div>
