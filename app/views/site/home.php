<div class="site-controller index-action gapminder-friends">
    <section class="section-wide-primary">
        <div class="gapminder-friends-logo">
            <?php echo TbHtml::image(baseUrl('/images/gapminder-friends-large.png')); ?>
        </div>
    </section>
    <section class="section-wide-secondary">
        <div class="splash">
            <h2><?php echo t('app', 'building a fact-based world view together'); ?></h2>
            <?php echo TbHtml::linkButton(
                Yii::t('app', 'Join now'),
                array(
                    'url' => array('/account/signup'),
                    'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                    'class' => 'cta',
                )
            ); ?>
        </div>
    </section>
    <section class="section-wide-primary">
        <div class="container">
            <h2><?php echo t('app', 'Sneak Peeks'); ?></h2>
            <p><?php echo t('app', 'Access new content under development, which is not yet publicly available. Help evaluate new videos and tools before we publish them to the world.'); ?></p>
        </div>
    </section>
    <section class="section-wide-primary">
        <div class="container">
            <h2><?php echo t('app', 'Groups'); ?></h2>
            <p><?php echo t('app', 'Join a group and we will give you tasks that better fit your skills.'); ?></p>
        </div>
    </section>
    <section class="section-wide-secondary">
        <div class="container">
            <?php $this->widget('app.widgets.LandingPageGroups', array(
                'groups' => array(
                    'Translators' => array(
                        'title' => Yii::t('app', 'Translators'),
                        'link' => array(
                            'text' => Yii::t('app', 'Help translate...'),
                        )
                    ),
                    'Developers' => array(
                        'title' => Yii::t('app', 'Developers'),
                        'link' => array(
                            'text' => Yii::t('app', 'Develop free software...'),
                        )
                    ),
                )
            )); ?>
        </div>
    </section>
    <section class="section-wide-primary">
        <div class="container">
            <h2><?php echo t('app', 'About Gapminder Friends'); ?></h2>
            <p><?php echo t('app', 'If you like Gapminder’s mission&mdash;<em>to fight devastating ignorance with a fact-based worldview that everyone can understand</em>&mdash;you are already a Gapminder Friend. You will just have to sign up (you can use Facebook or similar); solve a task (translate some text, evaluate upcoming material, or simply spread the word); and voilà, you have become an Ignorance Fighter. Gapminder is a non-profit foundation, and we are thankful for every contribution, and keep track who does what to make sure your effort is recognized.'); ?>
            <p><?php echo app()->renderPageLink(t('app', 'Read more about Gapminder...'), 'about'); ?></p>
        </div>
    </section>
</div>
