<?php /* @var Controller $this */ ?>
<div id="frontend-navbar" class="layout-navbar">
    <?php
    Yii::import('p3pages.modules.*');

    $rootNode = P3Page::model()->findByAttributes(array('name_id' => 'Navbar'));
    $page = P3Page::getActivePage();
    if ($page !== null) {
        $translation = $page->getTranslationModel();
    } else {
        $translation = null;
    }

    $this->widget(
        '\TbNavbar',
        array(
            //'fluid' => true,
            'collapse' => true,
            'display' => TbHtml::NAVBAR_DISPLAY_FIXEDTOP,
            'items' => array(
                $this->renderBreadcrumbs(),
                array(
                    'class' => '\TbNav',
                    'items' => P3Page::getMenuItems($rootNode)
                ),
                //'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
                array(
                    'class' => '\TbNav',
                    'htmlOptions' => array('class' => 'pull-right language-menu'),
                    'items' => array(
                        array(
                            'label' => Yii::app()->language,
                            'icon' => 'globe',
                            'url' => '#',
                            'items' => Controller::getLanguageMenuItems()
                        )
                    )
                ),
                array(
                    'class' => '\TbNav',
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
</div>