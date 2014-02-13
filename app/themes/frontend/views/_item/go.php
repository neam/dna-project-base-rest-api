<?php
//tmp - this should be bundled with vizabi instead
//Yii::app()->bootstrap->registerPackage('select2');
?>

<?php $this->renderPartial('_view', array('data' => $model)); ?>

<?php
$relArray = array();
$relatedNodes = $model->outNodes;

if (is_array($relatedNodes)) {
    foreach ($relatedNodes as $i => $relatedNode) {
        $item = $relatedNode->item();
        if (isset($item->thumbnail_media_id)) {
            $url = Yii::app()->request->baseUrl;

            $thumb_url = $url . "/p3media/file/image?preset=related-thumb&id=" . $item->thumbnail_media_id;

            $edge = Edge::model()->findByAttributes(array("from_node_id" => $model->node_id, "to_node_id" => $item->node_id));

            $relArray[] = [
                "id" => $item->id,
                "node_id" => $item->node_id,
                "thumb_url" => $thumb_url,
                "type" => get_class($item),
                "title" => $edge->title,
            ];
        }
    }
}

$relatedContent = json_encode($relArray);

?>

    <script src="http://vizabi-dev.gapminder.org.s3.amazonaws.com/relatedPage.js"></script>
    <script>
        relatedPage('container', 'income_mountain', <?= $relatedContent; ?>);
    </script>

<?php /*
<div class="row-fluid">
    <div class="span9">
        <?php $this->renderPartial('_view', array('data' => $model)); ?>
    </div>
    <div class="span3">
        <?php if (count($model->node()->outNodes) == 0): ?>
            <?php echo Yii::t('go', 'There are no related nodes'); ?>
        <?php
        else:
            foreach ($model->node()->outNodes as $node):
                var_dump($node->attributes);
                ?>
                <?php //$this->renderPartial('_related-view', array('data' => $node->item())); ?>
            <?php
            endforeach;
        endif;
        ?>
    </div>
</div>
*/
?>