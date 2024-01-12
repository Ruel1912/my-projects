<?php

namespace common\RequestSMS;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class SMS
{
    /**
     * @var string
     */
    private $baseUrl = 'https://sms.ru/{method}';

    /**
     * @var Client
     */
    private $client;
    public function __construct($config = [])
    {
        $this->client = new Client($config);
    }

    /**
     * @throws GuzzleException
     */
    public function request($method, $params = [])
    {
        $response = $this->client->post($this->getUrl($method), ['query' => $params]);

        if ($response->getStatusCode() === 200) {
            return $response->getBody();
        } else {
            throw new Exception(sprintf('Sms.ru problem. Status code is %s', $response->getStatusCode()), $response->getStatusCode());
        }
    }

    /**
     * @param string $method
     *
     * @return string
     */
    private function getUrl($method)
    {
        return strtr($this->baseUrl, ['{method}' => $method]);
    }
}