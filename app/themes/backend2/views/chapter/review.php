<?php
$this->setPageTitle(
    Yii::t('model', $this->modelClass)
    . ' - '
    . Yii::t('crud', 'Evaluate')
);

$this->breadcrumbs[Yii::t('model', 'Chapters')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Evaluate');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>

<div class="row">
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

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<br/>

<div class="row">
    <div class="span3 well well-white">

        <?php echo $this->renderPartial('/_item/elements/_progress', compact("model", "execution")); ?>

    </div>
    <div class="span9 well well-white">

        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'chapter-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'type' => 'horizontal',
        ));
        echo $form->errorSummary($model);
        ?>


        <div class="row">
            <div class="span9">

                <h2>Review
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
            <div class="span4"><?php echo $model->attributes["title_en"]; ?></div>
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
        </div>
        <div class="row control-group">
            <div class="span1">Slug:</div>
            <div class="span4"><?php echo $model->attributes["slug_en"]; ?></div>
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
        </div>
        <div class="row control-group">
            <div class="span1">Thumbnail:</div>
            <div class="span4"><?php echo $model->attributes["thumbnail_media_id"]; ?></div>
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
        </div>
        <div class="row control-group">
            <div class="span1">About:</div>
            <div class="span4"><?php echo $model->attributes["about_en"]; ?></div>
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
        </div>
        <div class="row control-group">
            <div class="span1">Tags:</div>
            <div class="span4"></div>
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
        </div>
        <div class="row control-group">
            <div class="span1">Videos:</div>
            <div class="span4">
                <div>Video 1</div>
                <div>Video 2</div>
            </div>
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
        </div>
        <div class="row control-group">
            <div class="span1">Teachers guide:</div>
            <div class="span4">xxx</div>
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
        </div>
        <div class="row control-group">
            <div class="span1">Exercises:</div>
            <div class="span4">
                <div>Exercise 1</div>
                <div>Exercise 2</div>
            </div>
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
        </div>
        <div class="row control-group">
            <div class="span1">Snapshots:</div>
            <div class="span4">
                <div>Snapshot 1</div>
                <div>Snapshot 2</div>
            </div>
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
