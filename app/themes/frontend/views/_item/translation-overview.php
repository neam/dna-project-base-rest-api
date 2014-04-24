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



<?php $this->renderPartial("/_item/elements/flowbar", compact("model", "workflowCaption", "form")); ?>

<div class="row-fluid below-flowbar">
    <div class="span12">

        <?php
        $_lang = Yii::app()->language;

        foreach (Yii::app()->params["languages"] as $language => $label): ?>

            <?php

            if ($language == Yii::app()->sourceLanguage) {
                continue;
            }

            $step = $this->firstFlowStep($model);
            $action = 'translate';
            $options = array(
                "icon" => "globe",
            );

            ?>

            <div class="row-fluid">
                <div class="span4">

                    <?php
                    $this->widget("\TbButton", array(
                        "label" => $label,
                        "type" => $this->action->id == $action ? "inverse" : null,
                        "size" => "",
                        "icon" => "glyphicon-" . $options['icon'] . ($this->action->id == $action ? " icon-white" : null),
                        "url" => array($action, "id" => $model->{$model->tableSchema->primaryKey}, 'step' => $step, 'translateInto' => $language),
                        "htmlOptions" => array(
                            "class" => "span12",
                        ),
                    ));
                    ?>

                </div>
                <div class="span8">

                    <?php

                    try {

                        $this->widget(
                            '\TbProgress',
                            array(
                                'type' => 'success', // 'info', 'success' or 'danger'
                                'percent' => $model->calculateValidationProgress('translate_into_' . $language),
                            )
                        );

                    } catch (QaStateBehaviorNoAssociatedRulesException $e) {

                        echo Yii::t('exceptions', $e->getMessage());

                    }

                    ?>

                </div>
            </div>

        <?php endforeach;

        Yii::app()->language = $_lang;
        ?>

        <div class="alert alert-info">
            <?php print Yii::t('app', 'Hint'); ?>
            : <?php print Yii::t('app', 'Above you see the current translation progress for the current item. Choose language to help translate into above.'); ?>
        </div>

    </div>

</div>

