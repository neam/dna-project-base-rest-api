<?php

class ModelCommentsWidget extends CWidget
{
    public $model;
    public $attribute;

    function run()
    {

        $modalId = get_class($this->model) . "-" . $this->attribute . "-" . uniqid();

        echo $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'label' => Yii::t('app', 'Comments'),
                'icon' => 'icon-plus',
                'htmlOptions' => array(
                    'data-toggle' => 'modal',
                    'data-target' => '#' . $modalId,
                ),
            ),
            true
        );

        $this->beginWidget('bootstrap.widgets.TbModal', array('id' => $modalId));
        ?>

        <div class="modal-header">
            <button type="button" class="close" data-toggle="modal"
                    data-target="#<?php echo $modalId; ?>">×
            </button>
            <h3><?php echo Yii::t('model', 'Create {model}', array('{model}' => Yii::t('model', 'Tool'))); ?></h3>
        </div>
        <div class="modal-body">

            <div id="<?php echo $modalId; ?>-commentSection"> test test</div>
            <?php Html::initJqueryComments("#$modalId-commentSection", array("context_model" => get_class($this->model), "context_id" => $this->model->id, "context_field" => "about")); ?>

            <?php
            ?>

        </div>
        <div class="modal-footer">

            <a href="#" class="btn" data-toggle="modal" data-target="#<?php echo $modalId; ?>">Cancel</a>
            <?php
            ?>

        </div>

        <?php
        $this->endWidget(); // modal

    }

    private function getMediaModel()
    {
        $model = P3Media::model()->findByPk($this->model->{$this->attribute});
        return $model;
    }
}
