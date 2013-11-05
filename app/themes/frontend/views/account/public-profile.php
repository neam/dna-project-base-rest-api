<?php
$this->breadcrumbs[] = Yii::t('model', 'Users');
$this->breadcrumbs[] = $model->username;
$this->breadcrumbs[] = Yii::t('account', 'Profile');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo $model->profiles->first_name . " " . $model->profiles->last_name; ?>
    <small>
        <?php echo Yii::t('account', 'Profile') ?> <!--#<?php echo $model->id ?>-->
    </small>

</h1>

<?php //$this->renderPartial("_toolbar", array("model" => $model)); ?>

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

    <div class="row-fluid">
        <div class="span6">

            <div class="row-fluid">
                <div class="span12">

                    <h2>
                        <?php echo Yii::t('account', 'Photo'); ?>
                    </h2>

                    <img src="http://placehold.it/400x400" style="border: 1px solid black; width: 100%;">

                    <h2>
                        <?php echo Yii::t('account', 'About'); ?>
                    </h2>

                    <?php
                    if (empty($model->profiles->about)) {

                        ?>
                        <div class="alert alert-info">
                            <?php print Yii::t('profile', 'This user has not written anything about him/herself'); ?>
                        </div>
                    <?php

                    } else {

                        print CHtml::encode($model->profiles->about);
                    }

                    ?>

                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">

                    <h2>
                        <?php echo Yii::t('account', 'Languages'); ?>
                    </h2>

                    <?php
                    $columns = array();
                    $languages = array();
                    foreach (Yii::app()->langHandler->languages as $lang) {

                        if (!$model->profiles->attributes["can_translate_to_$lang"]) {
                            continue;
                        }

                    }

                    if (empty($languages)) {

                        ?>
                        <div class="alert alert-info">
                            <?php print Yii::t('account', 'Not supplied'); ?>
                        </div>
                    <?php

                    } else {

                        print implode(", ", $languages);
                    }

                    ?>

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
