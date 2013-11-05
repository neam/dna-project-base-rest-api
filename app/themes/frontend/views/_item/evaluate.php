<?php
$this->setPageTitle(
    Yii::t('model', $this->modelClass)
    . ' - '
    . Yii::t('crud', 'Evaluate')
);

$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Evaluate');
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

                <h2>Evaluate
                    <small></small>
                </h2>

            </div>
            <div class="span3">

                <div class="btn-toolbar pull-right">
                </div>

            </div>
        </div>
        <div class="row control-group">
            <div class="span1">Title:</div>
            <div class="span2"><?php echo $model->attributes["title_en"]; ?></div>
            <div class="span2">
                <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type' => 'primary',
                    'toggle' => 'radio',
                    'buttons' => array(
                        array('label' => 'Approve', 'htmlOptions' => array('class' => 'btn-success')),
                        array('label' => 'Reject', 'htmlOptions' => array('class' => 'btn-danger')),
                    ),
                )); ?>
            </div>
            <div class="span1">Comment:</div>
            <div class="span4">
                <textarea rows="6" cols="50" class="span8" name="Chapter[title_comment]"
                          id="Chapter_title_comment"></textarea>
                <span class="help-inline error" id="Chapter_title_comment_em_" style="display: none"></span>
            </div>
        </div>

        <div class="row control-group">
            <div class="span1">Slug:</div>
            <div class="span2"><?php echo $model->attributes["slug_en"]; ?></div>
            <div class="span2">
                <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type' => 'primary',
                    'toggle' => 'radio',
                    'buttons' => array(
                        array('label' => 'Approve', 'htmlOptions' => array('class' => 'btn-success')),
                        array('label' => 'Reject', 'htmlOptions' => array('class' => 'btn-danger')),
                    ),
                )); ?>
            </div>
            <div class="span1">Comment:</div>
            <div class="span4">
                <textarea rows="6" cols="50" class="span8" name="Chapter[title_comment]"
                          id="Chapter_title_comment"></textarea>
                <span class="help-inline error" id="Chapter_title_comment_em_" style="display: none"></span>
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