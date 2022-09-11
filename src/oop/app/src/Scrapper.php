<?php
/**
 * Create Class - Scrapper with method getMovie().
 * getMovie() - should return Movie Class object.
 *
 * Note: Use next namespace for Scrapper Class - "namespace src\oop\app\src;"
 * Note: Dont forget to create variables for TransportInterface and ParserInterface objects.
 * Note: Also you can add your methods if needed.
 */

namespace src\oop\app\src;

use src\oop\app\src\Models\Movie;

class Scrapper
{
    private Movie $movie;
    private $parser;
    private $transporter;

    public function __construct($transporter, $parser)
    {
        $this->transporter = $transporter;
        $this->parser = $parser;
        $this->movie = new Movie();
    }

    public function getMovie(string $url): Movie
    {
        $content = $this->transporter->getContent($url);
        $data = $this->parser->parseContent($content);

        $this->movie->setTitle($data['title']);
        $this->movie->setPoster($data['poster']);
        $this->movie->setDescription($data['description']);

        return $this->movie;
    }
}