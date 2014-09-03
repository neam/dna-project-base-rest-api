<?php
/**
 * @var GroupController $this
 * @var Group $model
 */
?>
<div class="group-controller view-action">

    <h1><?php echo $model->title; ?>
        <small><?php echo t('app', '{count} members', array('{count}' => $model->memberCount)); ?></small>
    </h1>

</div>
