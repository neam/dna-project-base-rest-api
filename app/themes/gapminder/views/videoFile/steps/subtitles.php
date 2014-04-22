<?php
/* @var VideoFileController $this */
/* @var VideoFile|ItemTrait $model */
/* @var AppActiveForm $form */
?>
<?php if (!$this->workflowData['translateInto']): ?>
    <?php echo $form->textAreaControlGroup($model, 'subtitles_' . $model->source_language, array(
        'class' => Html::ITEM_FORM_FIELD_CLASS,
        'disabled' => !$this->canEditSourceLanguage(),
        'rows' => 50,
        'cols' => 50,
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'subtitles_' . $model->source_language, 'subtitles'),
        ),
    )); ?>
    <?php $this->renderPartial('steps/fields/subtitles_import', compact('form', 'model')); ?>
    <br>
    <?php echo TbHtml::linkButton(
        Yii::t('app', 'Download SRT files'),
        array(
            'url' => array('/videoFile/downloadSubtitles', 'id' => $model->id),
        )
    ); ?>
<?php else: ?>
    <?php $currentLang = Yii::app()->language; ?>
    <?php Yii::app()->language = $this->workflowData['translateInto']; ?>
    <?php $this->renderPartial('/videoFile/_view', array(
        'data' => $model,
        'step' => $step,
    )); ?>
    <?php Yii::app()->language = $currentLang; ?>
    <?php $this->renderPartial('translate/subtitles', array(
        'model' => $model,
        'form' => $form,
    )); ?>
<?php endif; ?>