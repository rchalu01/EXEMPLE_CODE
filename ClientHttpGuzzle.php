<?php

use GuzzleHttp\Exception\GuzzleException;

class ClientHttpGuzzle implements ClientHttpInterface
{
    private $client;
    private $baseUri;
    private $auth;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    public function get($relativeUri, $query)
    {
        try {
            return $this->client->request('GET', $this->baseUri . '/' . $relativeUri, ['auth' => $this->auth, 'query' => $query]);
        } catch (GuzzleException $e) {
            return 'Code : ' . $e->getCode() . 'Message : ' . $e->getMessage();
        }
    }

    public function post($relativeUri, $body)
    {
        try {
            return $this->client->request('POST', $this->baseUri . '/' . $relativeUri, ['auth' => $this->auth, 'body' => $body]);
        } catch (GuzzleException $e) {
            return 'Code : ' . $e->getCode() . 'Message : ' . $e->getMessage();
        }
    }

    public function delete($relativeUri)
    {
        try {
            return $this->client->request('DELETE', $this->baseUri . '/' . $relativeUri, ['auth' => $this->auth]);
        } catch (GuzzleException $e) {
            return 'Code : ' . $e->getCode() . 'Message : ' . $e->getMessage();

        }
    }

    public function configBaseUri($baseUri)
    {
        $this->baseUri = $baseUri;
    }

    public function configAuth($username, $password)
    {
        $this->auth = [$username, $password];
    }
}
