<?php

use ApiClients\Client\Travis\Client;
use function ApiClients\Foundation\resource_pretty_print;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$client = Client::create(require 'resolve_key.php');

if (!isset($argv[1])) {
    throw new Exception('Missing repository argument');
}

$repo = $client->repository($argv[1]);

if ($repo->isActive()) {
    echo 'Active', PHP_EOL;
} else {
    echo 'Inactive', PHP_EOL;
}

$repo->disable();

if ($repo->isActive()) {
    echo 'Active', PHP_EOL;
} else {
    echo 'Inactive', PHP_EOL;
}
