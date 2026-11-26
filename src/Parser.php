<?php

declare(strict_types=1);

namespace ThaiCurrency;

use GuzzleHttp\Client;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;

abstract class Parser
{
    protected ClientInterface $client;

    public function __construct(?ClientInterface $client = null)
    {
        if (null === $client) {
            $this->client = new Client();
        } else {
            $this->client = $client;
        }
    }

    /**
     * @return array <string, array <int, float>>
     */
    public function get(): array
    {
        $request = $this->prepare();
        $response = $this->client->send($request);
        return  [];
    }

    abstract protected function prepare(): RequestInterface;
}
