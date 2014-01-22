<?php
$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
$this->breadcrumbs[] = Yii::t('app', 'Browse');
?>

<?php
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
    );
}
?>
<h1><?php echo Yii::t('model', $model->modelLabel, 2); ?>
    <small><?php echo $this->itemDescriptionTooltip(); ?></small>
</h1>
<style>
    .grid-view small {
        display: block;
        float: left;
        margin-right: 15px;
    }

    .grid-view h1 {
        margin: 0;
    }
</style>
<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php Yii::beginProfile('Chapter.view.grid'); ?>
<?php

$this->widget('bootstrap.widgets.TbGroupGridView',
    array(
        'filter' => $model,
        'id' => 'chapter-grid',
        'dataProvider' => $model->search(),
        'template' => '{summary}{pager}{items}{pager}',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'extraRowColumns' => array('id'),
        'extraRowExpression' => function ($data, $row) {
                $return = $this->renderPartial("/_item/elements/flowbar", array("model" => $data), true);
                $return .= $this->renderPartial("_view", array("data" => $data), true);
                return $return;
            },
        'extraRowHtmlOptions' => array('style' => 'padding:2em;margin-top:2em;'),
        'columns' => array(
            'id',
            'title',
            '_title',
            array(
                'name' => 'thumbnail_media_id',
                'filter' => false,
                'value' => function ($data, $row) {
                        if ($data->thumbnailMedia instanceof P3Media) {
                            echo CHtml::link($data->thumbnailMedia->image("select2-thumb"), Yii::app()->controller->createUrl('view', array('id' => $data->id)));
                        }
                    },
            ),
            'slug',
        ),
    )
);
?>
<?php Yii::endProfile('Chapter.view.grid'); ?>
