<?php
/** @var VideoFile|ItemTrait $model */
/** @var stdClass $data */
/** @var string $translateInto */
?>
<?php echo Html::staticTextField($data->sourceMessage); ?>
<?php echo TbHtml::textArea(
    "SourceMessage[{$model->getSourceMessage($data->sourceMessage, $this->workflowData['translateInto'])->id}]",
    $model->getCurrentTranslation($data->sourceMessage, $this->workflowData['translateInto']),
    array(
        'block' => true,
    )
); ?>
