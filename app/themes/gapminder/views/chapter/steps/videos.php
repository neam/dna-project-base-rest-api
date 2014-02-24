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
                'label' => Yii::t('app', 'Add video'),
                'icon' => TbHtml::ICON_PLUS,
                'htmlOptions' => array(
                    'data-toggle' => 'modal',
                    'data-target' => '#addrelation-chapter-videofile-modal',
                ),
            ),
            true
        ); ?>
        <?php echo Html::hintTooltip($model->getAttributeHint('video')); ?>
        <?php $this->renderPartial(
            '//gridRelation/_relation_list',
            array(
                'relation' => 'videos',
                'model' => $model,
                'label' => 'videos',
            )
        ); ?>
    </div>
</div>

<?php // TODO: Fix modal. ?>
<?php $this->renderPartial(
    '//gridRelation/_modal_form',
    array(
        'model' => $model,
        'relation' => 'videos',
        'toType' => 'VideoFile',
        'toLabel' => 'video',
        'type' => 'edge',
    )
); ?>

<?php publishJs('/themes/frontend/js/force-clean-dirty-forms.js', CClientScript::POS_END); ?>
