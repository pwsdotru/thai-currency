<?php

declare(strict_types=1);

require_once(__DIR__ . "/vendor/autoload.php");

use ThaiCurrency\Client\BoT\Client;

$parser = new Client();
$data = $parser->get();

print_r($data);