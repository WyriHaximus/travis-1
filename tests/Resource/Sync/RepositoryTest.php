<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\Travis\Resource\Sync;

use ApiClients\Tools\ResourceTestUtilities\AbstractResourceTest;
use ApiClients\Client\Travis\ApiSettings;
use ApiClients\Client\Travis\Resource\Repository;

class RepositoryTest extends AbstractResourceTest
{
    public function getSyncAsync() : string
    {
        return 'Sync';
    }
    public function getClass() : string
    {
        return Repository::class;
    }
    public function getNamespace() : string
    {
        return Apisettings::NAMESPACE;
    }
}
