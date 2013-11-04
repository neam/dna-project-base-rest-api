<div class="controls">
    <?php if ($model->exercises): ?>
        <ul>
            <?php foreach ($model->exercises as $exercise): ?>
                <li>
                    <?php echo $exercise->title; ?>
                    <?php
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Delete relation"),
                        "url" => array("deleteEdge", "id" => $model->{$model->tableSchema->primaryKey}, "from" => $model->node()->id, "to" => $exercise->node()->id, "returnUrl" => Yii::app()->request->url),
                        "size" => "small",
                        "type" => "danger"
                    ));
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <div><?php echo Yii::t("model", "No exercises"); ?></div>
    <?php endif; ?>
    <?php
    $this->widget("bootstrap.widgets.TbButton", array(
        "label" => Yii::t("model", "Create new exercise"),
        "url" => array("/exercise/")
    ));
    ?>
</div>

<h2>Choose exercise to add</h2>
<?php
$allExercises = new Exercise('search');
$this->widget(
    'bootstrap.widgets.TbExtendedGridView',
    array(
        'id' => 'exercises_to_add',
        'type' => 'striped bordered',
        'dataProvider' => $allExercises->search(),
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'bulkActions' => array(
            'actionButtons' => array(),
            'checkBoxColumnConfig' => array(
                'name' => 'id'
            ),
        ),
        'columns' => array(
            array('name' => 'id', 'header' => 'Id'),
            array('name' => 'title', 'header' => 'Title'),
        )
    )
);
?>

<div class="alert alert-info">
    Hint: Lorem ipsum
</div>