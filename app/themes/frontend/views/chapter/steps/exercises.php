<div class="control-group">
    <div class="controls">
        <?php
        echo $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('app', 'Add exercise'),
            'icon' => 'icon-plus',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#addrelation-chapter-exercise-modal',
            ),
        ), true);
        ?>
        <?php
        $this->renderPartial('//gridRelation/_relation_list', array(
            'relation' => 'exercises',
            'model' => $model,
        ));
        ?>
    </div>
</div>

<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("exercise"); ?>
</p>

<?php
$this->renderPartial('//gridRelation/_modal_form', array(
    'toType' => 'Exercise',
    'toLabel' => 'exercise',
    'fromType' => 'Chapter',
    'fromLabel' => 'chapter',
    'fromId' => $model->id,
    'type' => 'edge',
));
?>