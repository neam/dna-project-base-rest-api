<div class="">
    <p class="alert">
        <?php echo Yii::t('model', 'Fields with <span class="required">*</span> are required.'); ?>
    </p>
    <?php

    $form = $this->beginWidget('\TbActiveForm', array(
        'id' => 'section-qa-state-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => true,
        'type' => 'horizontal',
    ));

    echo $form->errorSummary($model);

    if (!isset($elementsViewAlias)) {
        $elementsViewAlias = '_elements';
    }

    $this->renderPartial($elementsViewAlias, array(
        'model' => $model,
        'form' => $form,
    ));
    ?>
    <div class="form-actions">
        <?php
        echo CHtml::Button(Yii::t('model', 'Cancel'), array(
                'submit' => (isset($_GET['returnUrl'])) ? $_GET['returnUrl'] : array('sectionQaState/admin'),
                'class' => 'btn'
            )
        );
        echo ' ';
        echo CHtml::submitButton(Yii::t('model', 'Save'), array(
                'class' => 'btn btn-primary'
            )
        );
        ?>    </div>

    <?php $this->endWidget() ?>
</div> <!-- form -->

<!-- Modal create-forms referenced to from create buttons (if any) -->

<?php
foreach (array_reverse($this->clips->toArray(), true) as $key => $clip) { // Reverse order for recursive modals to render properly
    if (strpos($key, "modal:") === 0) {
        echo $clip;
    }
}
?>
