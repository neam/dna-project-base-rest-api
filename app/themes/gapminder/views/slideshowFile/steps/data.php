<?php
/* @var SlideshowFileController|ItemController $this */
/* @var SlideshowFile|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php
$criteria = new CDbCriteria();
$criteria->addNotInCondition('t.id', $model->getRelatedModelColumnValues('dataarticles', 'id'));
$this->widget(
    '\Edges',
    array(
        'model' => $model,
        'relation' => 'dataarticles',
        'itemClass' => 'DataArticle',
        'criteria' => $criteria,
    )
);

publishJs('/themes/gapminder/js/force-dirty-forms.js', CClientScript::POS_END);
?>
