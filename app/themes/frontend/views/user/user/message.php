<?php /** @var GMActivationController $this */ ?>

<?php $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t('Login'); ?>

<h1><?php echo $title; ?></h1>

<div class="row">
    <div class="span12">
        <div class="form">
            <?php echo $content; ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="span12">
        <?php if ($activated): ?>
            <?php $this->widget('\TbButton', array(
                'label' => Yii::t('activation', 'Go to your dashboard'),
                'size' => 'large',
                'icon' => 'glyphicon-home',
                'url' => array('/account/dashboard'),
            )); ?>
            <?php $this->widget('\TbButton', array(
                'label' => Yii::t('activation', 'Complete your profile'),
                'size' => 'large',
                'icon' => 'glyphicon-user',
                'url' => array('/account/profile'),
            )); ?>
        <?php endif; ?>
    </div>
</div>
