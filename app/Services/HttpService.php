<?php

namespace App\Services;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Log;

class HttpService
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    /** @var ClientInterface $client */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function get(string $url, array $options = []):? Response
    {
        /** @var null|Response $response */
        $response = null;
        try {
            // Get response
            $response = $this->client->request(
                self::METHOD_GET, // Method
                $url, // Url
                $options // Additional options
            );
        } catch (RequestException $e) {
            Log::error($e->getMessage());
        }

        return $response;
    }

    /**
     * Get response body contents.
     *
     * @param string $url
     * @param array $options
     * @return null|string
     */
    public function getContents(string $url, array $options = []):? string
    {
        /** @var null|string $contents */
        $contents = null;
        try {
            /** @var Response $response */
            $response = $this->get($url, $options);
            $body = $response->getBody();
            $contents = $body->getContents();
        } catch (BadResponseException $e) {
            Log::warning($e->getMessage());
        }

        return $contents;
    }
}
