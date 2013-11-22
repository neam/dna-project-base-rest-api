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
        <?php echo $form->label($model, 'page_id'); ?>
        <?php echo $form->textField($model, 'page_id', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, '_title'); ?>
        <?php echo $form->textField($model, '_title', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_en'); ?>
        <?php echo $form->textField($model, 'slug_en', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'ordinal'); ?>
        <?php echo $form->textField($model, 'ordinal'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, '_menu_label'); ?>
        <?php echo $form->textField($model, '_menu_label', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'created'); ?>
        <?php echo $form->textField($model, 'created'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'modified'); ?>
        <?php echo $form->textField($model, 'modified'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'node_id'); ?>
        <?php echo $form->textField($model, 'node_id', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_es'); ?>
        <?php echo $form->textField($model, 'slug_es', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_fa'); ?>
        <?php echo $form->textField($model, 'slug_fa', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_hi'); ?>
        <?php echo $form->textField($model, 'slug_hi', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_pt'); ?>
        <?php echo $form->textField($model, 'slug_pt', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_sv'); ?>
        <?php echo $form->textField($model, 'slug_sv', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_cn'); ?>
        <?php echo $form->textField($model, 'slug_cn', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_de'); ?>
        <?php echo $form->textField($model, 'slug_de', array('size' => 60, 'maxlength' => 255)); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
