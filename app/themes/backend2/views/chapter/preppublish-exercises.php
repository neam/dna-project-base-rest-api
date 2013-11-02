<?php
$this->setPageTitle(
    Yii::t('model', $this->modelClass)
    . ' - '
    . Yii::t('crud', 'Draft')
);

$this->breadcrumbs[Yii::t('model', 'Chapters')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Prepare for publish');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>

<div class="row">
    <div class="span12">

        <h1>
            <?php echo(empty($model->title) ? Yii::t('model', $this->modelClass) . " #" . $model->id : $model->title); ?>
            <small>vX</small>

            <div class="btn-group">

                <?php
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Preview"),
                    "icon" => "icon-eye-open",
                    "url" => array("preview", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                ?>

            </div>

        </h1>

    </div>
</div>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<br/>

<div class="row">
    <div class="span3 well well-white">

        <?php echo $this->renderPartial('/_item/elements/_progress', compact("model", "execution")); ?>

    </div>
    <div class="span9 well well-white">

        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'chapter-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'type' => 'horizontal',
        ));
        echo $form->errorSummary($model);
        ?>


        <div class="row">
            <div class="span9">

                <h2><?php Yii::t('app', 'Prepare for publishing'); ?>
                    <small></small>
                </h2>

            </div>
            <div class="span3">

                <div class="btn-toolbar pull-right">

                    <div class="btn-group">
                        <?php
                        echo CHtml::submitButton(Yii::t('model', 'Save and Continue'), array(
                                'class' => 'btn btn-large btn-primary'
                            )
                        );
                        ?>

                    </div>

                </div>

            </div>
        </div>

        <h2>Exercises</h2>
        <div class="controls">
            <?php if ($model->exercises): ?>
            <ul>
                <?php foreach ($model->exercises as $exercise): ?>
                <li>
                    <?php echo $exercise->title; ?>
                    <?php
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Delete relation"),
                        "url" => array("deleteEdge", "id" => $model->{$model->tableSchema->primaryKey}, "from"=>$model->node()->id,"to"=>$exercise->node()->id,"returnUrl"=>Yii::app()->request->url),
                        "size" => "small",
                        "type" => "danger"
                    ));
                    ?>
                </li>
                <?php endforeach; ?>
            </ul>
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
                    'actionButtons' => array(
                    ),
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

        <div class="form-actions">
            <?php
            echo CHtml::Button(Yii::t('model', 'Cancel'), array(
                    'submit' => (isset($_GET['returnUrl'])) ? $_GET['returnUrl'] : array('chapter/admin'),
                    'class' => 'btn'
                )
            );
            echo ' ';
            echo CHtml::submitButton(Yii::t('model', 'Save'), array(
                    'class' => 'btn btn-primary'
                )
            );
            ?>
        </div>

        <div class="alert alert-info">
            Hint: Lorem ipsum
        </div>

        <?php $this->endWidget() ?>

    </div>

</div>


<?php
foreach (array_reverse($this->clips->toArray(), true) as $key => $clip) { // Reverse order for recursive modals to render properly
    if (strpos($key, "modal:") === 0) {
        echo $clip;
    }
}
?>

