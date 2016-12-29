<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\Travis;

use ApiClients\Client\Travis\AsyncClientInterface;
use ApiClients\Client\Travis\Client;
use ApiClients\Client\Travis\CommandBus\Command;
use ApiClients\Client\Travis\ClientInterface;
use ApiClients\Client\Travis\Resource\RepositoryInterface;
use ApiClients\Tools\TestUtilities\TestCase;
use Prophecy\Argument;
use function Clue\React\Block\await;
use React\EventLoop\Factory;
use function React\Promise\resolve;

final class ClientTest extends TestCase
{
    public function testCreate()
    {
        $client = Client::create();

        self::assertInstanceOf(ClientInterface::class, $client);
        self::assertInstanceOf(Client::class, $client);
    }

    public function testCreateFromClient()
    {
        $client = Client::createFromClient(Factory::create(), $this->prophesize(AsyncClientInterface::class)->reveal());

        self::assertInstanceOf(ClientInterface::class, $client);
        self::assertInstanceOf(Client::class, $client);
    }

    public function testRepository()
    {
        $repositorySlug = 'php-api-clients/travis';
        $repository = $this->prophesize(RepositoryInterface::class)->reveal();

        $loop = Factory::create();
        $asyncClient = $this->prophesize(AsyncClientInterface::class);
        $asyncClient->repository($repositorySlug)->shouldBeCalled()->willReturn(resolve($repository));

        $client = Client::createFromClient($loop, $asyncClient->reveal());

        $result = $client->repository($repositorySlug);

        self::assertSame($repository, $result);
    }
}
