<?php
$this->setPageTitle(
    Yii::t('model', 'Chapter')
    . ' - '
    . Yii::t('crud', 'Edit')
);

$this->breadcrumbs[Yii::t('model', 'Chapters')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Edit');
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

<?php
$waitingFor = $execution->getWaitingFor();
?>

<?php //print_r($waitingFor); ?>

<div class="row">
    <div class="span3 well well-white">

        <div class="row">
            <h2>Progress</h2>
        </div>

        <div class="row">
            <div class="span4">

                %

            </div>
            <div class="span8">

                Step

            </div>

        </div>

        <div class="row">
            <div class="span4">

                <?php
                $this->widget(
                    'bootstrap.widgets.TbProgress',
                    array(
                        'type' => 'success', // 'info', 'success' or 'danger'
                        'percent' => 0,
                    )
                );
                ?>
            </div>
            <div class="span8">

                <?php
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("crud", "Draft"),
                    "type" => $this->action->id == "draft" ? "inverse" : null,
                    "size" => "small",
                    "icon" => "icon-pencil",
                    "url" => array("draft", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                ?>

            </div>
        </div>
        <div class="row">
            <div class="span4">

                <?php
                $this->widget(
                    'bootstrap.widgets.TbProgress',
                    array(
                        'type' => 'success', // 'info', 'success' or 'danger'
                        'percent' => 60,
                    )
                );
                ?>
            </div>
            <div class="span8">

                <?php
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("crud", "Prepare for preshow"),
                    "type" => $this->action->id == "prepPreshow" ? "inverse" : null,
                    "size" => "small",
                    "icon" => "icon-edit",
                    "url" => array("prepPreshow", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                ?>

            </div>
        </div>
        <div class="row">
            <div class="span4">

                <?php
                $this->widget(
                    'bootstrap.widgets.TbProgress',
                    array(
                        'type' => 'success', // 'info', 'success' or 'danger'
                        'percent' => 60,
                    )
                );
                ?>
            </div>
            <div class="span8">

                <?php
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("crud", "Evaluate"),
                    "type" => $this->action->id == "evaluate" ? "inverse" : null,
                    "size" => "small",
                    "icon" => "icon-comment",
                    "url" => array("evaluate", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                ?>

            </div>
        </div>
        <div class="row">
            <div class="span4">

                <?php
                $this->widget(
                    'bootstrap.widgets.TbProgress',
                    array(
                        'type' => 'success', // 'info', 'success' or 'danger'
                        'percent' => 60,
                    )
                );
                ?>
            </div>
            <div class="span8">

                <?php
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Publish"),
                    "type" => $this->action->id == "publish" ? "inverse" : null,
                    "size" => "small",
                    "icon" => "icon-thumbs-up",
                    "url" => array("publish", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                ?>

            </div>
        </div>

        <div class="row">

            <div class="span12">

                <hr>

                X% Completed<br/>
                X required fields missing<br/>

                Status: DRAFT

            </div>
        </div>

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

