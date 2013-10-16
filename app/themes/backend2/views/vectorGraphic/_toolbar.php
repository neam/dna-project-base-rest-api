<div class="btn-toolbar">
    <div class="btn-group">
        <?php
        switch ($this->action->id) {
            case "create":
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Manage"),
                    "icon" => "icon-list-alt",
                    "url" => array("admin")
                ));
                break;
            case "admin":
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Create"),
                    "icon" => "icon-plus",
                    "url" => array("create")
                ));
                break;
            case "view":
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Manage"),
                    "icon" => "icon-list-alt",
                    "url" => array("admin")
                ));
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Update"),
                    "icon" => "icon-edit",
                    "url" => array("update", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Create"),
                    "icon" => "icon-plus",
                    "url" => array("create")
                ));
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Delete"),
                    "type" => "danger",
                    "icon" => "icon-remove icon-white",
                    "htmlOptions" => array(
                        "submit" => array("delete", "id" => $model->{$model->tableSchema->primaryKey}, "returnUrl" => (Yii::app()->request->getParam("returnUrl")) ? Yii::app()->request->getParam("returnUrl") : $this->createUrl("admin")),
                        "confirm" => Yii::t("model", "Do you want to delete this item?"))
                ));
                break;
            case "update":
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Manage"),
                    "icon" => "icon-list-alt",
                    "url" => array("admin")
                ));
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "View"),
                    "icon" => "icon-eye-open",
                    "url" => array("view", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                $this->widget("bootstrap.widgets.TbButton", array(
                    "label" => Yii::t("model", "Delete"),
                    "type" => "danger",
                    "icon" => "icon-remove icon-white",
                    "htmlOptions" => array(
                        "submit" => array("delete", "id" => $model->{$model->tableSchema->primaryKey}, "returnUrl" => (Yii::app()->request->getParam("returnUrl")) ? Yii::app()->request->getParam("returnUrl") : $this->createUrl("admin")),
                        "confirm" => Yii::t("model", "Do you want to delete this item?"))
                ));
                break;
        }
        ?>    </div>
    <?php if ($this->action->id == 'admin'): ?>
        <div class="btn-group">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => Yii::t('model', 'Search'),
                'icon' => 'icon-search',
                'htmlOptions' => array('class' => 'search-button')
            ));?>
        </div>


        <div class="btn-group">
            <?php
            $this->widget('bootstrap.widgets.TbButtonGroup', array(
                'buttons' => array(
                    array(
                        'label' => Yii::t('model', 'Relations'),
                        'icon' => 'icon-search',
                        'items' => array(array('label' => 'dataChunks - DataChunk', 'url' => array('//dataChunk/admin')), array('label' => 'authoringWorkflowExecutionIdDe - EzcExecution', 'url' => array('//ezcExecution/admin')), array('label' => 'authoringWorkflowExecutionIdEn - EzcExecution', 'url' => array('//ezcExecution/admin')), array('label' => 'authoringWorkflowExecutionIdCn - EzcExecution', 'url' => array('//ezcExecution/admin')), array('label' => 'authoringWorkflowExecutionIdEs - EzcExecution', 'url' => array('//ezcExecution/admin')), array('label' => 'authoringWorkflowExecutionIdFa - EzcExecution', 'url' => array('//ezcExecution/admin')), array('label' => 'authoringWorkflowExecutionIdHi - EzcExecution', 'url' => array('//ezcExecution/admin')), array('label' => 'authoringWorkflowExecutionIdPt - EzcExecution', 'url' => array('//ezcExecution/admin')), array('label' => 'authoringWorkflowExecutionIdSv - EzcExecution', 'url' => array('//ezcExecution/admin')), array('label' => 'node - Node', 'url' => array('//node/admin')), array('label' => 'originalMedia - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdEn - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdCn - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdDe - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdEs - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdFa - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdHi - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdPt - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'processedMediaIdSv - P3Media', 'url' => array('//p3Media/admin')), array('label' => 'clonedFrom - VectorGraphic', 'url' => array('//vectorGraphic/admin')), array('label' => 'vectorGraphics - VectorGraphic', 'url' => array('//vectorGraphic/admin'))
                        )
                    ),
                ),
            ));
            ?>        </div>


    <?php endif; ?></div>

<?php if ($this->action->id == 'admin'): ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div>
<?php endif; ?>