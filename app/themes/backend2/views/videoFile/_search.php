<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php echo $form->textField($model, 'id', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_en'); ?>
        <?php echo $form->textField($model, 'title_en', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'subtitles_en'); ?>
        <?php echo $form->textArea($model, 'subtitles_en', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'original_media_id'); ?>
        <?php echo $form->dropDownList($model, 'original_media_id', CHtml::listData(P3Media::model()->findAll(),
            'id', 'title'), array('prompt' => 'all')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'generate_processed_media'); ?>
        <?php echo $form->checkBox($model, 'generate_processed_media'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_en'); ?>
        <?php echo $form->dropDownList($model, 'processed_media_id_en', CHtml::listData(P3Media::model()->findAll(),
            'id', 'title'), array('prompt' => 'all')); ?>
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

    <div class="row">
        <?php echo $form->label($model, 'subtitles_es'); ?>
        <?php echo $form->textArea($model, 'subtitles_es', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'subtitles_fa'); ?>
        <?php echo $form->textArea($model, 'subtitles_fa', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'subtitles_hi'); ?>
        <?php echo $form->textArea($model, 'subtitles_hi', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'subtitles_pt'); ?>
        <?php echo $form->textArea($model, 'subtitles_pt', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'subtitles_sv'); ?>
        <?php echo $form->textArea($model, 'subtitles_sv', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'subtitles_cn'); ?>
        <?php echo $form->textArea($model, 'subtitles_cn', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'subtitles_de'); ?>
        <?php echo $form->textArea($model, 'subtitles_de', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_es'); ?>
        <?php echo $form->dropDownList($model, 'processed_media_id_es', CHtml::listData(P3Media::model()->findAll(),
            'id', 'title'), array('prompt' => 'all')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_fa'); ?>
        <?php echo $form->dropDownList($model, 'processed_media_id_fa', CHtml::listData(P3Media::model()->findAll(),
            'id', 'title'), array('prompt' => 'all')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_hi'); ?>
        <?php echo $form->dropDownList($model, 'processed_media_id_hi', CHtml::listData(P3Media::model()->findAll(),
            'id', 'title'), array('prompt' => 'all')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_pt'); ?>
        <?php echo $form->dropDownList($model, 'processed_media_id_pt', CHtml::listData(P3Media::model()->findAll(),
            'id', 'title'), array('prompt' => 'all')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_sv'); ?>
        <?php echo $form->dropDownList($model, 'processed_media_id_sv', CHtml::listData(P3Media::model()->findAll(),
            'id', 'title'), array('prompt' => 'all')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_cn'); ?>
        <?php echo $form->dropDownList($model, 'processed_media_id_cn', CHtml::listData(P3Media::model()->findAll(),
            'id', 'title'), array('prompt' => 'all')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'processed_media_id_de'); ?>
        <?php echo $form->dropDownList($model, 'processed_media_id_de', CHtml::listData(P3Media::model()->findAll(),
            'id', 'title'), array('prompt' => 'all')); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
