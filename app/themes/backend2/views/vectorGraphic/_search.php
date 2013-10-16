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
        <?php echo $form->label($model, 'title_en'); ?>
        <?php echo $form->textField($model, 'title_en', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_en'); ?>
        <?php echo $form->textField($model, 'slug_en', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'about_en'); ?>
        <?php echo $form->textArea($model, 'about_en', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'original_media_id'); ?>
        <?php echo $form->textField($model, 'original_media_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_en'); ?>
        <?php echo $form->textField($model, 'processed_media_id_en'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'authoring_workflow_execution_id_en'); ?>
        <?php echo $form->textField($model, 'authoring_workflow_execution_id_en', array('size' => 10, 'maxlength' => 10)); ?>
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

    <div class="row">
        <?php echo $form->label($model, 'about_es'); ?>
        <?php echo $form->textArea($model, 'about_es', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'about_fa'); ?>
        <?php echo $form->textArea($model, 'about_fa', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'about_hi'); ?>
        <?php echo $form->textArea($model, 'about_hi', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'about_pt'); ?>
        <?php echo $form->textArea($model, 'about_pt', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'about_sv'); ?>
        <?php echo $form->textArea($model, 'about_sv', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'about_cn'); ?>
        <?php echo $form->textArea($model, 'about_cn', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'about_de'); ?>
        <?php echo $form->textArea($model, 'about_de', array('rows' => 6, 'cols' => 50)); ?>
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

    <div class="row">
        <?php echo $form->label($model, 'authoring_workflow_execution_id_es'); ?>
        <?php echo $form->textField($model, 'authoring_workflow_execution_id_es', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'authoring_workflow_execution_id_fa'); ?>
        <?php echo $form->textField($model, 'authoring_workflow_execution_id_fa', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'authoring_workflow_execution_id_hi'); ?>
        <?php echo $form->textField($model, 'authoring_workflow_execution_id_hi', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'authoring_workflow_execution_id_pt'); ?>
        <?php echo $form->textField($model, 'authoring_workflow_execution_id_pt', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'authoring_workflow_execution_id_sv'); ?>
        <?php echo $form->textField($model, 'authoring_workflow_execution_id_sv', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'authoring_workflow_execution_id_cn'); ?>
        <?php echo $form->textField($model, 'authoring_workflow_execution_id_cn', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'authoring_workflow_execution_id_de'); ?>
        <?php echo $form->textField($model, 'authoring_workflow_execution_id_de', array('size' => 10, 'maxlength' => 10)); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
