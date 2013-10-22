<?php
$this->setPageTitle(
    Yii::t('model', $this->modelClass)
    . ' - '
    . Yii::t('crud', 'Draft')
);

$this->breadcrumbs[Yii::t('model', 'Video Files')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Prepare for publish');
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
            'id' => 'videoFile-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'type' => 'horizontal',
        ));
        echo $form->errorSummary($model);
        ?>


        <div class="row">
            <div class="span9">

                <h2>Prepare for publishing
                    <small></small>
                </h2>

            </div>
            <div class="span3">

                <div class="btn-toolbar pull-right">

                    <div class="btn-group">
                        <?php
                        echo CHtml::submitButton(Yii::t('model', 'Save and Continue'), array(
                                'class' => 'btn btn-large btn-primary'
                            )
                        );
                        ?>

                    </div>

                </div>

            </div>
        </div>

        <?php
        $input = $this->widget(
            '\GtcRelation',
            array(
                'model' => $model,
                'relation' => 'thumbnailMedia',
                'fields' => 'itemLabel',
                'allowEmpty' => true,
                'style' => 'dropdownlist',
                'htmlOptions' => array(
                    'checkAll' => 'all'
                ),
            )
            , true);
        echo $form->customRow($model, 'thumbnail_media_id', $input);
        ?>

        <?php
        $formId = 'videoFile-thumbnail_media_id-' . \uniqid() . '-form';
        ?>

        <div class="control-group">
            <div class="controls">
                <?php
                echo $this->widget('bootstrap.widgets.TbButton', array(
                    'label' => Yii::t('model', 'Create {model}', array('{model}' => Yii::t('model', 'P3 Media'))),
                    'icon' => 'icon-plus',
                    'htmlOptions' => array(
                        'data-toggle' => 'modal',
                        'data-target' => '#' . $formId . '-modal',
                    ),
                ), true);
                ?>
            </div>
        </div>

        <?php
        $this->beginClip('modal:' . $formId . '-modal');
        $this->renderPartial('//p3Media/_modal_form', array(
            'formId' => $formId,
            'inputSelector' => '#videoFile_thumbnail_media_id',
            'model' => new P3Media,
            'pk' => 'id',
            'field' => 'itemLabel',
        ));
        $this->endClip();
        ?>

        <?php echo $form->textAreaRow($model, 'about', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

        <div class="control-group ">
            <label class="control-label" for="TestForm_multiDropdown">Tags</label>

            <div class="controls"><select multiple="multiple" name="TestForm[multiDropdown][]"
                                          id="TestForm_multiDropdown">
                    <option value="0">1</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                    <option value="4">5</option>
                </select></div>
        </div>


        <!--
        tags
        video
        teachers guide
        excecrices
        snapshots
        datachunks
        tests
        related
        credits
        -->


        <div class="form-actions">
            <?php
            echo CHtml::Button(Yii::t('model', 'Cancel'), array(
                    'submit' => (isset($_GET['returnUrl'])) ? $_GET['returnUrl'] : array('videoFile/admin'),
                    'class' => 'btn'
                )
            );
            echo ' ';
            echo CHtml::submitButton(Yii::t('model', 'Save'), array(
                    'class' => 'btn btn-primary'
                )
            );
            ?>
        </div>

        <div class="alert alert-info">
            Hint: Lorem ipsum
        </div>

        <?php $this->endWidget() ?>

    </div>

</div>


<?php
foreach (array_reverse($this->clips->toArray(), true) as $key => $clip) { // Reverse order for recursive modals to render properly
    if (strpos($key, "modal:") === 0) {
        echo $clip;
    }
}
?>

