<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('app', 'Add data'),
            'icon' => 'icon-plus',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#addrelation-vectorgraphic-datachunk-modal',
            ),
        ), true);
        ?>
        <?php
        $this->renderPartial('//gridRelation/_relation_list', array(
            'relation' => 'dataChunks',
            'model' => $model,
            'label' => 'data',
        ));
        ?>
    </div>
</div>

<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("dataChunks"); ?>
</p>

<?php
$this->renderPartial('//gridRelation/_modal_form', array(
    'model' => $model,
    'toType' => 'DataChunk',
    'toLabel' => 'data',
    'type' => 'edge',
));
?>