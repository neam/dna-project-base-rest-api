<?php
/* @var ExamQuestionController|ItemController $this */
/* @var ExamQuestion|ItemTrait $model */
/* @var AppActiveForm $form */
?>
<div class="control-group">
    <div class="controls">
        <?php echo $this->widget(
            '\TbButton',
            array(
                'label' => Yii::t('app', 'Add related item'),
                'icon' => TbHtml::ICON_PLUS,
                'htmlOptions' => array(
                    'data-toggle' => 'modal',
                    'data-target' => '#addrelation-examquestion--modal',
                ),
            ),
            true
        ); ?>
        <?php $this->renderPartial(
            '//gridRelation/_relation_list',
            array(
                'relation' => 'related',
                'model' => $model,
                'label' => 'related items',
            )
        ); ?>
    </div>
</div>
<div class="related-text">
    <?php echo $model->getAttributeHint('related'); ?>
</div>
<?php /*
 // TODO: Fix modal.
<?php $this->renderPartial(
    '//gridRelation/_modal_form',
    array(
        'model' => $model,
        'relation' => 'related',
        'toType' => '',
        'toLabel' => 'related item',
        'type' => 'edge',
    )
); ?>
*/ ?>
