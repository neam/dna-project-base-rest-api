<?php
/** @var AccountController $this */
/** @var CSqlDataProvider $dataProvider */
/** @var array $data */
?>
<li class="tasks-list-item">
    <div class="task">
        <div class="task-thumbnail">
            <div class="thumbnail-container">
                <?php // TODO: Remove this if condition once the permission system has been implemented. ?>
                <?php $model = $this->getItemModel($data['model_class'], $data['id']); ?>
                <?php if (isset($model)): ?>
                    <?php echo $this->getItemModel($data['model_class'], $data['id'])->renderImage(); ?>
                <?php endif; ?>
            </div>
            <div class="skip-link-container">
            </div>
        </div>
        <div class="task-info">
            <div class="task-top-bar">
                <div class="task-action-text">
                    <span class="action-heading">
                        <?php echo Yii::t('app', 'Translate a {itemType}:', array('{itemType}' => $data['model_class'])); // TODO: Get action heading dynamically. ?>
                    </span>
                </div>
                <div class="task-facts">
                    <ul class="facts-list">
                        <li class="facts-list-item">
                            <?php echo Yii::t('app', '{viewCount} views', array(
                                '{viewCount}' => 0, // TODO: Get view count dynamically.
                            )); ?>
                        </li>
                        <li class="facts-list-item">
                            <?php echo Yii::t('app', 'In {languageCount} languages', array(
                                '{languageCount}' => 0, // TODO: Get language count dynamically.
                            )); ?>
                        </li>
                        <li class="facts-list-item">
                            <?php echo Yii::t('app', '+{pointCount} pts', array(
                               '{pointCount}' => 0, // TODO: Get point count dynamically.
                        )); ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="task-title">
                <h3 class="task-heading">
                    <?php echo $data['_title']; ?>
                </h3>
            </div>
            <div class="task-bottom-bar">
                <div class="task-progress">
                    <div class="progress-info">
                        <span class="progress-title">
                            <?php echo Yii::t('app', 'Progress'); // TODO: Get progress title dynamically. ?>
                        </span>
                        <span class="progress-percentage">
                            <?php echo $data['progress'] . '%'; // TODO: Get percentage dynamically. ?>
                        </span>
                    </div>
                    <div class="progress-bar-container">
                        <?php echo TbHtml::progressBar(
                            $data['progress'],
                            array(
                                'color' => TbHtml::LABEL_COLOR_SUCCESS,
                            )
                        ); ?>
                    </div>
                </div>
                <div class="task-actions">
                    <?php echo TbHtml::linkButton(
                        Yii::t('app', 'Start!'),
                        array(
                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                            'url' => $this->createActionUrl('translationOverview', $data['model_class'], $data['id']), // TODO: Get appropriate action URL dynamically.
                        )
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</li>
