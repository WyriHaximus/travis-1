<?php declare(strict_types=1);

namespace ApiClients\Client\Travis\CommandBus\Handler;

use ApiClients\Client\Travis\CommandBus\Command\AccountsCommand;
use ApiClients\Client\Travis\Resource\AccountInterface;
use ApiClients\Tools\Services\Client\FetchAndIterateService;
use React\Promise\PromiseInterface;
use Rx\Observable;
use function React\Promise\resolve;
use function WyriHaximus\React\futureFunctionPromise;

final class AccountsHandler
{
    /**
     * @var FetchAndIterateService
     */
    private $fetchAndIterateService;

    /**
     * @param FetchAndIterateService $fetchAndIterateService
     */
    public function __construct(FetchAndIterateService $fetchAndIterateService)
    {
        $this->fetchAndIterateService = $fetchAndIterateService;
    }

    /**
     * Fetch the given repository and hydrate it
     *
     * @param AccountsCommand $command
     * @return PromiseInterface
     */
    public function handle(AccountsCommand $command): PromiseInterface
    {
        return $this->fetchAndIterateService->handle('accounts', 'accounts', AccountInterface::HYDRATE_CLASS);
    }
}
