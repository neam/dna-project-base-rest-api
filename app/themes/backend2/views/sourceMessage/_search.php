<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>
    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'category'); ?>
        <?php echo $form->textField($model, 'category', array('size' => 32, 'maxlength' => 32)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'message'); ?>
        <?php echo $form->textArea($model, 'message', array('rows' => 6, 'cols' => 50)); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
