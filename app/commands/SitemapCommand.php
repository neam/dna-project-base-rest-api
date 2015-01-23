<?php

/**
 * Command for generating sitemap xml files for the following sites:
 *
 * - pages-desktop.xml (http://gapminder.org)
 * - pages-mobile.xml (http://m.gapminder.org)
 * - profiles.xml (http://gapminder.org/profiles)
 *
 * The xml files are saved to `cms/yiiapps/rest-api/sitemap` directory.
 */
class SitemapCommand extends CConsoleCommand
{
    const PATH_PAGES_DESKTOP = '../../sitemap/pages-desktop.xml';
    const PATH_PAGES_MOBILE = '../../sitemap/pages-mobile.xml';
    const PATH_PROFILES = '../../sitemap/profiles.xml';

    const BASE_URL_PAGES_DESKTOP = 'http://gapminder.org/';
    const BASE_URL_PAGES_MOBILE = 'http://m.gapminder.org/';
    const BASE_URL_PROFILES = 'http://gapminder.org/profiles/';

    /**
     * @var Item[] runtime cache for item models.
     */
    protected $items;

    /**
     * @var Profile[] runtime cache for profile models.
     */
    protected $profiles;

    /**
     * Generate all the sitemap files.
     */
    public function actionGenerateAll()
    {
        $this->actionGeneratePagesDesktop();
        $this->actionGeneratePagesMobile();
        $this->actionGenerateProfiles();
    }

    /**
     * Generates the `pages-desktop.xml` file.
     */
    public function actionGeneratePagesDesktop()
    {
        $document = new SitemapDocument('1.0', 'UTF-8');
        $document->formatOutput = true;
        foreach ($this->loadItems() as $item) {
            foreach ($item->routes as $route) {
                if (empty($route->route)) {
                    continue;
                }
                $url = new SitemapUrl();
                $url->loc = self::BASE_URL_PAGES_DESKTOP  . ltrim($route->route, '/');
                if (($timestamp = strtotime($item->modified)) !== false) {
                    $url->lastmod = date(DateTime::W3C, $timestamp);
                }
                $document->addUrl($url);
            }
        }
        $document->save(__DIR__ . '/' . self::PATH_PAGES_DESKTOP);
    }

    /**
     * Generates the `pages-mobile.xml` file.
     */
    public function actionGeneratePagesMobile()
    {
        $document = new SitemapDocument('1.0', 'UTF-8');
        $document->formatOutput = true;
        foreach ($this->loadItems() as $item) {
            foreach ($item->routes as $route) {
                if (empty($route->route)) {
                    continue;
                }
                $url = new SitemapUrl();
                $url->loc = self::BASE_URL_PAGES_MOBILE  . ltrim($route->route, '/');
                if (($timestamp = strtotime($item->modified)) !== false) {
                    $url->lastmod = date(DateTime::W3C, $timestamp);
                }
                $document->addUrl($url);
            }
        }
        $document->save(__DIR__ . '/' . self::PATH_PAGES_MOBILE);
    }

    /**
     * Generates the `profiles.xml` file.
     */
    public function actionGenerateProfiles()
    {
        $document = new SitemapDocument('1.0', 'UTF-8');
        $document->formatOutput = true;
        foreach ($this->loadProfiles() as $profile) {
            $url = new SitemapUrl();
            $url->loc = self::BASE_URL_PROFILES . $profile->account->username;
            if (($timestamp = strtotime($profile->modified)) !== false) {
                $url->lastmod = date(DateTime::W3C, $timestamp);
            }
            $document->addUrl($url);
        }
        $document->save(__DIR__ . '/' . self::PATH_PROFILES);
    }

    /**
     * Loads all published items that have routes explicitly set for them.
     *
     * @return Item[] the items.
     */
    protected function loadItems()
    {
        if ($this->items === null) {
            // todo: needs optimizing when either memory or time becomes a problem.
            $this->items = Item::model()->with('routes')->findAll('routes.legacy IS NULL');
        }
        return $this->items;
    }

    /**
     * Loads all public profiles with account info.
     *
     * @return Profile[] the profiles.
     */
    protected function loadProfiles()
    {
        if ($this->profiles === null) {
            // todo: needs optimizing when either memory or time becomes a problem.
            $this->profiles = Profile::model()->with('account')->findAll();
        }
        return $this->profiles;
    }
}
