<?php
Yii::import('p3admin.P3AdminModule');
Yii::import('p3pages.modules.*');

$page = P3Page::getActivePage();
if ($page !== null) {
    $translation = $page->getTranslationModel();
} else {
    $translation = null;
}

#echo CHtml::image('https://github.com/phundament/app/wiki/images/logo_phundament3.png');
$module = new P3AdminModule('p3admin', null);
$controllerItems = array();
foreach ($module->findApplicationControllers() as $name) {
    if ($name == "site") {
        continue;
    }
    $controllerItems[] = array(
        'label' => Yii::t('app', ucfirst($name)),
        'icon' => 'list-alt',
        'url' => array('/' . $name),
        'visible' => Yii::app()->user->checkAccess(ucfirst($name) . '.*')
    );
}

$this->widget(
    'TbMenu',
    array(
        'type' => 'list',
        'items' => array_merge(
            array(
                array('label' => ucfirst(Yii::app()->user->name), 'visible' => !Yii::app()->user->isGuest),
                array(
                    'label' => Yii::t('app', 'Dashboard'),
                    'icon' => 'th-large',
                    'url' => array('/user/dashboard'),
                    'visible' => !Yii::app()->user->isGuest
                ),
                array(
                    'label' => Yii::t('app', 'Translations'),
                    'icon' => 'globe',
                    'url' => array('/user/translations'),
                    'visible' => !Yii::app()->user->isGuest
                ),
                array(
                    'label' => Yii::t('app', 'Profile'),
                    'icon' => 'user',
                    'url' => array('/user/profile'),
                    'visible' => !Yii::app()->user->isGuest
                ),
                array(
                    'label' => Yii::t('app', 'History'),
                    'icon' => 'time',
                    'url' => array('/user/history'),
                    'visible' => !Yii::app()->user->isGuest
                ),
                array('label' => Yii::t('app', 'Contents')),
            ),
            $controllerItems,
            array(
                /*
                array(
                    'label' => Yii::t('app', 'Dashboard'),
                    'icon' => 'list-alt',
                    'url' => array('/p3admin/default/index'),
                    'visible' => Yii::app()->user->checkAccess('Editor')
                ),
                */
                /*
                '---',
                array('label' => Yii::t('app', 'Pages')),
                array(
                    'label' => Yii::t('app', 'Sitemap'),
                    'icon' => 'list',
                    'url' => array('/p3pages/default/index'),
                    'visible' => Yii::app()->user->checkAccess('P3pages.Default.*')
                ),
                */
                array('label' => Yii::t('app', 'Media')),
                array(
                    'label' => Yii::t('app', 'Browser'),
                    'icon' => 'th',
                    'url' => array('/p3media/default/browser'),
                    'visible' => Yii::app()->user->checkAccess('P3media.Default.*')
                ),
                array(
                    'label' => Yii::t('app', 'Upload'),
                    'icon' => 'upload',
                    'url' => array('/p3media/import/upload'),
                    'visible' => Yii::app()->user->checkAccess('P3media.Import.*')
                ),
                array(
                    'label' => Yii::t('app', 'Local File Scan'),
                    'icon' => 'circle-arrow-up',
                    'url' => array('/p3media/import/scan'),
                    'visible' => Yii::app()->user->checkAccess('P3media.Import.*')
                ),
                /*
                array('label' => Yii::t('app', 'Widgets')),
                array(
                    'label' => Yii::t('app', 'Registry'),
                    'icon' => 'list-alt',
                    'url' => array('/p3widgets/default/index'),
                    'visible' => Yii::app()->user->checkAccess('P3widgets.Default.*')
                ),
                */
                '---',
                array('label' => Yii::t('app', 'Users')),
                array(
                    'label' => Yii::t('app', 'Accounts'),
                    'icon' => 'user',
                    'url' => array('/user/admin/admin'),
                    'visible' => Yii::app()->user->checkAccess('Admin')
                ),
                array('label' => Yii::t('app', 'Rights')),
                array(
                    'label' => Yii::t('app', 'Assignments'),
                    'icon' => 'briefcase',
                    'url' => array('/rights/assignment/view'),
                    'visible' => Yii::app()->user->checkAccess('Admin')
                ),
                array(
                    'label' => Yii::t('app', 'Permissions'),
                    'icon' => 'certificate',
                    'url' => array('/rights/authItem/permissions'),
                    'visible' => Yii::app()->user->checkAccess('Admin')
                ),
                array(
                    'label' => Yii::t('app', 'Roles'),
                    'icon' => 'star',
                    'url' => array('/rights/authItem/roles'),
                    'visible' => Yii::app()->user->checkAccess('Admin')
                ),
                '---',
                array('label' => Yii::t('app', 'Developer')),
                array(
                    'label' => Yii::t('app', 'Overview'),
                    'icon' => 'cog',
                    'url' => array('/p3admin/default/overview'),
                    'visible' => Yii::app()->user->checkAccess('Admin')
                ),
            )
        )
    )
);
?>