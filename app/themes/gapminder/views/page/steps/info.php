<?php
/** @var PageController|ItemController $this */
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

<?php
$pageCriteria = new CDbCriteria();
$pageCriteria->addCondition('page_id = :page_id');
$pageCriteria->params[':page_id'] = $model->id;

$this->widget(
    '\Edges',
    array(
        'model' => $model,
        'criteria' => $pageCriteria,
        'relation' => 'sections',
        'itemClass' => 'Section',
    )
); ?>

<?php echo Html::link(
    Yii::t('page sections', '{icon} Create new section', array('{icon}' => '<i class="glyphicon glyphicon-plus"></i>')),
    array('/section/add', 'pageId' => $model->id),
    array(
        'class' => 'btn btn-default',
        'role' => 'button',
    )
); ?>
