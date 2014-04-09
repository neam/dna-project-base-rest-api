<?php
/**
 * @var PageController $this
 * @var Page $model
 * @var AppActiveForm $form
 */
?>

<?php $this->widget(
    '\RelatedItems',
    array(
        'model' => $model,
        'relation' => 'sections',
    )
); ?>
