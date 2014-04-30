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

<?php if ($this->action->id === 'edit'): ?>
    <?php
    $criteria = new CDbCriteria();
    $criteria->addCondition('t.page_id = :page_id');
    $criteria->addCondition('t.node_id NOT IN (SELECT to_node_id FROM edge WHERE from_node_id = :page_node_id)');
    $criteria->params[':page_id'] = $model->id;
    $criteria->params[':page_node_id'] = $model->node_id;

    $this->widget(
        '\Edges',
        array(
            'model' => $model,
            'criteria' => $criteria,
            'relation' => 'sections',
            'itemClass' => 'Section',
        )
    );

    echo Html::link(
        Yii::t('page sections', '{icon} Create new section', array('{icon}' => '<i class="glyphicon glyphicon-plus"></i>')),
        array('/section/add', 'pageId' => $model->id),
        array(
            'class' => 'btn btn-default',
            'role' => 'button',
        )
    );

    ?>

<?php endif; ?>
