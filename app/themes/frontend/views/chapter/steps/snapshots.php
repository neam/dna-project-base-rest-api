<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('app', 'Add visualization'),
            'icon' => 'icon-plus',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#addrelation-chapter-snapshot-modal',
            ),
        ), true);
        ?>
        <?php
        $this->renderPartial('//gridRelation/_relation_list', array(
            'relation' => 'snapshots',
            'model' => $model,
            'label' => 'visualizations',
        ));
        ?>
    </div>
</div>

<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("snapshot"); ?>
</p>

<?php
$this->renderPartial('//gridRelation/_modal_form', array(
    'model' => $model,
    'toType' => 'Snapshot',
    'toLabel' => 'visualization',
    'type' => 'edge',
));
?>


