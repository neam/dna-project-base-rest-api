<?php
/* @var string $content */
?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
    <div class="content">
        <div class="row">
            <?php echo $this->renderBreadcrumbs(); ?>
        </div>
        <?php echo $content; ?>
    </div>
</div>
<?php $this->endContent(); ?>