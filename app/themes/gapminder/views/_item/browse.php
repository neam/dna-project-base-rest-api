<?php
/* @var ActiveRecord $model */
/* @var CActiveDataProvider $dataProvider */

$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
$this->breadcrumbs[] = Yii::t('app', 'Browse');

// TODO: Create a method for setting the menu items, and remove this if statement.
if (empty($this->menu)) {
    $this->menu = array(
        array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
    );
}
?>
<div class="item-controller browse-action">
    <h1>
        <?php echo Yii::t('model', $model->modelLabel, 2); ?>
        <small><?php echo $this->itemDescriptionTooltip(); ?></small>
    </h1>
    <?php $this->renderPartial('/_item/elements/browsebar', compact('model')); ?>
    <?php $this->widget(
        '\TbListView',
        array(
            'dataProvider' => $dataProvider,
            'template' => '{summary}{pager}{items}{pager}',
            'itemView' => '/_item/_list-item',
            'pager' => array(
                'class' => '\TbPager',
                'hideFirstAndLast' => true,
            ),
        )
    ); ?>
</div>
