<?php
/* @var ChapterController|ItemController $this */
/* @var Chapter|ItemTrait $model */
/* @var ActiveRecord[]|ItemTrait[] $sections */
?>
<div class="<?php echo $this->getCssClasses($model); ?>">
    <?php // TODO: Refactor jQuery Smooth Scroll registration. ?>
    <?php $cs = Yii::app()->getClientScript(); ?>
    <?php $cs->registerCoreScript('jquery'); ?>
    <?php $smootScrollJs = Yii::app()->assetManager->publish(Yii::getPathOfAlias('vendor.kswedberg.jquery-smooth-scroll') . '/jquery.smooth-scroll.js'); ?>
    <?php $cs->registerScriptFile($smootScrollJs, CClientScript::POS_HEAD); ?>

    <?php // TODO: Refactor this inline JavaScript. ?>
    <script>
        $(function() {
            $(document).ready(function() {
                $('.bs-docs-sidebar li a').click(function(event) {
                    event.preventDefault();
                });

                // http://stackoverflow.com/questions/645202/can-i-update-window-location-hash-without-having-the-web-page-scroll
                function changeHashWithoutScrolling(hash) {
                    var id = hash.replace(/^.*#/, ''),
                        elem = document.getElementById(id);
                    elem.id = id + '-tmp';
                    window.location.hash = hash;
                    elem.id = id;
                }

                $('.bs-docs-sidebar li a').smoothScroll({
                    offset: -57,
                    afterScroll: function(e) {
                        // Necessary to do manually
                        changeHashWithoutScrolling(e.scrollTarget);
                    }
                });

                // side bar affix (disabled since G3 gs does not sport affix behavior)
                /*
                 var $window = $(window)
                 setTimeout(function() {
                 $('.bs-docs-sidenav').affix({
                 offset: {
                 top: function() {
                 return $window.width() <= 980 ? 290 : 210
                 }
                 , bottom: 270
                 }
                 })
                 }, 100);
                 */

                $('#P3WidgetContainerShowControls').click(function() {
                    $('.admin-container').toggleClass('hide show', 0);
                });
            });
        });
    </script>

    <div class="chapter-content">
        <div class="content-sidebar bs-docs-sidebar">
            <?php if (!empty($sections)): ?>
                <ul class="nav nav-list bs-docs-sidenav affix">
                    <?php foreach ($sections as $i => $section): ?>
                        <?php echo CHtml::openTag('li', array('class' => $i == 0 ? 'active' : null)); ?>
                        <?php echo CHtml::link('<i class="glyphicon-chevron-right"></i> ' . $section['menu_label'], '#' . $section['slug']); ?>
                        <?php echo CHtml::closeTag('li'); ?>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <?php echo Yii::t('app', 'Chapter contains no sections'); ?>
            <?php endif; ?>
        </div>
        <div class="content-details">
            <?php $this->renderPartial('/_item/elements/flowbar', compact('model', 'workflowCaption')); ?>
            <div class="after-flowbar">
                <?php if (Yii::app()->user->checkAccess('Chapter.*')): ?>
                    <div class="admin-container hide">
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <?php $this->widget(
                                    '\TbButton',
                                    array(
                                        'label' => Yii::t('model', 'Manage'),
                                        'icon' => 'glyphicon-edit',
                                        'url' => array('admin'),
                                    )
                                ); ?>
                                <?php $this->widget(
                                    '\TbButton',
                                    array(
                                        'label' => Yii::t('model', 'Edit'),
                                        'icon' => 'glyphicon-edit',
                                        'url' => array(
                                            'continueAuthoring',
                                            'id' => $model->{$model->tableSchema->primaryKey},
                                        ),
                                    )
                                ); ?>
                                <?php $this->widget(
                                    '\TbButton',
                                    array(
                                        'label' => Yii::t('model', 'Update'),
                                        'icon' => 'glyphicon-edit',
                                        'url' => array(
                                            'update',
                                            'id' => $model->{$model->tableSchema->primaryKey},
                                        ),
                                    )
                                ); ?>
                                <?php $this->widget(
                                    '\TbButton',
                                    array(
                                        'label' => Yii::t('model', 'Delete'),
                                        'color' => 'danger',
                                        'icon' => 'glyphicon-remove icon-white',
                                        'htmlOptions' => array(
                                            'submit' => array(
                                                'delete',
                                                'id' => $model->{$model->tableSchema->primaryKey},
                                                'returnUrl' => request()->getParam('returnUrl')
                                                        ? request()->getParam('returnUrl')
                                                        : $this->createUrl('admin')),
                                            'confirm' => Yii::t('model', 'Do you want to delete this item?'),
                                        ),
                                    )
                                ); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php $this->renderPartial(
                    '_sections',
                    array(
                        'model' => $model,
                        'sections' => $sections,
                    )
                ); ?>
            </div>
        </div>
    </div>
</div>
