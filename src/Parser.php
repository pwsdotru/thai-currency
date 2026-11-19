<?php

declare(strict_types=1);

namespace ThaiCurrency;

use GuzzleHttp\Client;
use Psr\Http\Client\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;

abstract class Parser
{
    private ?ClientInterface $client = null;

    public function __construct(?ClientInterface $client = null)
    {
        if (null === $client) {
            $this->client = new Client();
        } else {
            $this->client = $client;
        }
    }
}
