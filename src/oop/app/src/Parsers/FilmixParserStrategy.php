<?php

namespace src\oop\app\src\Parsers;

use Exception;
use src\oop\app\src\Models\Movie;

class FilmixParserStrategy implements ParserInterface
{
    /**
     * @param string $siteContent
     * @return Movie
     * @throws Exception
     */
    public function parseContent(string $siteContent)
    {
        $dataParse = [];

        $patterns = [
            'title'       => '/<h1 class="name" itemprop="name">(.*?)<\/h1>/si',
            'poster'      => '/<meta property=\"og:image" content="(.*?)" \/>/si',
            'description' => '/<div class="full-story">(.*?)<\/div>/si',
        ];

        foreach ($patterns as $key => $pattern) {
            preg_match($pattern, $siteContent, $matches);

            if (!isset($matches)) {
                throw new Exception("Error, could not get data, try again later");
            }

            $dataParse[$key] = $matches[1];
        }

        return new Movie($dataParse['title'], $dataParse['poster'], $dataParse['description']);
    }
}