<?php
/** @var $model Account */

$this->breadcrumbs[] = Yii::t('model', 'Users');
$this->breadcrumbs[$model->username] = array('account/profile', 'id' => $model->id);
$this->breadcrumbs[] = Yii::t('account', 'Public profile');
?>

<h1>
    <?php echo $model->profiles->first_name . " " . $model->profiles->last_name; ?>
    <small><?php echo Yii::t('account', 'Public profile') ?> <!--#<?php echo $model->id ?>--></small>
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
                    <h2><?php echo Yii::t('account', 'Photo'); ?></h2>
                    <img src="http://placehold.it/400x400" style="border: 1px solid black; width: 100%;">

                    <h2><?php echo Yii::t('account', 'About'); ?></h2>
                    <?php if (empty($model->profiles->about)): ?>
                        <div class="alert alert-info">
                            <?php print Yii::t('profile', 'This user has not written anything about him/herself'); ?>
                        </div>
                    <?php else: ?>
                        <?php print CHtml::encode($model->profiles->about); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <h2><?php echo Yii::t('account', 'Languages'); ?></h2>
                    <?php $languages = $model->profiles->getLanguages(true); ?>
                    <?php if (!empty($languages)): ?>
                        <?php echo $languages; ?>
                    <?php else: ?>
                        <div class="alert alert-info">
                            <?php print Yii::t('account', 'Not supplied'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="span3">
            <!--<h2><?php /*echo Yii::t('account', 'Badges'); */?></h2>-->
        </div>
    </div>
</div>
