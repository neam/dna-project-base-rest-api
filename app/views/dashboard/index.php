<div class="dashboard-controller index-action gapminder-friends">
    <section class="section-wide-primary">
        <div class="gapminder-friends-logo">
            <?php echo TbHtml::image(baseUrl('/images/gapminder-friends-large.png')); ?>
        </div>
    </section>
    <section class="section-wide-primary">
        <div class="splash">
            <h2><?php echo Yii::t('app', 'building a fact-based world view together'); ?></h2>
        </div>
    </section>
    <section class="section-wide-secondary">
        <div class="container">
            <div class="column-narrow">
                <div class="wide-profile">
                    <div class="profile-picture">
                        <?php echo user()->renderPicture('wide-profile-info-picture'); ?>
                    </div>
                    <div class="profile-info">
                        <span class="info-heading"><?php echo user()->getFullName(); ?></span>
                        <p><?php echo Yii::t('app', 'We would like to suggest new tasks for you.'); ?></p>
                        <?php echo TbHtml::linkButton(
                            Yii::t('app', 'My Tasks'),
                            array(
                                'url' => array('/dashboard/tasks'),
                                'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                'size' => TbHtml::BUTTON_SIZE_SM,
                            )
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-wide-primary section-wide-border-bottom">
        <div class="container">
            <ul class="friends-menu">
                <li><?php echo TbHtml::link(Yii::t('app', 'News')); ?></li>
                <li><?php echo TbHtml::link(Yii::t('app', 'Sneak Peeks')); ?></li>
                <li><?php echo TbHtml::link(Yii::t('app', 'Members')); ?></li>
                <li><?php echo TbHtml::link(Yii::t('app', 'About')); ?></li>
            </ul>
        </div>
    </section>
    <?php /* TODO: Uncomment this section when news articles have been implemented.
    <section class="section-wide-primary">
        <div class="container">
            <h2><?php echo Yii::t('app', 'News'); ?></h2>
            <ul class="news-list">
                <li>
                    <div class="news-item">
                        <span class="item-title"><?php echo TbHtml::link('Three New Sneak Peeks Available', '#'); ?></span>
                        <span class="item-date">June 7</span>
                    </div>
                </li>
                <li>
                    <div class="news-item">
                        <span class="item-title"><?php echo TbHtml::link('New Video on IQ-centricity', '#'); ?></span>
                        <span class="item-date">June 5</span>
                    </div>
                </li>
                <li>
                    <div class="news-item">
                        <span class="item-title"><?php echo TbHtml::link('Foo bar baz', '#'); ?></span>
                        <span class="item-date">June 3</span>
                    </div>
                </li>
            </ul>
            <div class="view-all">
                <?php echo TbHtml::link(
                    Yii::t('app', 'More News...'),
                    array(
                        'color' => TbHtml::BUTTON_COLOR_LINK,
                        'size' => TbHtml::BUTTON_SIZE_SM,
                        'url' => '#',
                    )
                ); ?>
            </div>
        </div>
    </section>
    */ ?>
    <section class="section-wide-primary">
        <div class="container">
            <h2><?php echo Yii::t('app', 'Sneak Peeks'); ?></h2>
            <p><?php echo Yii::t('app', '<strong>Please don’t share!</strong> Sneak Peaks show new content under development which is not yet publicly available. Please evaluate it, but refrain from prematurely spreading it publicly.'); ?></p>
        </div>
    </section>
    <section class="section-wide-secondary">
        <div class="container">
            <ul class="sneak-peeks">
                <li class="sneak-peek">
                    <div class="sneak-peek-thumbnail">
                        <img src="http://placehold.it/110x70">
                    </div>
                    <div class="sneak-peek-info">
                        <span class="info-item-type">Video</span>
                        <span class="info-title">How Large Is the Gap Between the Rich and the Poor</span>
                        <span class="info-meta">VERSION 1, June 2, 2014</span>
                    </div>
                    <div class="sneak-peek-actions">
                        <?php echo TbHtml::linkButton(
                            Yii::t('app', 'Translate'),
                            array(
                                'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                'block' => true,
                                'size' => TbHtml::BUTTON_SIZE_SM,
                            )
                        ); ?>
                    </div>
                </li>
                <li class="sneak-peek">
                    <div class="sneak-peek-thumbnail">
                        <img src="http://placehold.it/110x70">
                    </div>
                    <div class="sneak-peek-info">
                        <span class="info-item-type">Tool</span>
                        <span class="info-title">Income Mountains</span>
                        <span class="info-meta">VERSION 2, June 4, 2014</span>
                    </div>
                    <div class="sneak-peek-actions">
                        <?php echo TbHtml::linkButton(
                            Yii::t('app', 'Evaluate'),
                            array(
                                'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                'block' => true,
                                'size' => TbHtml::BUTTON_SIZE_SM,
                            )
                        ); ?>
                    </div>
                </li>
                <li class="sneak-peek">
                    <div class="sneak-peek-thumbnail">
                        <img src="http://placehold.it/110x70">
                    </div>
                    <div class="sneak-peek-info">
                        <span class="info-item-type">Video</span>
                        <span class="info-title">Is There a Correlation Between Income and Lifespan</span>
                        <span class="info-meta">VERSION 7, June 2, 2014</span>
                    </div>
                    <div class="sneak-peek-actions">
                        <?php echo TbHtml::linkButton(
                            Yii::t('app', 'Evaluate'),
                            array(
                                'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                'block' => true,
                                'size' => TbHtml::BUTTON_SIZE_SM,
                            )
                        ); ?>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="section-wide-primary section-wide-condensed section-wide-border-bottom">
        <div class="container">
            <div class="view-all">
                <?php echo TbHtml::link(
                    Yii::t('app', 'All Sneak Peeks'),
                    array(
                        'color' => TbHtml::BUTTON_COLOR_LINK,
                        'size' => TbHtml::BUTTON_SIZE_SM,
                        'url' => '#',
                    )
                ); ?>
            </div>
        </div>
    </section>
    <section class="section-wide-primary">
        <div class="container">
            <h2><?php echo Yii::t('app', 'Members'); ?></h2>
            <h3 class="no-margin-bottom"><?php echo Yii::t('app', 'Find Members'); ?></h3>
        </div>
    </section>
    <section class="section-wide-secondary">
        <div class="container">
            <div class="member-search">
                <div class="search-field">
                    <?php echo TbHtml::textField(
                        'search',
                        '',
                        array(
                            'class' => 'form-control-condensed',
                            'placeholder' => Yii::t('app', 'Search'),
                        )
                    ); ?>
                </div>
                <div class="search-button">
                    <?php echo TbHtml::submitButton(
                        Yii::t('app', TbHtml::icon(TbHtml::ICON_SEARCH)),
                        array(
                            'class' => 'btn-condensed',
                        )
                    ); ?>
                </div>
                <div class="search-filters">
                    <?php echo TbHtml::dropDownList(
                        'filters',
                        '',
                        array('Filters', 'Foo', 'Bar', 'Baz'),
                        array(
                            'class' => 'form-control-condensed',
                        )
                    ); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-wide-primary section-wide-condensed">
        <div class="container">
            <div class="view-all">
                <?php echo TbHtml::link(
                    Yii::t('app', 'Members'),
                    array(
                        'color' => TbHtml::BUTTON_COLOR_LINK,
                        'size' => TbHtml::BUTTON_SIZE_SM,
                        'url' => '#',
                    )
                ); ?>
            </div>
        </div>
    </section>
    <section class="section-wide-primary">
        <div class="container">
            <h3><?php echo Yii::t('app', 'Groups'); ?></h3>
            <p><?php echo Yii::t('app', 'Join a group and we will assign you with tasks that better suit your skills.'); ?></p>
        </div>
    </section>
</div>
