<?php
$this->breadcrumbs[Yii::t('model', 'Chapters')] = array('index');
$this->breadcrumbs[] = Yii::t('model', 'Index');
?>

<?php
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
        array('label' => Yii::t('app', 'Manage'), 'url' => array('admin')),
    );
}
?>
<h1><?php echo Yii::t('model', 'Chapters'); ?> <small><?php echo $this->itemDescriptionTooltip(); ?></small></h1>
<style>
    .grid-view small {
        display:block;
        float:left;
        margin-right:15px;
    }
    .grid-view h1 {
        margin:0;
    }
</style>
<?php $this->renderPartial("_toolbar"); ?>

<?php Yii::beginProfile('Chapter.view.grid'); ?>
<?php
$this->widget('TbGridView',
    array(
        'filter' => $model,
        'id' => 'chapter-grid',
        'dataProvider' => $model->search(),
        'template' => '{summary}{pager}{items}{pager}',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            array(
                'name' => '_title',
                'value' => function($data){
                        echo "<h1>";
                        echo $data->itemLabel;
                        echo "<div class=\"group\"><small>Version: ".$data->version."</small>";
                        echo "<small>Status: ".Yii::t('statuses', $data->qaStateBehavior()->statusLabel) ."</small></div>";
                        echo "</h1>";
                    }
            ),
            array(
                'name' => 'thumbnail_media_id',
                'filter' => false,
                'value' => function ($data, $row) {
                        if ($data->thumbnailMedia instanceof P3Media) {
                            echo CHtml::link($data->thumbnailMedia->image("select2-thumb"), Yii::app()->controller->createUrl(''));
                        }
                    },
            ),
            array(
                'name' => 'slug_en',
            ),
            array(
                'name' => 'cloned_from_id',
                'value' => 'CHtml::value($data, \'chapters.itemLabel\')',
                'filter' => '', //CHtml::listData(Chapter::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'header' => '',
                'filter' => false,
                'value' => function($data,$row){
                        echo "<div class=\"btn-group\">";
                        if (!user()->isGuest) {
                            $this->widget('bootstrap.widgets.TbButton', array(
                                'label' => Yii::t('model', 'Edit'),
                                'icon' => 'icon-edit',
                                'type' => $this->action->id != 'edit' ? 'primary' : 'inverse',
                                'url' => !empty($_GET['editingUrl']) ? $_GET['editingUrl'] : array('continueAuthoring', 'id' => $data->{$data->tableSchema->primaryKey}),
                            ));
                        }
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'label' => Yii::t('model', 'View'),
                            'icon' => 'icon-eye-open',
                            'type' => $this->action->id != 'view' ? '' : 'inverse',
                            'url' => array('view', 'id' => $data->{$data->tableSchema->primaryKey}),
                        ));
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'label' => Yii::t('model', 'Go!'),
                            'icon' => 'icon-play',
                            'type' => '',
                            'url' => array('node/go', 'id' => $data->node()->id),
                            'htmlOptions' => array(
                                'target' => '_blank',
                            ),
                        ));
                        echo "</div>";
                    }
            ),
        )
    )
);
?>
<?php Yii::endProfile('Chapter.view.grid'); ?>
