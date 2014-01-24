<div class="btn-toolbar">

    <div class="btn-group">
        <?php
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", "Manage"),
            "icon" => "icon-edit",
            "url" => array("admin"),
            "visible" => Yii::app()->user->checkAccess('Administrator')
        ));
        $this->widget("bootstrap.widgets.TbButton", array(
            "label" => Yii::t("model", "Add"),
            "icon" => "icon-plus",
            "url" => array("add"),
            "visible" => Yii::app()->user->checkAccess('Item.Add')
        ));
        ?>
    </div>

    <div class="btn-group">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('model', 'Filter'),
            'icon' => 'icon-search',
            'htmlOptions' => array('class' => 'filter-button')
        ));?>
    </div>

</div>

<?php

Yii::app()->clientScript->registerScript('filter-form', "
    $('.filter-button').click(function(){
        $('.filter-form').toggle();
        return false;
    });
    ");

?>

<div class="filter-form" style="display:none">
    <?php $this->renderPartial('_filter', array(
        'model' => $model,
    )); ?>
</div>
