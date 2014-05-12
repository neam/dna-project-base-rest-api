<?php /** @var string $content */ ?>
<?php $this->beginContent(WebApplication::LAYOUT_MAIN); ?>
    <div class="layout-regular">
        <?php $this->renderPartial('application.themes.gapminder.views.layouts._menu'); ?>
        <?php $this->widget('\TbAlert'); ?>
        <div class="container">
            <div class="content">
                <div class="row">
                    <?php echo $this->renderBreadcrumbs(); ?>
                </div>
                <?php echo $content; ?>
            </div>
        </div>
        <?php $this->renderPartial('application.themes.gapminder.views.layouts._footer'); ?>
    </div>
<?php $this->endContent(); ?>
