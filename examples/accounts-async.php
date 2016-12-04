<?php

use React\EventLoop\Factory;
use Rx\Observer\CallbackObserver;
use ApiClients\Client\Travis\AsyncClient;
use ApiClients\Client\Travis\Resource\AccountInterface;
use function ApiClients\Foundation\resource_pretty_print;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$loop = Factory::create();
$client = new AsyncClient($loop, require 'resolve_key.php');

$client->accounts()->subscribe(new CallbackObserver(function (AccountInterface $account) {
    resource_pretty_print($account);
}));

$loop->run();
