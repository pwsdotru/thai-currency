<?php

declare(strict_types=1);

namespace ThaiCurrency\Client\BoT;

use ThaiCurrency\Parser;

class Client extends Parser
{
    /**
     * @const string $url
     */
    private const URL = "https://www.bot.or.th/content/bot/en/statistics/exchange-rate/jcr:content/root/container/statisticstable2.results.level3cache.%s.json";

    protected function url(): string
    {
        return sprintf(self::URL, date('Y-m-d'));
    }

    /**
     * @param string $data
     * @return array <string, array <string, float>>
     */
    protected function parse(string $data): array
    {
        $res = [];
        echo($data);

        return $res;
    }
}
