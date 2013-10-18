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
        <?php echo $form->label($model, 'slug_en'); ?>
        <?php echo $form->textField($model, 'slug_en', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'question_en'); ?>
        <?php echo $form->textArea($model, 'question_en', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'source_node_id'); ?>
        <?php echo $form->textField($model, 'source_node_id', array('size' => 20, 'maxlength' => 20)); ?>
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
        <?php echo $form->label($model, 'question_es'); ?>
        <?php echo $form->textArea($model, 'question_es', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'question_fa'); ?>
        <?php echo $form->textArea($model, 'question_fa', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'question_hi'); ?>
        <?php echo $form->textArea($model, 'question_hi', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'question_pt'); ?>
        <?php echo $form->textArea($model, 'question_pt', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'question_sv'); ?>
        <?php echo $form->textArea($model, 'question_sv', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'question_cn'); ?>
        <?php echo $form->textArea($model, 'question_cn', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'question_de'); ?>
        <?php echo $form->textArea($model, 'question_de', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'exam_question_qa_state_id_en'); ?>
        <?php echo $form->textField($model, 'exam_question_qa_state_id_en', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'exam_question_qa_state_id_es'); ?>
        <?php echo $form->textField($model, 'exam_question_qa_state_id_es', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'exam_question_qa_state_id_fa'); ?>
        <?php echo $form->textField($model, 'exam_question_qa_state_id_fa', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'exam_question_qa_state_id_hi'); ?>
        <?php echo $form->textField($model, 'exam_question_qa_state_id_hi', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'exam_question_qa_state_id_pt'); ?>
        <?php echo $form->textField($model, 'exam_question_qa_state_id_pt', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'exam_question_qa_state_id_sv'); ?>
        <?php echo $form->textField($model, 'exam_question_qa_state_id_sv', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'exam_question_qa_state_id_cn'); ?>
        <?php echo $form->textField($model, 'exam_question_qa_state_id_cn', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'exam_question_qa_state_id_de'); ?>
        <?php echo $form->textField($model, 'exam_question_qa_state_id_de', array('size' => 20, 'maxlength' => 20)); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
