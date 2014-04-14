<?php /* @var Controller $this */ ?>
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
            'brandLabel' => TbHtml::image(Yii::app()->baseUrl . '/images/logo.png'),
            'collapse' => true,
            'display' => TbHtml::NAVBAR_DISPLAY_FIXEDTOP,
            'items' => array(
                array(
                    'class' => '\TbNav',
                    'items' => P3Page::getMenuItems($rootNode)
                ),
                array(
                    'class' => '\TbNav',
                    'htmlOptions' => array(),
                    'items' => array(
                        array(
                            'label' => Yii::t('app', 'Dashboard'),
                            'icon' => TbHtml::ICON_TH,
                            'url' => array('/account/dashboard'),
                            'visible' => !Yii::app()->user->isGuest,
                        ),
                    ),
                ),
                //'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
                array(
                    'class' => '\TbNav',
                    'htmlOptions' => array('class' => 'pull-right'),
                    'items' => array(
                        array(
                            'class' => '\TbNav',
                            'icon' => TbHtml::ICON_GLOBE,
                            'label' => Yii::app()->language,
                            'htmlOptions' => array('class' => 'language-menu'),
                            'items' => Controller::getLanguageMenuItems(),
                        ),
                        array(
                            'label' => ucfirst(Yii::app()->user->name),
                            'visible' => !Yii::app()->user->isGuest,
                            'icon' => Yii::app()->user->checkAccess('Super Administrator') ? TbHtml::ICON_TOWER : TbHtml::ICON_USER,
                            'id' => 'accountMenuLink',
                            'items' => array(
                                array(
                                    'label' => Yii::t('app', 'User'),
                                ),
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
                                    'url' => array('/account/admin'),
                                    'visible' => Yii::app()->user->checkAccess('Superuser')
                                ),
                                '---',
                                array(
                                    'label' => Yii::t('app', 'Logout'),
                                    'icon' => 'lock',
                                    'url' => array('/site/logout'),
                                    'visible' => !Yii::app()->user->isGuest,
                                    'id' => 'logoutLink',
                                ),
                            )
                        ),
                        array(
                            'label' => Yii::t('app', 'Login'),
                            'url' => Yii::app()->user->loginUrl,
                            'visible' => Yii::app()->user->isGuest,
                            'icon' => 'lock',
                            'id' => 'loginLink',
                        ),
                    ),
                ),
            )
        )
    );
    ?>