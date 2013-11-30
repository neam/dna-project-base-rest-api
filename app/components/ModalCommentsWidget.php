<?php

class ModalCommentsWidget extends CWidget
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
                'icon' => 'icon-comment',
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
            <h3><?php echo Yii::t('app', 'Comments on field') . ": " . $this->model->getAttributeLabel($this->attribute) . " (" . Yii::t('app', $this->model->getModelLabel(), 1) . ")"; ?></h3>
        </div>
        <div class="modal-body">

            <div id="<?php echo $modalId; ?>-commentSection"></div>
            <?php Html::initJqueryComments("#$modalId-commentSection", array("context_model" => get_class($this->model), "context_id" => $this->model->id, "context_attribute" => $this->attribute)); ?>

            <?php
            ?>

        </div>
        <div class="modal-footer">

            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $modalId; ?>">Close</a>
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
