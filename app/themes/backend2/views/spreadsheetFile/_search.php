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
        <?php echo $form->label($model, 'version'); ?>
        <?php echo $form->textField($model, 'version'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'cloned_from_id'); ?>
        <?php echo $form->textField($model, 'cloned_from_id', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, '_title'); ?>
        <?php echo $form->textField($model, '_title', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'data_source_id'); ?>
        <?php echo $form->textField($model, 'data_source_id', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'original_media_id'); ?>
        <?php echo $form->textField($model, 'original_media_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'generate_processed_media'); ?>
        <?php echo $form->checkBox($model, 'generate_processed_media'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_en'); ?>
        <?php echo $form->textField($model, 'processed_media_id_en'); ?>
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
        <?php echo $form->label($model, 'owner_id'); ?>
        <?php echo $form->textField($model, 'owner_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'node_id'); ?>
        <?php echo $form->textField($model, 'node_id', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_es'); ?>
        <?php echo $form->textField($model, 'processed_media_id_es'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_fa'); ?>
        <?php echo $form->textField($model, 'processed_media_id_fa'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_hi'); ?>
        <?php echo $form->textField($model, 'processed_media_id_hi'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_pt'); ?>
        <?php echo $form->textField($model, 'processed_media_id_pt'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_sv'); ?>
        <?php echo $form->textField($model, 'processed_media_id_sv'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_cn'); ?>
        <?php echo $form->textField($model, 'processed_media_id_cn'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_de'); ?>
        <?php echo $form->textField($model, 'processed_media_id_de'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
