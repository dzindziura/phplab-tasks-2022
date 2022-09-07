<?php

namespace src\oop\app\src\Transporters;

class CurlStrategy implements TransportInterface
{

    /**
     * @inheritDoc
     */
    public function getContent(string $url): string
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING       => "",
        ]);

        $response = curl_exec($curl);

        return strpos($response, '<meta charset="windows-1251" />')
            ? iconv("Windows-1251", "UTF-8", $response)
            : $response;

    }
}