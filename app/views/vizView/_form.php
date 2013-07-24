<div class="">
    <p class="alert">
        <?php echo Yii::t('crud', 'Fields with <span class="required">*</span> are required.'); ?>
    </p>



    <?php

    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'viz-view-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => true,
        'type' => 'horizontal',
    ));

    echo $form->errorSummary($model);

    $this->renderPartial('_elements', array(
        'model' => $model,
        'form' => $form,
    ));
    ?>
    <div class="form-actions">

        <?php
        echo CHtml::Button(Yii::t('crud', 'Cancel'), array(
            'submit' => (isset($_GET['returnUrl'])) ? $_GET['returnUrl'] : array('vizview/admin'),
            'class' => 'btn'
        ));
        echo ' ' . CHtml::submitButton(Yii::t('crud', 'Save'), array(
                'class' => 'btn btn-primary'
            ));
        ?>
    </div>

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
