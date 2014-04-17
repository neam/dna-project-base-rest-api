<?php // TODO: Refactor this view. ?>
<?php
/** @var ItemController|Controller $this */
/** @var ItemTrait|ActiveRecord $model */
?>
<?php $this->setPageTitle(
    Yii::t('model', $this->modelClass)
    . ' - '
    . Yii::t('app', 'Choose language')
); ?>
<?php $this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('browse'); ?>
<?php $this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey}); ?>
<?php $this->breadcrumbs[] = Yii::t('app', 'Choose language'); ?>
<div class="<?php echo $this->getCssClasses($model); ?>">
    <?php $this->renderPartial(
        '/_item/elements/_flowbar',
        compact('model', 'workflowCaption', 'form')
    ); ?>
    <div class="after-flowbar">
        <?php $_lang = Yii::app()->language; ?>
        <?php foreach (Yii::app()->user->getTranslatableLanguages() as $languageCode => $languageLabel): ?>
            <?php if ($languageCode === Yii::app()->sourceLanguage): ?>
                <?php continue; ?>
            <?php endif; ?>
            <?php $step = $this->firstFlowStep($model); ?>
            <?php $action = 'translate'; ?>
            <?php $options = array(
                'icon' => 'globe',
            ); ?>
            <div class="language-content">
                <div class="language-actions">
                    <?php echo TbHtml::linkButton(
                        $languageLabel,
                        array(
                            'block' => true,
                            'color' => $this->action->id === $action
                                    ? TbHtml::BUTTON_COLOR_INVERSE
                                    : TbHtml::BUTTON_COLOR_DEFAULT,
                            'size' => TbHtml::BUTTON_SIZE_SM,
                            'url' => array(
                                $action,
                                'id' => $model->{$model->tableSchema->primaryKey},
                                'step' => $step, 'translateInto' => $languageCode,
                            ),
                        )
                    ); ?>
                </div>
                <div class="language-progress">
                    <?php
                    try {
                        // todo: fix this some other way
                        $model = $model->asa('i18n-attribute-messages') !== null ? $model->edited() : $model;
                        $this->widget(
                            '\TbProgress',
                            array(
                                'color' => 'success', // 'info', 'success' or 'danger'
                                'percent' => $model->calculateValidationProgress('translate_into_' . $languageCode),
                            )
                        );
                    } catch (QaStateBehaviorNoAssociatedRulesException $e) {
                        echo Yii::t('exceptions', $e->getMessage());
                    }
                    ?>
                </div>
            </div>
        <?php endforeach; ?>
        <?php Yii::app()->language = $_lang; ?>
        <div class="alert alert-info">
            <?php print Yii::t('app', 'Hint'); ?>:
            <?php print Yii::t('app', 'Above you see the current translation progress for the current item. Choose language to help translate into above.'); ?>
        </div>
    </div>
</div>
