<div class="view" style="overflow: hidden;">

    <?php if (!is_null($data->embed_override)): ?>

        <?php
        $markup = $data->embed_override;
        ?>

        <?php echo str_replace("{language}", Yii::app()->language, $markup); ?>

    <?php elseif (!is_null($data->tool) && !is_null($data->tool->embed_template)): ?>

    <?php
    parse_str($data->vizabi_state, $foo);
    $vizabi_state = substr(json_encode($foo), 1, -1);
    $markup = $data->tool->embed_template;
    ?>

    <?php
    $relArray = array();
    $relatedNodes = $data->outNodes;

    if (is_array($relatedNodes)) {
        foreach ($relatedNodes as $i => $relatedNode) {
            $item = $relatedNode->item();
            if (isset($item->thumbnail_media_id)) {
                $url = Yii::app()->request->baseUrl;

                $thumb_url = $url . "/p3media/file/image?preset=related-thumb&id=" . $item->thumbnail_media_id;

                $edge_title = Yii::app()->db->createCommand()
                    ->select("title")
                    ->from("edge")
                    ->where("from_node_id=$data->node_id AND to_node_id=$item->node_id")
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

    <?php $lang = str_replace("{language}", Yii::app()->language, $markup); ?>
    <?php $viz = str_replace("{vizabi_state}", $vizabi_state, $lang); ?>
    <?php echo str_replace("{related_content}", $relatedContent, $viz); ?>
</div>
<?php
else: ?>

    <div class="alert">
        <?php echo Yii::t('app', 'No markup to render'); ?>
    </div>

<?php
endif; ?>

<?php if (Yii::app()->user->checkAccess('Snapshot.*')): ?>
    <div class="admin-container hide">
        <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Snapshot'))), array('snapshot/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
    </div>
<?php endif; ?>
<?php if (Yii::app()->user->checkAccess('Developer')): ?>
    <div class="admin-container hide">
        <h3>Developer access</h3>
        <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Snapshot'))), array('snapshot/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
    </div>
<?php endif; ?>
