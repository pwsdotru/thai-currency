<?php

declare(strict_types=1);

namespace ThaiCurrency;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

abstract class Parser
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Return array with rates for THB.
     * Like
     * [
     *  "USD" => ["BUY" => 33.4, "SELL" => 33.6],
     *  "EUR" => ["BUY" => 36.1, "SELL" => 37.0],
     * ]
     * @return array <string, array <string, float>>
     */
    public function get(): array
    {
        $response = $this->client->request(
            $this->method(),
            $this->url(),
            $this->options()
        );
        return  $this->parse($response->getBody()->getContents());
    }

    /**
     * Return method for Request
     * Default "GET". Child class can override.
     * @return string
     */
    protected function method(): string
    {
        return "GET";
    }

    /**
     * Return extra params for Request
     * Default empty array. Child class can override.
     * @return array <string, mixed>
     */
    protected function options(): array
    {
        return [];
    }

    /**
     * Return URL for request
     * @return string
     */
    abstract protected function url(): string;


    /**
     * @param string $data
     * @return array <string, array <string, float>>
     */
    abstract protected function parse(string $data): array;
}
