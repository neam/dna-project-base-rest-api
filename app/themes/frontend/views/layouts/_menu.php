<?php
Yii::import('p3pages.modules.*');

$rootNode = P3Page::model()->findByAttributes(array('nameId' => 'Navbar'));
$page = P3Page::getActivePage();
if ($page !== null) {
    $translation = $page->getTranslationModel();
} else {
    $translation = null;
}

$this->widget(
    'TbNavbar',
    array(
        //'fluid' => true,
        'collapse' => true,
        'fixed' => 'top',
        'items' => array(
            array(
                'class' => 'TbMenu',
                'items' => P3Page::getMenuItems($rootNode)
            ),
            //'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
            array(
                'class' => 'TbMenu',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                    array(
                        'label' => Yii::app()->language,
                        'icon' => 'globe',
                        'url' => '#',
                        'items' => array(
                            array('label' => Yii::t('app', 'Languages')),
                            array(
                                'label' => 'English',
                                'url' => array_merge(array(''), $_GET, array('lang' => 'en_us'))
                            ),
                            array(
                                'label' => 'Hindi',
                                'url' => array_merge(array(''), $_GET, array('lang' => 'hi_in'))
                            ),
                            array(
                                'label' => 'Persian',
                                'url' => array_merge(array(''), $_GET, array('lang' => 'fa_ir'))
                            ),
                            array(
                                'label' => 'Svenska',
                                'url' => array_merge(array(''), $_GET, array('lang' => 'sv_se'))
                            ),
                            array(
                                'label' => 'Português',
                                'url' => array_merge(array(''), $_GET, array('lang' => 'pt_pt'))
                            ),
                            array(
                                'label' => 'Castellano/Español',
                                'url' => array_merge(array(''), $_GET, array('lang' => 'es_es'))
                            ),
                            array(
                                'label' => 'Chinese',
                                'url' => array_merge(array(''), $_GET, array('lang' => 'cn'))
                            ),
                            array(
                                'label' => 'Deutsch',
                                'url' => array_merge(array(''), $_GET, array('lang' => 'de'))
                            ),
                        ),
                    )
                )
            ),
            array(
                'class' => 'TbMenu',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                    array(
                        'label' => ucfirst(Yii::app()->user->name),
                        'visible' => !Yii::app()->user->isGuest,
                        'icon' => Yii::app()->user->checkAccess('Superuser') ?
                            'warning-sign' :
                            'user',
                        'items' => array(
                            array('label' => Yii::t('app', 'User')),
                            array(
                                'label' => Yii::t('app', 'Dashboard'),
                                'icon' => 'th-large',
                                'url' => array('/account/dashboard'),
                                'visible' => !Yii::app()->user->isGuest
                            ),
                            array(
                                'label' => Yii::t('app', 'Translations'),
                                'icon' => 'globe',
                                'url' => array('/account/translations'),
                                'visible' => !Yii::app()->user->isGuest
                            ),
                            array(
                                'label' => Yii::t('app', 'Profile'),
                                'icon' => 'user',
                                'url' => array('/account/profile'),
                                'visible' => !Yii::app()->user->isGuest
                            ),
                            array(
                                'label' => Yii::t('app', 'History'),
                                'icon' => 'time',
                                'url' => array('/account/history'),
                                'visible' => !Yii::app()->user->isGuest
                            ),
                            array(
                                'label' => Yii::t('app', 'List'),
                                'icon' => 'list',
                                'url' => array('/user'),
                                'visible' => Yii::app()->user->checkAccess('Superuser')
                            ),
                            '---',
                            array(
                                'label' => Yii::t('app', 'Logout'),
                                'icon' => 'lock',
                                'url' => array('/site/logout'),
                                'visible' => !Yii::app()->user->isGuest
                            ),
                        )
                    ),
                    array(
                        'label' => Yii::t('app', 'Login'),
                        'url' => Yii::app()->user->loginUrl,
                        'visible' => Yii::app()->user->isGuest,
                        'icon' => 'lock'
                    ),
                ),
            ),
        )
    )
);
?>