<?php

use React\EventLoop\Factory;
use Rx\Observer\CallbackObserver;
use ApiClients\Client\Travis\AsyncClient;
use ApiClients\Client\Travis\Resource\BranchInterface;
use ApiClients\Client\Travis\Resource\RepositoryInterface;
use function ApiClients\Foundation\resource_pretty_print;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$loop = Factory::create();
$client = AsyncClient::create($loop, require 'resolve_key.php');

$repos = [
    'WyriHaximus/php-travis-client',
];

if (count($argv) > 1) {
    unset($argv[0]);
    foreach ($argv as $repo) {
        $repos[] = $repo;
    }
}

foreach ($repos as $repo) {
    $client->repository($repo)->then(function (RepositoryInterface $repo) {
        $repo->branches()->subscribe(new CallbackObserver(function (BranchInterface $branch) {
            resource_pretty_print($branch);
        }));
    });
}

$loop->run();
