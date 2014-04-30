<?php
/* @var Controller|ItemController $this */
/* @var ActiveRecord|ItemTrait $model */
/* @var AppActiveForm $form */
/* @var string $step */
/* @var string $stepCaption */
/* @var string $controllerCssClass */
?>
<?php $this->breadcrumbs[Yii::t('app', 'Gapminder Community')] = Yii::app()->homeUrl; // TODO: Get link dynamically. ?>
<?php $this->breadcrumbs[Yii::t('app', 'Dashboard')] = array('/account/dashboard'); ?>
<?php $this->breadcrumbs[] = $model->itemLabel; ?>
<div class="<?php echo $this->getCssClasses($model); ?>">
    <?php echo TbHtml::linkbutton(
        Yii::t('app', 'Preview'),
        array(
            'class' => 'preview-button',
            'url' => array(
                'preview',
                'id' => $model->{$model->tableSchema->primaryKey},
                'editingUrl' => Yii::app()->request->url,
            ),
            'visible' => Yii::app()->user->checkModelOperationAccess($model, 'Preview'),
        )
    ); ?>
    <?php $form = $this->beginWidget(
        'AppActiveForm',
        array(
            'id' => 'item-form',
            'enableAjaxValidation' => true,
            'clientOptions' => array( //'validateOnSubmit' => true,
            ),
            'htmlOptions' => array(
                'class' => 'dirtyforms',
                'enctype' => 'multipart/form-data',
            ),
        )
    ); ?>
    <input type="hidden" name="form-url" value="<?php echo CHtml::encode(Yii::app()->request->url); ?>"/>
    <div class="item-header">
        <div class="header-text">
            <h1 class="item-heading"><?php echo $model->itemLabel; ?></h1>
        </div>
    </div>
    <?php if ($this->action->id === 'translate'): ?>
        <div class="item-row">
            <div class="row-column">
                <div class="item-well">
                    <div class="item-content">
                        <div class="content-primary">
                            <h2 class="step-heading">
                                <?php echo Yii::t(
                                    'app',
                                    'Translating to {language}',
                                    array(
                                        '{language}' => $this->workflowData['translateInto'],
                                    )
                                ); ?>
                            </h2>
                        </div>
                        <div class="content-secondary">
                            <h2 class="step-heading"><?php echo $stepCaption; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php /*
    <input type="hidden" name="form-url" value="<?php echo CHtml::encode(Yii::app()->request->url); ?>"/>
    <?php $this->renderPartial('/_item/edit/_flowbar', compact('model')); ?>
    <div class="after-flowbar">
        <div class="alerts">
            <div class="alerts-content">
                <?php $this->widget('\TbAlert'); ?>
            </div>
        </div>
        <div class="item-content">
            <div class="item-progress">
                <?php foreach ($this->workflowData["stepActions"] as $action): ?>
                    <?php $this->renderPartial("/_item/edit/_progress-item", $action); ?>
                <?php endforeach; ?>
                // todo: remove if unused
                <!--
                <div class="well well-white">
                    <?php //echo $this->renderPartial('/_item/elements/actions', compact("model", "execution")); ?>
                </div>
                -->
            </div>
            <div class="item-form">
                <h2 class="form-title"><?php echo $stepCaption; ?></h2>
                <div class="form-content">
                    <?php $this->renderPartial('steps/' . $step, array(
                        'model' => $model,
                        'form' => $form,
                        'step' => $step,
                    )); ?>
                </div>
            </div>
        </div>
    </div>
    */ ?>

    <?php $this->endWidget(); ?>
    <?php // Include previously rendered content for modals. ?>
    <?php // These need to be rendered outside the <form> since they contain form elements of their own. ?>
    <?php foreach (array_reverse($this->clips->toArray(), true) as $key => $clip): // Reverse order for recursive modals to render properly ?>
        <?php if (strpos($key, "modal:") === 0): ?>
            <?php echo $clip; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
