<!--
<h1>
    Gapminder CMS
</h1>

<h2>
    Search
</h2>

<div class="alert alert-warning">
    TODO: Ability to search
</div>

<h2>
    Featured
</h2>

<div class="alert alert-warning">
    TODO: See featured items
</div>

<h2>
    Contents
</h2>
-->
<h2><?php print Yii::t('app', 'Go-items'); ?></h2>
<?php foreach (DataModel::goItemModels() as $modelClass => $table):

    if ($table == "exam_question_alternative") {
        continue;
    }
    $this->renderPartial("_item-type-introduction", compact("modelClass"));

endforeach; ?>

<h2><?php print Yii::t('app', 'Educational Content'); ?></h2>

<?php foreach (DataModel::educationalContentModels() as $modelClass => $table):

    if ($table == "exam_question_alternative") {
        continue;
    }
    $this->renderPartial("_item-type-introduction", compact("modelClass"));

endforeach; ?>

<h2><?php print Yii::t('app', 'Website Content'); ?></h2>

<?php foreach (DataModel::websiteContentModels() as $modelClass => $table):

    if ($table == "exam_question_alternative") {
        continue;
    }
    $this->renderPartial("_item-type-introduction", compact("modelClass"));

endforeach; ?>
