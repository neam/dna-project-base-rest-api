<?php
/** @var ExamQuestionAlternativeController|ItemController $this */
/** @var ExamQuestionAlternative|ItemTrait $model */
?>
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
