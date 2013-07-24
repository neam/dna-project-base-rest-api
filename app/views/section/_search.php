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
        <?php echo $form->label($model, 'chapter_id'); ?>
        <?php echo $form->dropDownList($model, 'chapter_id', CHtml::listData(Chapter::model()->findAll(),
            'id', 'title_en'), array('prompt' => 'all')); ?>
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
        <?php echo $form->label($model, 'ordinal'); ?>
        <?php echo $form->textField($model, 'ordinal'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'menu_label_en'); ?>
        <?php echo $form->textField($model, 'menu_label_en', array('size' => 60, 'maxlength' => 255)); ?>
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
        <?php echo $form->label($model, 'slug_es'); ?>
        <?php echo $form->textField($model, 'slug_es', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_es'); ?>
        <?php echo $form->textField($model, 'title_es', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_fa'); ?>
        <?php echo $form->textField($model, 'slug_fa', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_fa'); ?>
        <?php echo $form->textField($model, 'title_fa', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_hi'); ?>
        <?php echo $form->textField($model, 'slug_hi', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_hi'); ?>
        <?php echo $form->textField($model, 'title_hi', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_pt'); ?>
        <?php echo $form->textField($model, 'slug_pt', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_pt'); ?>
        <?php echo $form->textField($model, 'title_pt', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_sv'); ?>
        <?php echo $form->textField($model, 'slug_sv', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_sv'); ?>
        <?php echo $form->textField($model, 'title_sv', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_de'); ?>
        <?php echo $form->textField($model, 'slug_de', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_de'); ?>
        <?php echo $form->textField($model, 'title_de', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'menu_label_es'); ?>
        <?php echo $form->textField($model, 'menu_label_es', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'menu_label_fa'); ?>
        <?php echo $form->textField($model, 'menu_label_fa', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'menu_label_hi'); ?>
        <?php echo $form->textField($model, 'menu_label_hi', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'menu_label_pt'); ?>
        <?php echo $form->textField($model, 'menu_label_pt', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'menu_label_sv'); ?>
        <?php echo $form->textField($model, 'menu_label_sv', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'menu_label_de'); ?>
        <?php echo $form->textField($model, 'menu_label_de', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'slug_cn'); ?>
        <?php echo $form->textField($model, 'slug_cn', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'title_cn'); ?>
        <?php echo $form->textField($model, 'title_cn', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'menu_label_cn'); ?>
        <?php echo $form->textField($model, 'menu_label_cn', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
