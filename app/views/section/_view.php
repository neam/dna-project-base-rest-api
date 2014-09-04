<?php
/**
 * @var SectionController $this
 * @var Section $model
 */
?>
<div id="<?php echo $data->slug; ?>">

    <h2><?php echo CHtml::encode($data->title); ?></h2>

    <?php foreach ($data->contents as $node): ?>
        <?php $this->widget('\NodeRenderer', compact('node')); ?>
    <?php endforeach; ?>

</div>
