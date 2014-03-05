<?php
/* @var VideoPlayer $this */
/* @var string $playerUrl */
/* @var string $srcLang */
?>
<?php if ($this->videoExists()): ?>
    <video width="604" height="340" controls="controls"><!-- Not used preload="none" -->
        <source type="<?php echo $this->getMimeType(); ?>" src="<?php echo $this->getVideoUrl(); ?>">
        <track src="<?php echo $this->getSubtitleUrl(); ?>" kind="subtitles" srclang="<?php echo e($srcLang); ?>" default>
        </track>
        <object width="604" height="346" type="application/x-shockwave-flash" data="<?php echo e($playerUrl); ?>">
            <param movie="<?php echo e($playerUrl); ?>">
            <param flashvars="controls=true&amp;amp;file=<?php echo $this->getRawVideoUrl(); ?>">
        </object>
    </video>
<?php else: ?>
    <div class="alert">
        <?php echo Yii::t('error', 'No media file available.'); ?>
    </div>
<?php endif; ?>