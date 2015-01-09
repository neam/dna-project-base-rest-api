<?php

class SitemapCommand extends CConsoleCommand
{
    const PATH_PAGES_DESKTOP = '../../sitemap/pages-desktop.xml';
    const PATH_PAGES_MOBILE = '../../sitemap/pages-mobile.xml';
    const PATH_PROFILES = '../../sitemap/profiles.xml';

    public function actionGenerateAll()
    {
        $this->actionGeneratePagesDesktop();
        $this->actionGeneratePagesMobile();
        $this->actionGenerateProfiles();
    }

    public function actionGeneratePagesDesktop()
    {
        $document = new SitemapDocument('1.0', 'UTF-8');
        $items = array(); // todo: get all items to add urls for in the sitemap.
        foreach ($items as $item) {
            $url = new SitemapUrl();
            $url->loc = 'http://gapminder.org/'; // todo: absolute item url.
            $document->addUrl($url);
        }
        $document->save(self::PATH_PAGES_DESKTOP); // todo: absolute path?
    }

    public function actionGeneratePagesMobile()
    {
        $document = new SitemapDocument('1.0', 'UTF-8');
        $items = array(); // todo: get all items to add urls for in the sitemap.
        foreach ($items as $item) {
            $url = new SitemapUrl();
            $url->loc = 'http://m.gapminder.org/'; // todo: absolute item url.
            $document->addUrl($url);
        }
        $document->save(self::PATH_PAGES_MOBILE); // todo: absolute path?
    }

    public function actionGenerateProfiles()
    {
        $document = new SitemapDocument('1.0', 'UTF-8');
        $profiles = array(); // todo: get all profiles to add urls for in the sitemap.
        foreach ($profiles as $profile) {
            $url = new SitemapUrl();
            $url->loc = 'http://gapminder.org/profiles/'; // todo: absolute item url.
            $document->addUrl($url);
        }
        $document->save(self::PATH_PROFILES); // todo: absolute path?
    }
}
