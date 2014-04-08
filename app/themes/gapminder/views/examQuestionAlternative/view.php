<?php
/**
 * @var ExamQuestionAlternativeController $this
 * @var ExamQuestionAlternative $model
 */
?>
<?php $this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('browse'); ?>
<?php $this->renderPartial('/_item/elements/flowbar', compact('model')); ?>
<div class="<?php $this->getCssClasses($model); ?>">
    <div class="after-flowbar">

        <?php $this->widget(
            'ItemDetails',
            array(
                'model' => $model,
                'attributes' => array(
                    'id',
                    'slug_' . $model->source_language,
                    'markup_' . $model->source_language,
                    'correct'
                ),
            )
        ); ?>

    </div>

</div>
