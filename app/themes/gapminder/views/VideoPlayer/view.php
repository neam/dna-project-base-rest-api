<?php
/* @var VideoPlayer $this */
/* @var string $videoUrl */
/* @var string $subtitleUrl */
/* @var string $playerUrl */
/* @var string $srcLang */
?>
<?php if ($this->videoExists()): ?>
    <video width="604" height="340" controls="controls"><!-- Not used preload="none" -->
        <source type="video/webm" src="<?php echo e($videoUrl); ?>">
        <track src="<?php echo e($subtitleUrl); ?>" kind="subtitles" srclang="<?php echo e($srcLang); ?>" default>
        </track>
        <object width="604" height="346" type="application/x-shockwave-flash" data="<?php echo e($playerUrl); ?>">
            <param movie="<?php echo e($playerUrl); ?>">
            <param flashvars="controls=true&amp;amp;file=<?php echo e($this->getRawVideoUrl()); ?>">
        </object>
    </video>
<?php else: ?>
    <div class="alert">
        <?php echo Yii::t('error', 'No media file available.'); ?>
    </div>
<?php endif; ?>