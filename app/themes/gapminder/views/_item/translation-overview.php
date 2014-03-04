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
<div class="<?php echo $this->getCssClasses($model); ?>">

    <?php $this->renderPartial("/_item/elements/_flowbar", compact("model", "workflowCaption", "form")); ?>

    <div class="after-flowbar">

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

            <div class="language-content">
                <div class="language-actions">

                    <?php
                    $this->widget("\TbButton", array(
                        "label" => $label,
                        "color" => $this->action->id == $action ? "inverse" : null,
                        "size" => TbHtml::BUTTON_SIZE_XS,
                        "icon" => "glyphicon-" . $options['icon'] . ($this->action->id == $action ? " icon-white" : null),
                        "url" => array($action, "id" => $model->{$model->tableSchema->primaryKey}, 'step' => $step, 'translateInto' => $language),
                        'block' => true,
                    ));
                    ?>

                </div>
                <div class="language-progress">

                    <?php

                    try {
                        // todo: fix this some other way
                        $model = $model->asa('i18n-attribute-messages') !== null ? $model->edited() : $model;
                        $this->widget(
                            '\TbProgress',
                            array(
                                'color' => 'success', // 'info', 'success' or 'danger'
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

