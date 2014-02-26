<?php
/* @var ChapterController|ItemController $this */
/* @var Chapter|ItemTrait $model */
/* @var ActiveRecord[]|ItemTrait[] $sections */
?>
<?php if (!empty($sections)): ?>
    <?php foreach ($sections as $section): ?>
        <section id="<?php echo $section['slug']; ?>">
            <div class="page-header">
                <h1><?php echo $section['title']; ?></h1>
                <?php if ($evaluate && isset($section['model'])): ?>
                    <?php $this->widget(
                        'ModalCommentsWidget',
                        array(
                            'model' => $section['model'],
                            'attribute' => 'title',
                        )
                    ); ?>
                <?php endif; ?>
            </div>
            <?php if (isset($section['subsections'])): ?>
                <?php foreach ($section['subsections'] as $subsection): ?>
                    <div class="view">
                        <h2><?php echo $subsection['title'] ?></h2>
                        <?php if ($evaluate && isset($subsection['model'])): ?>
                            <?php $this->widget(
                                'ModalCommentsWidget',
                                array(
                                    'model' => $subsection['model'],
                                    'attribute' => 'title',
                                )
                            ); ?>
                        <?php endif; ?>
                        <?php if (isset($subsection['model'])): ?>
                            <?php $this->renderPartial(
                                '/' . lcfirst(get_class($subsection['model'])) . '/_view',
                                array(
                                    'data' => $subsection['model'],
                                    'evaluate' => $evaluate,
                                )
                            ); ?>
                        <?php else: ?>
                            <?php echo $subsection['markup']; ?>
                            <?php if ($evaluate && isset($subsection['attribute'])): ?>
                                <?php $this->widget(
                                    'ModalCommentsWidget',
                                    array(
                                        'model' => $model,
                                        'attribute' => $subsection['attribute'],
                                    )
                                ); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <?php if (isset($section['model'])): ?>
                    <?php $this->renderPartial(
                        '/' . lcfirst(get_class($section['model'])) . '/_view',
                        array(
                            'data' => $section['model'],
                            'evaluate' => $evaluate,
                        )
                    ); ?>
                <?php else: ?>
                    <?php echo $section['markup']; ?>
                    <?php if ($evaluate && isset($section['attribute'])): ?>
                        <?php $this->widget(
                            'ModalCommentsWidget',
                            array(
                                'model' => $model,
                                'attribute' => $section['attribute'],
                            )
                        ); ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        </section>
    <?php endforeach; ?>
<?php else: ?>
    <div class="alert">
        <?php echo Yii::t('app', 'Chapter contains no sections'); ?>
    </div>
<?php endif; ?>
