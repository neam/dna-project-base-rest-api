<?php
$this->setPageTitle(
    Yii::t('model', $this->modelClass)
    . ' - '
    . Yii::t('crud', 'Prepare for preshow')
);

$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Prepare for preshow');
$this->breadcrumbs[] = $stepCaption;
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>

<div class="row-fluid">
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

<?php //$this->renderPartial("_toolbar", array("model" => $model)); ?>
<br/>

<div class="row-fluid">
    <div class="span3">

        <div class="row-fluid">
            <div class="span12 well well-white">
                <?php echo $this->renderPartial('/_item/elements/progress', compact("model", "execution")); ?>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12 well well-white">
                <?php echo $this->renderPartial('/_item/elements/actions', compact("model", "execution")); ?>
            </div>
        </div>

    </div>
    <div class="span9">

        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'chapter-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'type' => 'horizontal',
        ));
        echo $form->errorSummary($model);
        ?>


        <div class="row-fluid">
            <div class="span9">

                <h2>Prepare for preshow
                    <small></small>
                </h2>

            </div>
            <div class="span3">

                <div class="btn-toolbar pull-right">
                    <div class="btn-group">
                        <?php
                        echo CHtml::submitButton(Yii::t('model', 'Next'), array(
                                'class' => 'btn btn-large btn-primary'
                            )
                        );
                        ?>
                    </div>
                </div>

            </div>
        </div>

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

