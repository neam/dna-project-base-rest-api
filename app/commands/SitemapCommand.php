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
     * @var Account[] runtime cache for account models.
     */
    protected $accounts;

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
                $url = new SitemapUrl();
                $url->loc = self::BASE_URL_PAGES_DESKTOP  . ltrim($route->route, '/');
                $url->lastmod = $item->modified;
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
                $url = new SitemapUrl();
                $url->loc = self::BASE_URL_PAGES_MOBILE  . ltrim($route->route, '/');
                $url->lastmod = $item->modified;
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
        foreach ($this->loadAccounts() as $account) {
            $url = new SitemapUrl();
            $url->loc = self::BASE_URL_PROFILES . $account->username;
            $url->lastmod = $account->profile->modified;
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
     * Loads all accounts with public profiles.
     *
     * @return Account[] the accounts.
     */
    protected function loadAccounts()
    {
        if ($this->accounts === null) {
            // todo: needs optimizing when either memory or time becomes a problem.
            $this->accounts = Account::model()->with('profile')->findAll();
        }
        return $this->accounts;
    }
}
