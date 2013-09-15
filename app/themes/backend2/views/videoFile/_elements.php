<div class="row">
<div class="span8"> <!-- main inputs -->

<div class="form-horizontal">


<?php echo $form->textFieldRow($model, 'title_en', array('maxlength' => 255)); ?>

<?php echo $form->textAreaRow($model, 'subtitles_en', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'originalMedia',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'original_media_id', $input);
?>

<?php
$formId = 'video-file-original_media_id-' . \uniqid() . '-form';
?>

<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'P3 Media'))),
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
    'inputSelector' => '#VideoFile_original_media_id',
    'model' => new P3Media,
    'pk' => 'id',
    'field' => 'itemLabel',
));
$this->endClip();
?>


<?php echo $form->textFieldRow($model, 'generate_processed_media'); ?>

<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'processedMediaIdEn',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'processed_media_id_en', $input);
?>

<?php
$formId = 'video-file-processed_media_id_en-' . \uniqid() . '-form';
?>

<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'P3 Media'))),
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
    'inputSelector' => '#VideoFile_processed_media_id_en',
    'model' => new P3Media,
    'pk' => 'id',
    'field' => 'itemLabel',
));
$this->endClip();
?>


<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'authoringWorkflowExecution',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'authoring_workflow_execution_id', $input);
?>

<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'translationWorkflowExecutionIdEn',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'translation_workflow_execution_id_en', $input);
?>

<?php echo $form->textFieldRow($model, 'title_es', array('maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'title_fa', array('maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'title_hi', array('maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'title_pt', array('maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'title_sv', array('maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'title_cn', array('maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'title_de', array('maxlength' => 255)); ?>

<?php echo $form->textAreaRow($model, 'subtitles_es', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textAreaRow($model, 'subtitles_fa', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textAreaRow($model, 'subtitles_hi', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textAreaRow($model, 'subtitles_pt', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textAreaRow($model, 'subtitles_sv', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textAreaRow($model, 'subtitles_cn', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textAreaRow($model, 'subtitles_de', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'processedMediaIdEs',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'processed_media_id_es', $input);
?>

<?php
$formId = 'video-file-processed_media_id_es-' . \uniqid() . '-form';
?>

<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'P3 Media'))),
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
    'inputSelector' => '#VideoFile_processed_media_id_es',
    'model' => new P3Media,
    'pk' => 'id',
    'field' => 'itemLabel',
));
$this->endClip();
?>


<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'processedMediaIdFa',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'processed_media_id_fa', $input);
?>

<?php
$formId = 'video-file-processed_media_id_fa-' . \uniqid() . '-form';
?>

<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'P3 Media'))),
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
    'inputSelector' => '#VideoFile_processed_media_id_fa',
    'model' => new P3Media,
    'pk' => 'id',
    'field' => 'itemLabel',
));
$this->endClip();
?>


<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'processedMediaIdHi',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'processed_media_id_hi', $input);
?>

<?php
$formId = 'video-file-processed_media_id_hi-' . \uniqid() . '-form';
?>

<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'P3 Media'))),
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
    'inputSelector' => '#VideoFile_processed_media_id_hi',
    'model' => new P3Media,
    'pk' => 'id',
    'field' => 'itemLabel',
));
$this->endClip();
?>


<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'processedMediaIdPt',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'processed_media_id_pt', $input);
?>

<?php
$formId = 'video-file-processed_media_id_pt-' . \uniqid() . '-form';
?>

<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'P3 Media'))),
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
    'inputSelector' => '#VideoFile_processed_media_id_pt',
    'model' => new P3Media,
    'pk' => 'id',
    'field' => 'itemLabel',
));
$this->endClip();
?>


<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'processedMediaIdSv',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'processed_media_id_sv', $input);
?>

<?php
$formId = 'video-file-processed_media_id_sv-' . \uniqid() . '-form';
?>

<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'P3 Media'))),
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
    'inputSelector' => '#VideoFile_processed_media_id_sv',
    'model' => new P3Media,
    'pk' => 'id',
    'field' => 'itemLabel',
));
$this->endClip();
?>


<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'processedMediaIdCn',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'processed_media_id_cn', $input);
?>

<?php
$formId = 'video-file-processed_media_id_cn-' . \uniqid() . '-form';
?>

<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'P3 Media'))),
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
    'inputSelector' => '#VideoFile_processed_media_id_cn',
    'model' => new P3Media,
    'pk' => 'id',
    'field' => 'itemLabel',
));
$this->endClip();
?>


<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'processedMediaIdDe',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'processed_media_id_de', $input);
?>

<?php
$formId = 'video-file-processed_media_id_de-' . \uniqid() . '-form';
?>

<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'P3 Media'))),
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
    'inputSelector' => '#VideoFile_processed_media_id_de',
    'model' => new P3Media,
    'pk' => 'id',
    'field' => 'itemLabel',
));
$this->endClip();
?>

<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'translationWorkflowExecutionIdEs',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'translation_workflow_execution_id_es', $input);
?>


<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'translationWorkflowExecutionIdFa',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'translation_workflow_execution_id_fa', $input);
?>


<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'translationWorkflowExecutionIdHi',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'translation_workflow_execution_id_hi', $input);
?>

<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'translationWorkflowExecutionIdPt',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'translation_workflow_execution_id_pt', $input);
?>


<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'translationWorkflowExecutionIdSv',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'translation_workflow_execution_id_sv', $input);
?>


<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'translationWorkflowExecutionIdCn',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'translation_workflow_execution_id_cn', $input);
?>


<?php
$input = $this->widget(
    '\GtcRelation',
    array(
        'model' => $model,
        'relation' => 'translationWorkflowExecutionIdDe',
        'fields' => 'itemLabel',
        'allowEmpty' => true,
        'style' => 'dropdownlist',
        'htmlOptions' => array(
            'checkAll' => 'all'),
    )
    , true);
echo $form->customRow($model, 'translation_workflow_execution_id_de', $input);
?>


</div>
</div>
<!-- main inputs -->

<div class="span4"> <!-- sub inputs -->


</div>
<!-- sub inputs -->
</div>
