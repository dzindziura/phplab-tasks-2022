<?php

namespace src\oop\app\src\Transporters;

use GuzzleHttp\Client;

class GuzzleAdapter implements TransportInterface
{
    private $client;

    /**
     * GuzzleAdapter constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param string $url
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getContent(string $url): string
    {
        $response = $this->client->request('GET', $url);

        return in_array('text/html; charset=windows-1251', $response->getHeader('Content-Type'))
            ? iconv("Windows-1251", "UTF-8", $response->getBody())
            : $response->getBody();
    }
}
