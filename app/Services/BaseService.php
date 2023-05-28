<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class BaseService
{
    protected Client $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client();
    }

    /**
     * Create get request
     *
     * @param string $uri
     * @param array $params
     * @return mixed
     * @throws GuzzleException
     */
    protected function get(string $uri, array $params = []): mixed
    {
        try {
            $response = $this->httpClient->request('GET', $uri, ['query' => $params]);

            return json_decode($response->getBody()->getContents());
        } catch (Exception $e) {
            abort($e->getCode(), $e->getMessage());
        }
    }
}
