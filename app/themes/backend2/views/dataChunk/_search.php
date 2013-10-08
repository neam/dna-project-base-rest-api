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
        <?php echo $form->label($model, 'title_en'); ?>
        <?php echo $form->textField($model, 'title_en', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug'); ?>
        <?php echo $form->textField($model, 'slug', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'about'); ?>
        <?php echo $form->textField($model, 'about', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'file_media_id'); ?>
        <?php echo $form->textField($model, 'file_media_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'metadata'); ?>
        <?php echo $form->textArea($model, 'metadata', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'data_source_id'); ?>
        <?php echo $form->textField($model, 'data_source_id', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slideshow_file_id'); ?>
        <?php echo $form->textField($model, 'slideshow_file_id', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'vector_graphic_id'); ?>
        <?php echo $form->textField($model, 'vector_graphic_id', array('size' => 20, 'maxlength' => 20)); ?>
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
        <?php echo $form->label($model, 'title_es'); ?>
        <?php echo $form->textField($model, 'title_es', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_fa'); ?>
        <?php echo $form->textField($model, 'title_fa', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_hi'); ?>
        <?php echo $form->textField($model, 'title_hi', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_pt'); ?>
        <?php echo $form->textField($model, 'title_pt', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_sv'); ?>
        <?php echo $form->textField($model, 'title_sv', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_cn'); ?>
        <?php echo $form->textField($model, 'title_cn', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_de'); ?>
        <?php echo $form->textField($model, 'title_de', array('size' => 60, 'maxlength' => 255)); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
