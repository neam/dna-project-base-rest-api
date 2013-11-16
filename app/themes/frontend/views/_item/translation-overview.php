<?php
$workflowCaption = Yii::t('app', 'Translation');
$actionCaption = Yii::t('app', 'Overview');

$this->setPageTitle(
    Yii::t('model', $this->modelClass)
    . ' - '
    . $actionCaption
);

$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = $actionCaption;
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
                <?php echo $this->renderPartial('/_item/elements/actions', compact("model", "execution")); ?>
            </div>
        </div>

    </div>
    <div class="span9">

        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'item-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'type' => 'horizontal',
        ));
        echo $form->errorSummary($model);
        ?>


        <div class="row-fluid">
            <div class="span9">

                <h2><?php print $actionCaption; ?>
                    <small></small>
                </h2>

            </div>
            <div class="span3">

                <div class="btn-toolbar pull-right">
                </div>

            </div>
        </div>

        <?php
        $_lang = Yii::app()->language;

        foreach (Yii::app()->langHandler->languages as $language): ?>

            <?php

            if ($language == Yii::app()->sourceLanguage) {
                continue;
            }

            $step = 'translate_into';
            $action = 'translateInto';
            $caption = $language;
            $options = array(
                "icon" => "globe",
            );

            ?>

            <div class="row-fluid">
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
                        "label" => Yii::t("model", $caption),
                        "type" => $this->action->id == $action ? "inverse" : null,
                        "size" => "",
                        "icon" => "icon-" . $options['icon'] . ($this->action->id == $action ? " icon-white" : null),
                        "url" => array($action, "id" => $model->{$model->tableSchema->primaryKey}, 'translationLanguage' => $language)
                    ));
                    ?>

                </div>
            </div>

        <?php endforeach;

        Yii::app()->language = $_lang;
        ?>

        <div class="alert alert-info">
            Hint: Lorem ipsum
        </div>

        <?php $this->endWidget() ?>

    </div>

</div>

