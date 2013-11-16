<?php
$workflowCaption = Yii::t('app', 'Translations');
$actionCaption = Yii::t('app', 'Choose language');

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

<?php $this->renderPartial("/_item/elements/flowbar", compact("model", "workflowCaption", "form")); ?>

<div class="row-fluid">
    <div class="span12">

        <?php
        $_lang = Yii::app()->language;

        foreach (Yii::app()->params["languages"] as $language => $label): ?>

            <?php

            if ($language == Yii::app()->sourceLanguage) {
                continue;
            }

            $action = 'translate';
            $options = array(
                "icon" => "globe",
            );

            ?>

            <div class="row-fluid">
                <div class="span4">

                    <?php
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => $label,
                        "type" => $this->action->id == $action ? "inverse" : null,
                        "size" => "",
                        "icon" => "icon-" . $options['icon'] . ($this->action->id == $action ? " icon-white" : null),
                        "url" => array($action, "id" => $model->{$model->tableSchema->primaryKey}, 'translateInto' => $language),
                        "htmlOptions" => array(
                            "class" => "span12",
                        ),
                    ));
                    ?>

                </div>
                <div class="span8">

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
            </div>

        <?php endforeach;

        Yii::app()->language = $_lang;
        ?>

        <div class="alert alert-info">
            <?php print Yii::t('app', 'Hint');?>: <?php print Yii::t('app', 'Above you see the current translation progress for the current item. Choose language to help translate into above.');?>
        </div>

    </div>

</div>

