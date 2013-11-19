<div class="view">

    <?php if (!is_null($data->processed_media_id_en)): ?>

        <?php
        $videoMedia = P3Media::model()->findByPk($data->processed_media_id_en); // Currently we hard-code to use the english movie file
        //TODO: Check if original-public works properly.
        //Error generated "Undefined index: type", might be because there's erronous data in db (not correctly processed video etc), or logic flaw?
        //$videoUrl = $videoMedia->createUrl('original-public');
        $videoUrl = $videoMedia->createUrl('small');
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
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Video File'))), array('videoFile/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('Developer')): ?>
        <div class="admin-container show">
            <h3>Developer access</h3>
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Video File'))), array('videoFile/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
