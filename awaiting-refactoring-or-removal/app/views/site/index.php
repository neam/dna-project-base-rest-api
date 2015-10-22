<?php
/** @var SiteController $this */
?>
<div class="site-controller index-action">
    <div class="alert alert-info">
        <h4><?php print Yii::t('app', 'Gapminder Content Management System (CMS) REST API'); ?></h4>

        <p><?php print Yii::t('app', 'Access the REST API under /api'); ?></p>
        <?php if (!Yii::app()->user->isGuest): ?>
            <p><?php print Yii::t('app', '(You are currently authenticated as user with ID {userid})', array('{userid}' => Yii::app()->user->id)) ?></p>
        <?php endif; ?>
    </div>

</div>
