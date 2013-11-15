<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('app', 'Add video'),
            'icon' => 'icon-plus',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#addrelation-chapter-video-modal',
            ),
        ), true);
        ?>
        <?php
        $this->renderPartial('//gridRelation/_relation_list', array(
            'label' => 'List of videos',
            'noitemsLabel' => 'No videos',
            'items' => $model->videos,
            'model' => $model,
        ));
        ?>
    </div>
</div>

<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("video"); ?>
</p>

<?php
$this->renderPartial('//gridRelation/_modal_form', array(
    'toType' => 'VideoFile',
    'toLabel' => 'video',
    'fromType' => 'Chapter',
    'fromLabel' => 'chapter',
    'fromId' => $model->id,
));
?>