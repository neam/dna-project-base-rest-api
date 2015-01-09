<?php

/**
 * XML document object of a sitemap file.
 *
 * Example structure:
 *
 * <?xml version="1.0" encoding="UTF-8"?>
 * <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
 *     <url>
 *         <loc>http://www.example.com/</loc>
 *         <lastmod>2005-01-01</lastmod>
 *         <changefreq>monthly</changefreq>
 *         <priority>0.8</priority>
 *     </url>
 * </urlset>
 */
class SitemapDocument extends DOMDocument
{
    const XMLNS = 'http://www.sitemaps.org/schemas/sitemap/0.9';

    /**
     * @inheritdoc
     */
    public function __construct($version, $encoding)
    {
        parent::__construct($version, $encoding);

        $urlset = $this->createElement('urlset');
        $urlset->setAttribute('xmlns', self::XMLNS);
        $this->appendChild($urlset);
    }

    /**
     * Adds a <url> section in under the <urlset> section in the document.
     *
     * @param SitemapUrl $url the url model to add to the document.
     */
    public function addUrl(SitemapUrl $url)
    {
        if (!$url->validate()) {
            // todo: throw validation error
        }
        $element = $this->createElement('url');
        $element->appendChild($this->createElement('loc', $url->loc));
        if ($url->lastmod !== null) {
            $element->appendChild($this->createElement('lastmod', $url->lastmod));
        }
        if ($url->changefreg !== null) {
            $element->appendChild($this->createElement('changefreg', $url->changefreg));
        }
        if ($url->priority !== null) {
            $element->appendChild($this->createElement('priority', $url->priority));
        }
        $this->documentElement->appendChild($element);
    }
}
