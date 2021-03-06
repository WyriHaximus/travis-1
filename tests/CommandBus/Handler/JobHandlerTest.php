<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\Travis\CommandBus\Handler;

use ApiClients\Client\Travis\CommandBus\Command\JobCommand;
use ApiClients\Client\Travis\CommandBus\Handler\JobHandler;
use ApiClients\Client\Travis\Resource\JobInterface;
use ApiClients\Tools\Services\Client\FetchAndHydrateService;
use ApiClients\Tools\TestUtilities\TestCase;
use Prophecy\Argument;
use function Clue\React\Block\await;
use function React\Promise\resolve;

final class JobHandlerTest extends TestCase
{
    public function testRepositoryKey()
    {
        $command = new JobCommand(123);
        $service = $this->prophesize(FetchAndHydrateService::class);
        $service->handle('jobs/123', 'job', JobInterface::HYDRATE_CLASS)->shouldBeCalled();
        $handler = new JobHandler($service->reveal());
        $handler->handle($command);
    }
}
