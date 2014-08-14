<?php
/**
 * @var SectionController $this
 * @var Section $model
 */
?>
<div id="<?php echo $model->slug; ?>">

    <?php foreach ($model->contents as $node): ?>
        <?php $this->widget('\NodeRenderer', compact('node')); ?>
    <?php endforeach; ?>

</div>
