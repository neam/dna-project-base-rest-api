<div class="row">
    <div class="span9">
        <?php $this->renderPartial('_view', array('data' => $model)); ?>
    </div>
    <div class="span3">
        <?php

        foreach ($model->ensureNode()->edges as $edge) {
            var_dump($edge->attributes);
        }

        ?>
    </div>
</div>


