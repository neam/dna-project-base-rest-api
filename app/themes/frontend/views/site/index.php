<div class="alert alert-info">
    <h4>Welcome to Gapminder Content Management System (CMS)</h4>
    We are developing new tools for writing, publishing and translating material. This web site is not intended for public use yet, but feel free to snoop around.
</div>

<h2><?php print Yii::t('app', 'Go-items'); ?></h2>

<?php foreach (DataModel::goItemModels() as $modelClass => $table):

    $this->renderPartial("_item-type-introduction", compact("modelClass"));

endforeach; ?>

<h2><?php print Yii::t('app', 'Educational material'); ?></h2>

<?php foreach (DataModel::educationalContentModels() as $modelClass => $table):

    $this->renderPartial("_item-type-introduction", compact("modelClass"));

endforeach; ?>

<h2><?php print Yii::t('app', 'Website content'); ?></h2>

<?php foreach (DataModel::websiteContentModels() as $modelClass => $table):

    $this->renderPartial("_item-type-introduction", compact("modelClass"));

endforeach; ?>
