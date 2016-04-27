<?php
declare(strict_types=1);

namespace WyriHaximus\Travis;

use WyriHaximus\Travis\Resource\Repository;
use WyriHaximus\Travis\Transport\Client as Transport;
use WyriHaximus\Travis\Transport\Factory;
use function Clue\React\Block\await;

class Client
{
    protected $transport;
    protected $client;

    public function __construct(Transport $transport = null)
    {
        if (!($transport instanceof Transport)) {
            $transport = Factory::create();
        }
        $this->transport = $transport;
        $this->client = new AsyncClient($this->transport);
    }

    public function repository(string $repository): Repository
    {
        return await($this->client->repository($repository), $this->transport->getLoop());
    }
}
