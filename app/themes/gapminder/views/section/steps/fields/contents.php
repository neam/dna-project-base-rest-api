<?php
/**
 * @var SectionController $this
 * @var Section $model
 * @var AppActiveForm $form
 */
?>

<?php
$criteria = new CDbCriteria();
$criteria->addInCondition('model_class', array('HtmlChunk'));
$this->widget(
    '\Edges',
    array(
        'model' => $model,
        'criteria' => $criteria,
        'relation' => 'contents',
        'itemClass' => 'Item',
    )
);
?>
