<?php
$workflowCaption = Yii::t('app', 'QA');
$actionCaption = Yii::t('app', 'Mark as previewable');

$this->setPageTitle(
    Yii::t('model', $this->modelClass)
    . ' - '
    . $actionCaption
);

$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = $actionCaption;
?>



<div class="row-fluid">
    <div class="span12">

        <h1>
            <?php echo $workflowCaption; ?>
            - <?php echo(empty($model->title) ? Yii::t('model', $this->modelClass) . " #" . $model->id : $model->title); ?>
            <small>vX</small>

            <div class="btn-group">

                <?php
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Preview"),
                    "icon" => "glyphicon-eye-open",
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
        $form = $this->beginWidget('\TbActiveForm', array(
            'id' => 'item-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
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
            ?>    </div>

        <div class="alert alert-info">
            Hint: Lorem ipsum
        </div>

        <?php $this->endWidget() ?>

    </div>

</div>
