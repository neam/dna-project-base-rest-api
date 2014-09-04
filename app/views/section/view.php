<?php
/**
 * @var SectionController $this
 * @var Section $model
 */
?>
<div id="<?php echo $model->slug; ?>">

    <h2><?php echo CHtml::encode($model->title); ?></h2>

    <?php foreach ($model->contents as $node): ?>
        <?php $this->widget('\NodeRenderer', compact('node')); ?>
    <?php endforeach; ?>

</div>
