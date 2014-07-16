<div class="wide form">

    <?php
    $form = $this->beginWidget('\TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>
    <div class="row pull-left">
        <?php echo $form->label($model, 'id'); ?>
        <?php echo $form->textField($model, 'id'); ?>
    </div>

    <div class="row pull-left">
        <?php echo $form->label($model, 'version'); ?>
        <?php echo $form->textField($model, 'version'); ?>
    </div>

    <div class="row pull-left">
        <?php echo $form->label($model, 'cloned_from_id'); ?>
        <?php echo $form->textField($model, 'cloned_from_id', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row pull-left">
        <?php echo $form->label($model, '_title'); ?>
        <?php echo $form->textField($model, '_title', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row pull-left">
        <?php echo $form->label($model, 'slug_en'); ?>
        <?php echo $form->textField($model, 'slug_en', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row pull-left">
        <?php echo $form->label($model, '_about'); ?>
        <?php echo $form->textArea($model, '_about', array('ControlGroups' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row pull-left">
        <?php echo $form->label($model, 'subtitles'); ?>
        <?php echo $form->textArea($model, '_subtitles', array('ControlGroups' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row pull-left">
        <?php echo $form->label($model, 'created'); ?>
        <?php echo $form->textField($model, 'created'); ?>
    </div>

    <div class="row pull-left">
        <?php echo $form->label($model, 'modified'); ?>
        <?php echo $form->textField($model, 'modified'); ?>
    </div>

    <div class="row pull-left">
        <?php echo $form->label($model, 'node_id'); ?>
        <?php echo $form->textField($model, 'node_id', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('crud', 'Filter')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
