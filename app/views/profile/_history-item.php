<?php
/** @var Item $data */
?>
<div class="tasks-list-item">
    <div class="task">
        <div class="task-thumbnail">
            <div class="thumbnail-container">
                <?php echo $data->model->renderImage(); ?>
            </div>
        </div>
        <div class="task-info">
            <div class="task-top-bar">
                <div class="task-action-text">
                    <span class="action-heading">
                        <?php echo Yii::t(
                            'app',
                            '{action} {separator} <span class="action-item-type">{itemType}</span> {tooltip}',
                            array(
                                '{action}' => Yii::t('app', 'Translate'), // TODO: Get action dynamically (e.g. 'translate')
                                '{itemType}' => $data['model_class'],
                                '{separator}' => TbHtml::icon(TbHtml::ICON_CHEVRON_RIGHT, array('class' => 'action-separator')),
                                '{tooltip}' => Html::hintTooltip(
                                    $data->model->itemDescription,
                                    array('placement' => TbHtml::TOOLTIP_PLACEMENT_BOTTOM)
                                ),
                            )
                        ); ?>
                    </span>
                </div>
            </div>
            <div class="task-title">
                <h3 class="task-heading"><?php echo $data->_title; ?></h3>
            </div>
            <div class="task-bottom-bar">
                <div class="task-progress"></div>
                <div class="task-actions">
                    <?php /*
                    <?php echo TbHtml::linkButton(
                        Yii::t('app', 'Continue Translating'),
                        array(
                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                            'url' => array('/'),
                        )
                    ); ?>
                    */ ?>
                </div>
            </div>
        </div>
        <?php //dump($data->attributes); ?>
    </div>
</div>