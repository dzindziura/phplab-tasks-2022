<?php

namespace src\oop\app\src\Parsers;

class FilmixParserStrategy implements ParserInterface
{
    public function parseContent(string $siteContent)
    {
        $patterns = [
            'title'       => '/<h1 class="name" itemprop="name">(.*?)<\/h1>/si',
            'poster'      => '/<meta property=\"og:image" content="(.*?)" \/>/si',
            'description' => '/<div class="full-story">(.*?)<\/div>/si',
        ];

        preg_match_all($patterns['title'], $siteContent, $matches);
        $title = $matches[0][0];
        preg_match_all($patterns['poster'], $siteContent, $matches);
        $poster = $matches[1][0];
        preg_match_all($patterns['description'], $siteContent, $matches);
        $description = $matches[0][0];

        return [
            'title' => $title,
            'poster' => $poster,
            'description' => $description
        ];
    }
}