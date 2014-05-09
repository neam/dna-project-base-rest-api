<?php
/** @var DashboardTaskList $this */
/** @var array $data */
?>
<li class="tasks-list-item">
    <div class="task">
        <?php $this->render("_{$data['task']}Task", array('data' => $data)); ?>
    </div>
</li>
