<div class="view">

    <?php if (!is_null($data->processed_media_id_en)): ?>

        <?php
        $videoMedia = P3Media::model()->findByPk($data->processed_media_id_en); // Currently we hard-code to use the english movie file
        $videoUrl = $videoMedia->createUrl('original-public');
        $subtitleUrl = $this->createUrl('videoFile/subtitles', array('id' => $data->id));
        ?>

        <link rel="stylesheet"
              href="<?php echo Yii::app()->request->baseUrl; ?>/../components/mediaelement/build/mediaelementplayer.min.css"/>
        <script type="text/javascript"
                src="<?php echo Yii::app()->request->baseUrl; ?>/../components/mediaelement/build/mediaelement-and-player.min.js"></script>

        <video width="604" height="340" controls="controls"><!-- Not used preload="none" -->
            <source type="video/webm" src="<?php echo $videoUrl; ?>">
            <track src="<?php echo $subtitleUrl; ?>" kind="subtitles"
                   srclang="<?php echo substr(Yii::app()->language, 0, 2); ?>" default>
            </track>
            <object width="604" height="346" type="application/x-shockwave-flash"
                    data="<?php echo Yii::app()->request->baseUrl; ?>/../components/mediaelement/build/flashmediaelement.swf">
                <param
                    movie="<?php echo Yii::app()->request->baseUrl; ?>/../components/mediaelement/build/flashmediaelement.swf">
                <param flashvars="controls=true&amp;amp;file=<?php echo $videoUrl; ?>">
            </object>
        </video>

        <script>

            $(document).ready(function () {
                $('video').mediaelementplayer({
                    startLanguage: '<?php echo substr(Yii::app()->language,0,2); // To conform with BCP 47 2-letter language tags requirement ?>',
                    enablePluginDebug: true,
                    plugins: ['flash', 'silverlight']
                });
            });

        </script>

    <?php else: ?>

        <div class="alert">
            <?php echo Yii::t('app', 'No processed media file available'); ?>
        </div>

    <?php endif; ?>

    <?php if (Yii::app()->user->checkAccess('VideoFile.*')): ?>
        <div class="admin-container show">
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('crud', 'Update {model}', array('{model}' => Yii::t('crud', 'Video File'))), array('videoFile/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
