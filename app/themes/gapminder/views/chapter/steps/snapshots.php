<?php
/* @var ChapterController|ItemController $this */
/* @var Chapter|ItemTrait $model */
/* @var AppActiveForm $form */
?>
<div class="control-group">
    <div class="controls">
        <?php echo $this->widget(
            '\TbButton',
            array(
                'label' => Yii::t('app', 'Add visualization'),
                'icon' => TbHtml::ICON_PLUS,
                'htmlOptions' => array(
                    'data-toggle' => 'modal',
                    'data-target' => '#addrelation-chapter-snapshot-modal',
                ),
            ),
            true
        ); ?>
        <?php echo Html::hintTooltip($model->getAttributeHint('snapshot')); ?>
        <?php $this->renderPartial(
            '//gridRelation/_relation_list',
            array(
                'relation' => 'snapshots',
                'model' => $model,
                'label' => 'visualizations',
            )
        ); ?>
    </div>
</div>

<?php // TODO: Fix modal. ?>
<?php $this->renderPartial('//gridRelation/_modal_form', array(
    'model' => $model,
    'relation' => 'snapshots',
    'toType' => 'Snapshot',
    'toLabel' => 'visualization',
    'type' => 'edge',
)); ?>
