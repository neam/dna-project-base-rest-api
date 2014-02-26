<?php
/* @var SiteController $this */
?>
<div class="site-controller index-action">
    <div class="alert alert-info">
        <h4>Welcome to Gapminder Content Management System (CMS)</h4>
        <p>We are developing new tools for writing, publishing and translating material. This web site is not intended for public use yet, but feel free to snoop around.</p>
    </div>

    <div class="content-section section-go">
        <h2><?php print Yii::t('app', 'Go-items'); ?></h2>
        <?php foreach (DataModel::goItemModels() as $modelClass => $table): ?>
            <?php $this->renderPartial("_item-type-introduction", compact("modelClass")); ?>
        <?php endforeach; ?>
    </div>

    <div class="content-section section-educational">
        <h2><?php print Yii::t('app', 'Educational material'); ?></h2>
        <?php foreach (DataModel::educationalItemModels() as $modelClass => $table):
            $this->renderPartial("_item-type-introduction", compact("modelClass"));
        endforeach; ?>
    </div>

    <div class="content-section section-website">
        <h2><?php print Yii::t('app', 'Website content'); ?></h2>
        <?php foreach (DataModel::websiteContentItemModels() as $modelClass => $table): ?>
            <?php $this->renderPartial("_item-type-introduction", compact("modelClass")); ?>
        <?php endforeach; ?>
    </div>
</div>