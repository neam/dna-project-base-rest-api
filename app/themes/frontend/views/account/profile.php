<?php
$this->breadcrumbs[] = Yii::t('model', 'Users');
$this->breadcrumbs[$model->username] = array('account/profile', 'id' => $model->id);
$this->breadcrumbs[] = Yii::t('account', 'Profile');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo $model->profiles->first_name . " " . $model->profiles->last_name; ?>
    <small>
        <?php echo Yii::t('account', 'Profile') ?> <!--#<?php echo $model->id ?>-->
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
    <div class="success alert alert-success">
        <?php echo Yii::app()->user->getFlash('profileMessage'); ?>
    </div>
<?php endif; ?>

<style>

    div#account-profile-public-profile-toggle-grid {
        display: inline;
    }

    #account-profile-public-profile-toggle-grid .table th, .table td {
        border: 0px;
    }

    #account-profile-public-profile-toggle-grid table {
        width: 0%;
        display: inline;
    }

    .account-profile-grid .uneditable-input {
        margin-bottom: 10px;
    }

</style>
<div class="account-profile-grid">
    <div class="row">
        <div class="span12" style="line-height: 30px;">

            <div class="pull-left">
                <?php
                $relatedSearchModel = $model->profiles; //getRelatedSearchModel($model, 'profiles');
                $columns = array();
                $columns[] = array(
                    'class' => 'TbToggleColumn',
                    'checkedButtonLabel' => 'Inactivate',
                    'uncheckedButtonLabel' => 'Activate',
                    'displayText' => false,
                    'name' => 'public_profile',
                    'value' => 'CHtml::value($data,\'public_profile\')',
                    'filter' => false,
                    'toggleAction' => 'profiles/toggle'
                );
                $this->widget('TbGridView',
                    array(
                        'id' => 'account-profile-public-profile-toggle-grid',
                        'type' => TbGridView::TYPE_CONDENSED,
                        'template' => '{items}',
                        'dataProvider' => $relatedSearchModel->search(),
                        'filter' => null,
                        'enableSorting' => false,
                        'hideHeader' => true,
                        'pager' => array(
                            'class' => 'TbPager',
                            'displayFirstAndLast' => true,
                        ),
                        'columns' => $columns,
                    ));
                ?>
            </div>

            <div class="pull-left"><?php print Yii::t('account', 'Public profile'); ?></div>

            <div class="pull-left" style="margin-left: 30px;">
                <?php
                echo CHtml::link(Yii::t("model", "Show public page"), array("publicProfile", "id" => $model->{$model->tableSchema->primaryKey}));
                ?>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="span9">

            <div class="row">
                <div class="span12">

                    <?php

                    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                        'id' => 'profiles-form',
                        'enableAjaxValidation' => true,
                        'enableClientValidation' => true,
                        'type' => 'vertical',
                    ));

                    ?>

                    <h2>
                        <?php echo Yii::t('account', 'Info'); ?>

                        <?php
                        if (false) {
                            echo CHtml::submitButton(Yii::t('model', 'Save'), array(
                                'class' => 'btn btn-primary'
                            ));
                        }
                        ?>

                    </h2>

                    <?php

                    echo $form->errorSummary($model);

                    $this->renderPartial('/profiles/_elements', array(
                        'model' => $model->profiles,
                        'form' => $form,
                    ));
                    ?>

                    <?php $this->endWidget() ?>

                    <!-- Modal create-forms referenced to from create buttons (if any) -->

                    <?php
                    foreach (array_reverse($this->clips->toArray(), true) as $key => $clip) { // Reverse order for recursive modals to render properly
                        if (strpos($key, "modal:") === 0) {
                            echo $clip;
                        }
                    }
                    ?>

                </div>
            </div>

            <div class="row">
                <div class="span4">

                    <h2>
                        <?php echo Yii::t('account', 'Languages'); ?>
                    </h2>

                    <?php print Yii::t('account', 'Which languages are you able to translate into? Check all that apply.'); ?>

                    <?php
                    $relatedSearchModel = $model->profiles; //getRelatedSearchModel($model, 'profiles');
                    $columns = array();
                    foreach (Yii::app()->langHandler->languages as $lang) {
                        if ($lang == "en") {
                            continue;
                        }
                        $columns[] = array(
                            'class' => 'TbToggleColumn',
                            'checkedButtonLabel' => 'Yes',
                            'uncheckedButtonLabel' => 'No',
                            'displayText' => false,
                            'name' => 'can_translate_to_' . $lang,
                            'header' => ucfirst($lang),
                            'value' => 'CHtml::value($data,\'can_translate_to_' . $lang . '\')',
                            'filter' => false,
                            'toggleAction' => 'profiles/toggleOwn'
                        );
                    }
                    $this->widget('TbGridView',
                        array(
                            'id' => 'changeset-grid',
                            'template' => '{items}',
                            'dataProvider' => $relatedSearchModel->search(),
                            'filter' => null,
                            'enableSorting' => false,
                            'pager' => array(
                                'class' => 'TbPager',
                                'displayFirstAndLast' => true,
                            ),
                            'columns' => $columns,
                        ));
                    ?>

                </div>

                <div class="span5">

                    <h2>
                        <?php echo Yii::t('account', 'Permissions'); ?>
                    </h2>

                    <!--
                    <div class="row">
                        <div class="span12">
                            <a>Apply for new permission</a>
                        </div>
                    </div>
                    -->
                    <div class="row">
                        <div class="span4">
                            <!--<h4>Roles</h4>-->
                            <p>
                                <?php
                                $roles = array_keys(Yii::app()->authManager->getAuthItems(2, $model->id));
                                ?>

                                <?php if (empty($roles)): ?>

                            <div class="alert alert-error">
                                <?php echo Yii::t('account', 'You do not have any permissions assigned.'); ?>
                                <?php echo Yii::t('account', 'Only administrators can assign permissions.'); ?>
                                <?php //echo Yii::t('account', 'Please apply for a permission.'); ?>
                            </div>

                            <?php endif; ?>

                            <?php
                            print implode(", ", $roles);
                            ?>

                            </p>
                        </div>
                        <?php /*
                        <div class="span4">
                            <h4>Operations</h4>

                            <p>
                                <?php
                                $operations = array_keys(Yii::app()->authManager->getAuthItems(1, $model->id));
                                print implode(", ", $operations);
                                ?>
                            </p>
                        </div>
                        <div class="span4">
                            <h4>Tasks</h4>

                            <p>
                                <?php
                                $tasks = array_keys(Yii::app()->authManager->getAuthItems(0, $model->id));
                                print implode(", ", $tasks);
                                ?>
                            </p>
                        </div> */
                        ?>
                    </div>

                </div>
            </div>

        </div>
        <div class="span3">

            <h2>
                <?php echo Yii::t('account', 'Badges'); ?>
            </h2>

            TODO

        </div>
    </div>
</div>
