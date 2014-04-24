<div class="view">

    <?php if (!is_null($data->original_media_id)): ?>

        <?php
        $videoMedia = P3Media::model()->findByPk($data->original_media_id); // Currently we hard-code to use the original movie file instead of any processed media
        $videoUrl = $videoMedia->createUrl('original-public-webm');
        $subtitleUrl = $this->createUrl('videoFile/subtitles', array('id' => $data->id));
        ?>

        <?php
        $cs = Yii::app()->clientScript;
        $am = Yii::app()->assetManager;
        Yii::app()->params["bowerAssets"] = $am->publish(
            Yii::getPathOfAlias('bower-components'),
            true // hash by name
        );
        $cs->registerScriptFile(Yii::app()->params["bowerAssets"] . '/mediaelement/build/mediaelement-and-player.min.js');
        $cs->registerCssFile(Yii::app()->params["bowerAssets"] . '/mediaelement/build/mediaelementplayer.min.css');
        ?>

        <video width="604" height="340" controls="controls"><!-- Not used preload="none" -->
            <source type="video/webm" src="<?php echo CHtml::encode($videoUrl); ?>">
            <track src="<?php echo CHtml::encode($subtitleUrl); ?>" kind="subtitles"
                   srclang="<?php echo substr(Yii::app()->language, 0, 2); ?>" default>
            </track>
            <object width="604" height="346" type="application/x-shockwave-flash"
                    data="<?php echo Yii::app()->request->baseUrl; ?>/../components/mediaelement/build/flashmediaelement.swf">
                <param
                    movie="<?php echo Yii::app()->request->baseUrl; ?>/../components/mediaelement/build/flashmediaelement.swf">
                <param flashvars="controls=true&amp;amp;file=<?php echo rawurlencode($videoUrl); ?>">
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
            <?php echo Yii::t('app', 'No media file available'); ?>
        </div>

    <?php endif; ?>

    <?php if (isset($evaluate) && $evaluate): ?>
        <?php $this->widget('ModalCommentsWidget', array('model' => $data, 'attribute' => 'clip')); ?>
    <?php endif; ?>

    <?php if (Yii::app()->user->checkAccess('VideoFile.*')): ?>
        <div class="admin-container hide">
            <?php echo CHtml::link('<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Video File'))), array('videoFile/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('Developer')): ?>
        <div class="admin-container hide">
            <h3>Developer access</h3>
            <?php echo CHtml::link('<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Video File'))), array('videoFile/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
<br>

<?php if (isset($step)): ?>
    <?php switch ($this->action->id . '-' . $step) {
        case 'translate-subtitles':
            $this->widget('\TbButton', array(
                'label' => Yii::t('model', 'Load current translations into media player'),
                'url' => Yii::app()->request->url,
                'type' => 'primary',
            ));
            break;
        default:
            echo CHtml::submitButton(Yii::t('model', 'Save changes'), array(
                'class' => 'btn btn-primary btn-dirtyforms',
                'name' => 'save-changes',
            ));
            $this->widget('\TbButton', array(
                'label' => Yii::t('model', 'Reset'),
                'url' => Yii::app()->request->url,
                'htmlOptions' => array(
                    'class' => 'btn-dirtyforms ignoredirty'
                ),
            ));
    } ?>
<?php endif; ?>
