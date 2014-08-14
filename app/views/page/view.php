<?php
/**
 * @var PageController $this
 * @var Page $model
 */
?>

<div class="<?php echo $this->getCssClasses($model); ?>">

    <h1><?php echo $model->title; ?></h1>

    <div class="content">
        <?php foreach ($model->sections as $section): ?>
            <?php $this->renderPartial('/section/view', array('model' => $section)); ?>
        <?php endforeach; ?>
    </div>

</div>
