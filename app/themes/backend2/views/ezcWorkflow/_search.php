<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>
    <div class="row">
        <?php echo $form->label($model, 'workflow_id'); ?>
        <?php ; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'workflow_name'); ?>
        <?php echo $form->textField($model, 'workflow_name', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'workflow_version'); ?>
        <?php echo $form->textField($model, 'workflow_version', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'workflow_created'); ?>
        <?php echo $form->textField($model, 'workflow_created'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
