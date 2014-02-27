<?php
/* @var HtmlChunkController|ItemController $this */
/* @var HtmlChunk|ItemTrait $data */
?>
<div class="view well well-white">
    <?php echo $data->markup; ?>
    <?php if (Yii::app()->user->checkAccess('HtmlChunk.*')): ?>
        <div class="admin-container hide">
            <?php echo TbHtml::link(
                '<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Html Chunk'))),
                array('htmlChunk/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')
            ); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('Developer')): ?>
        <div class="admin-container hide">
            <h3><?php echo Yii::t('app', 'Developer access'); ?></h3>
            <?php echo TbHtml::link(
                '<i class="glyphicon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Html Chunk'))),
                array('htmlChunk/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')
            ); ?>
        </div>
    <?php endif; ?>
</div>
