<?php

namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;
use Symfony\Component\DomCrawler\Crawler;

class KinoukrDomCrawlerParserAdapter implements ParserInterface
{
    /**
     * @param string $siteContent
     * @return array
     */
    public function parseContent(string $siteContent)
    {
        $crawler = new Crawler($siteContent);

        $title = $crawler->filter('h1')->text();
        $poster = $crawler->filter('.fposter > a')->attr('href');
        $description = $crawler->filter('.fdesc')->text();

        return [
            'title' => $title,
            'poster' => $poster,
            'description' => $description
        ];
    }
}