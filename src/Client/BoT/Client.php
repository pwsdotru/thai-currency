<?php

declare(strict_types=1);

namespace ThaiCurrency\Client\BoT;

use ThaiCurrency\Parser;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7\Request;

class Client extends Parser
{
    /**
     * @const string $url
     */
    private const URL = "https://www.bot.or.th/content/bot/en/statistics/exchange-rate/jcr:content/root/container/statisticstable2.results.level3cache.%s.json";

    protected function prepare(): RequestInterface
    {
        $req = new Request(
            'GET',
            sprintf(self::URL, date('Y-m-d')),
            []
        );
        return $req;
    }
}
