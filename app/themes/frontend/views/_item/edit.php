<?php
$this->setPageTitle(
    Yii::t('model', 'Chapter')
    . ' - '
    . Yii::t('crud', 'Continue Authoring')
);

$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Continue Authoring');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>

<div class="row-fluid">
    <div class="span12">

        <h1>
            <?php echo $workflowCaption; ?>
            - <?php echo(empty($model->title) ? Yii::t('model', $this->modelClass) . " #" . $model->id : $model->title); ?>
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

        <div class="row-fluid">
            <div class="span9">

                <h2>Mockup!
                    <small></small>
                </h2>

            </div>
            <div class="span3">

                <div class="btn-toolbar pull-right">

                    <div class="btn-group">
                        <?php
                        $this->widget("bootstrap.widgets.TbButton", array(
                            "label" => Yii::t("model", "Save and Continue"),
                            "type" => "primary",
                            "size" => "large",
                            "icon" => "icon-forward",
                            "url" => array("continueAuthoring", "id" => $model->{$model->tableSchema->primaryKey})
                        ));
                        ?>

                    </div>

                </div>

            </div>
        </div>

        <?php $this->renderPartial("application.themes.backend2.views." . lcfirst(get_class($model)) . "._form", array('model' => $model, 'buttons' => 'create', 'elementsViewAlias' => "application.themes.backend2.views." . lcfirst(get_class($model)) . "._elements")); ?>

        <form>

            <div class="row-fluid">
                <div class="span3">

                    Thumbnail
                    <img src="http://placehold.it/400x400">

                </div>
                <div class="span9">

                    Title

                    Tags

                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">

                    About

                </div>
            </div>

        </form>

        <div class="alert alert-info">
            Hint: Lorem ipsum
        </div>


    </div>

</div>
