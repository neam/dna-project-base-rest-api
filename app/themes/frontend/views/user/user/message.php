<?php $this->pageTitle = Yii::app()->name.' - '.UserModule::t('Login'); ?>

<h1><?php echo $title; ?></h1>

<div class="form">
    <?php echo $content; ?>
</div>

<div class="row">
    <div class="span12">
        <?php if ($activated): ?>
            <?php $this->widget('bootstrap.widgets.TbButton',array(
                'label'=>Yii::t('activation','Go to your dashboard'),
                'size'=>'large',
                'icon'=>'icon-home',
                'url'=>array('/account/dashboard'),
            )); ?>
            <?php $this->widget('bootstrap.widgets.TbButton',array(
                'label'=>Yii::t('activation','Complete your profile'),
                'size'=>'large',
                'icon'=>'icon-user',
                'url'=>array('/account/profile'),
            )); ?>
        <?php endif; ?>
    </div>
</div>
