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

            $edge_title = Yii::app()->db->createCommand()
                ->select("title")
                ->from("edge")
                ->where("from_node_id=$model->node_id AND to_node_id=$item->node_id")
                ->queryRow();

            $relArray[] = [
                "id" => $item->id,
                "node_id" => $item->node_id,
                "thumb_url" => $thumb_url,
                "type" => get_class($item),
                "title" => $edge_title['title']
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
