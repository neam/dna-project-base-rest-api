<?php
$this->setPageTitle(
    Yii::t('model', 'Chapter')
    . ' - '
    . Yii::t('crud', 'Draft')
);

$this->breadcrumbs[Yii::t('model', 'Chapters')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Draft');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>

<div class="row">
    <div class="span12">

        <h1>
            <?php echo(empty($model->title) ? Yii::t('model', 'Chapter') . " #" . $model->id : $model->title); ?>
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

        <?php echo $this->renderPartial('elements/_progress', compact("model", "execution")); ?>

    </div>
    <div class="span9 well well-white">


        <div class="row">
            <div class="span9">

                <h2>Step 1: Title & About
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

        <?php $this->renderPartial('_form', array('model' => $model, 'buttons' => 'create')); ?>

        <form>

            <div class="row">
                <div class="span3">

                    Thumbnail
                    <img src="http://placehold.it/400x400">

                </div>
                <div class="span9">

                    Title

                    Tags

                </div>
            </div>

            <div class="row">
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
