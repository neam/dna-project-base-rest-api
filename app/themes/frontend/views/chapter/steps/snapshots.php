<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('app', 'Add snapshot'),
            'icon' => 'icon-plus',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#addrelation-chapter-snapshot-modal',
            ),
        ), true);
        ?>
        <?php
        $this->renderPartial('//gridRelation/_relation_list', array(
            'label' => 'List of snapshots',
            'noitemsLabel' => 'No snapshots',
            'items' => $model->snapshots,
            'model' => $model,
        ));
        ?>
    </div>
</div>

<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("snapshot"); ?>
</p>

<?php
$this->renderPartial('//gridRelation/_modal_form', array(
    'toType' => 'Snapshot',
    'toLabel' => 'snapshot',
    'fromType' => 'Chapter',
    'fromLabel' => 'chapter',
    'fromId' => $model->id,
));
?>


