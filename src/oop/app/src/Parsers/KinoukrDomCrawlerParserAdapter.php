<?php

namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;
use Symfony\Component\DomCrawler\Crawler;

class KinoukrDomCrawlerParserAdapter implements ParserInterface
{
    /**
     * @param string $siteContent
     * @return Movie
     */
    public function parseContent(string $siteContent): Movie
    {
        $crawler = new Crawler($siteContent);

        $title = $crawler->filter('h1')->text();
        $poster = $crawler->filter('.fposter > a')->attr('href');
        $description = str_replace(
            "<h2>" . $crawler->filter('.fdesc.full-text h2')->text() . "</h2>",
            '',
            $crawler->filter('.fdesc.full-text')->html()
        );

        return new Movie($title, $poster, $description);
    }
}