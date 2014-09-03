<?php
/** @var PageController|WorkflowUiControllerTrait $this */
/** @var Page|ItemTrait $model */
/** @var TbActiveForm|AppActiveForm $form */
?>
<?php echo $form->translateTextFieldControlGroup(
    $model,
    'title',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
<?php echo $form->translateTextFieldControlGroup(
    $model,
    'slug',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
<?php echo $form->translateTextAreaControlGroup(
    $model,
    'about',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>

<?php if ($this->actionUsesEditWorkflow()): ?>
    <?php
    echo $form->select2ControlGroup(
        $model,
        'sections',
        CHtml::listData(
            Section::model()->findAll('page_id = :page_id', array(':page_id' => $model->id)),
            'node_id',
            'itemLabel'
        ),
        array(
            'multiple' => true,
            'unselectValue' => '', // Anything that empty() evaluates as true
            'options' => $form->selectRelated($model, 'sections', 'node_id'),
        )
    );

    echo Html::link(
        Yii::t('sections', '{icon} Create new section', array('{icon}' => '<i class="glyphicon glyphicon-plus"></i>')),
        array('/section/addToPage', 'pageId' => $model->id),
        array(
            'class' => 'btn btn-default',
            'role' => 'button',
        )
    );

    ?>

<?php endif; ?>
