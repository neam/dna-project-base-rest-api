<?php
/* @var ActiveRecord $model */

// todo: move this somewhere else.
Yii::app()->clientScript->registerScript(
    'filter-form',
    "$('.filter-button').click(function() {
        $('.filter-form').toggle();
        return false;
    });"
);
?>
<div class="browse-bar">
    <div class="btn-toolbar">
        <div class="btn-group">
            <?php $this->widget("\TbButton", array(
                "label" => Yii::t("model", "Manage"),
                "icon" => "glyphicon-edit",
                "url" => array("admin"),
                "visible" => Yii::app()->user->checkAccess('Administrator')
            )); ?>
            <?php $this->widget("\TbButton", array(
                "label" => Yii::t("model", "Add"),
                "icon" => "glyphicon-plus",
                "url" => array("add"),
                "visible" => Yii::app()->user->checkAccess('Item.Add')
            )); ?>
        </div>

        <div class="btn-group">
            <?php $this->widget('\TbButton', array(
                'label' => Yii::t('model', 'Filter'),
                'icon' => 'glyphicon-search',
                'htmlOptions' => array('class' => 'filter-button')
            )); ?>
        </div>
    </div>

    <div class="filter-form" style="display: none;">
        <?php if ($this->getViewFile('_filter')): ?>
            <?php $this->renderPartial('_filter', compact('model')); ?>
        <?php endif; ?>
    </div>
</div>