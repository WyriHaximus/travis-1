<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\Travis\Resource\Async;

use ApiClients\Tools\ResourceTestUtilities\AbstractResourceTest;
use ApiClients\Client\Travis\ApiSettings;
use ApiClients\Client\Travis\Resource\Account;

class AccountTest extends AbstractResourceTest
{
    public function getSyncAsync() : string
    {
        return 'Async';
    }
    public function getClass() : string
    {
        return Account::class;
    }
    public function getNamespace() : string
    {
        return Apisettings::NAMESPACE;
    }
}
