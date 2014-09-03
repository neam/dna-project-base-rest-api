<?php
/** @var SiteController|WorkflowUiControllerTrait $this */
/** @var string $modelClass */
?>
<div class="site-controller index-action">
    <div class="alert alert-info">
        <h4><?php print Yii::t('app', 'Welcome to Gapminder Content Management System (CMS)'); ?></h4>

        <p><?php print Yii::t('app', 'We are developing new tools for writing, publishing and translating material. This web site is not intended for public use yet, but feel free to snoop around.'); ?></p>
        <?php if (Yii::app()->user->isGuest): ?>
            <p><?php print Yii::t('app', 'To help out reviewing and/or translating content, {login-link}', array('{login-link}' => CHtml::link(Yii::t('app', 'login or sign-up here'), Yii::app()->user->loginUrl))) ?></p>
        <?php endif; ?>
    </div>
    <div class="content-section section-go">
        <h2><?php print Yii::t('app', 'Go-items'); ?></h2>
        <?php foreach (DataModel::goItemModels() as $modelClass => $table): ?>
            <?php $this->renderPartial('_item-type-introduction', compact('modelClass')); ?>
        <?php endforeach; ?>
    </div>
    <div class="content-section section-educational">
        <h2><?php print Yii::t('app', 'Educational material'); ?></h2>
        <?php foreach (DataModel::educationalItemModels() as $modelClass => $table): ?>
            <?php if (!in_array($modelClass, array('SpreadsheetFile'))): // TODO: Fix spreadsheet files (i.e. the dataarticle relation). ?>
                <?php $this->renderPartial('_item-type-introduction', compact('modelClass')); ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="content-section section-website">
        <h2><?php print Yii::t('app', 'Internally managed content'); ?></h2>
        <?php foreach (DataModel::internalItemModels() as $modelClass => $table): ?>
            <?php $this->renderPartial('_item-type-introduction', compact('modelClass')); ?>
        <?php endforeach; ?>
    </div>
    <div class="content-section section-website">
        <h2><?php print Yii::t('app', 'Website content'); ?></h2>
        <?php foreach (DataModel::websiteContentItemModels() as $modelClass => $table): ?>
            <?php if ($modelClass !== 'Menu'): ?>
                <?php $this->renderPartial('_item-type-introduction', compact('modelClass')); ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="content-section section-website">
        <h2><?php print Yii::t('app', 'Waffle content'); ?></h2>
        <?php foreach (DataModel::waffleItemModels() as $modelClass => $table): ?>
            <?php $this->renderPartial('_item-type-introduction', compact('modelClass')); ?>
        <?php endforeach; ?>
    </div>
</div>
