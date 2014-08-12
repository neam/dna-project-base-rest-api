<div class="site-controller index-action gapminder-friends">
    <section class="section-wide">
        <div class="gapminder-friends-logo">
            <?php echo TbHtml::image(baseUrl('/images/gapminder-friends-large.png')); ?>
        </div>
    </section>
    <section class="section-wide section-wide-gray">
        <div class="splash">
            <h2><?php echo t('app', 'building a fact-based world view together.'); ?></h2>
            <?php echo TbHtml::linkButton(
                Yii::t('app', 'Join Now'),
                array(
                    'url' => array('/account/signup'),
                    'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                    'class' => 'cta',
                )
            ); ?>
        </div>
    </section>
    <section class="section-wide">
        <div class="container">
            <h2><?php echo t('app', 'Sneak Peeks'); ?></h2>
            <p><?php echo t('app', 'Access new content under development, which is not yet publicly available. Help evaluate new videos and tools, before we publish them to the world.'); ?></p>
        </div>
    </section>
    <section class="section-wide">
        <div class="container">
            <h2><?php echo t('app', 'Groups'); ?></h2>
            <p><?php echo t('app', 'Join a group and we will give you tasks that better fit your skills.'); ?></p>
        </div>
    </section>
    <section class="section-wide section-wide-gray">
        <div class="container">
            <div class="row">
                <div class="groups-column col-xs-offset-4">
                    <h3><?php echo t('app', 'Translators'); ?></h3>
                    <div class="row">
                        <div class="group-member">
                            <div class="member-picture">
                                <img src="http://placehold.it/70x70">
                            </div>
                            <div class="member-info">
                                <span class="member-name"><?php echo 'Bodil Edvardsson'; ?></span>
                                <span class="member-title"><?php echo 'Moderator'; ?></span>
                            </div>
                        </div>
                        <div class="group-member">
                            <div class="member-picture">
                                <img src="http://placehold.it/70x70">
                            </div>
                            <div class="member-info">
                                <span class="member-name"><?php echo 'Ann Jerzi'; ?></span>
                                <span class="member-title"><?php echo 'Superstar'; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="group-column-footer">
                        <?php echo TbHtml::link(Yii::t('app', 'Help translate...'), '#'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-wide">
        <div class="container">
            <h2><?php echo t('app', 'About Gapminder Friends'); ?></h2>
            <p><?php echo t('app', 'If you like Gapminder’s mission...to fight devastating ignorance with a fact-based worldview eve- ryone can understand...then you are allready a Gapminder Friend. You just have to sign up (you can use Facebook or similar). Solve a task, (translate some text, evaluate upcoming material or simply spread the word). Voila you have become an Ignorance Fighter. Gapminder is a non for profit foundaiton, and we are thankfull for every contribution and keep track who does what to make sure your effort is recognized.'); ?>
            <p><?php echo TbHtml::link(t('app', 'Read more about Gapminder...'), '#'); ?></p>
        </div>
    </section>
</div>
