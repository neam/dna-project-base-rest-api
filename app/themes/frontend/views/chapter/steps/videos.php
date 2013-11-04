<div class="controls">
    <?php if ($model->video): ?>
        <ul>
            <?php foreach ($model->videos as $video): ?>
                <li>
                    <?php echo $video->title; ?>
                    <?php
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label" => Yii::t("model", "Delete relation"),
                        "url" => array("deleteEdge", "id" => $model->{$model->tableSchema->primaryKey}, "from" => $model->node()->id, "to" => $video->node()->id, "returnUrl" => Yii::app()->request->url),
                        "size" => "small",
                        "type" => "danger"
                    ));
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <div><?php echo Yii::t("model", "No videos"); ?></div>
    <?php endif; ?>
    <?php
    $this->widget("bootstrap.widgets.TbButton", array(
        "label" => Yii::t("model", "Create new video"),
        "url" => array("/videoFile/")
    ));
    ?>
</div>

<h2>Choose video to add</h2>
<?php
$allVideos = new VideoFile('search');
$this->widget(
    'bootstrap.widgets.TbExtendedGridView',
    array(
        'id' => 'videos_to_add',
        'type' => 'striped bordered',
        'dataProvider' => $allVideos->search(),
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'bulkActions' => array(
            'actionButtons' => array(),
            'checkBoxColumnConfig' => array(
                'name' => 'id'
            ),
        ),
        'columns' => array(
            array('name' => 'id', 'header' => 'Id'),
            array('name' => 'title', 'header' => 'Title'),
        )
    )
);
?>

<div class="alert alert-info">
    Hint: Lorem ipsum
</div>