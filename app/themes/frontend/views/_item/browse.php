<?php
$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
$this->breadcrumbs[] = Yii::t('app', 'Browse');
?>

<div class="item-controller browse-action">
    <?php
    // TODO: Create a method for setting the menu items, and remove this if statement.
    if (!isset($this->menu) || $this->menu === array()) {
        $this->menu = array(
            array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
        );
    }
    ?>
    <h1>
        <?php echo Yii::t('model', $model->modelLabel, 2); ?>
        <small><?php echo $this->itemDescriptionTooltip(); ?></small>
    </h1>
    <style>
        /* TODO: Remove inline CSS styles. */
        .grid-view small {
            display: block;
            float: left;
            margin-right: 15px;
        }

        .grid-view h1 {
            margin: 0;
        }
    </style>
    <?php $this->renderPartial('/_item/elements/browsebar', array('model' => $model)); ?>
    <?php $this->widget(
        'zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            'template' => '{summary}{pager}{items}{pager}',
            'itemView' => '/_item/_list-item',
        )
    ); ?>
</div>
