<?php declare(strict_types=1);

namespace ApiClients\Tests\Client\Travis\Resource\Sync;

use ApiClients\Tools\ResourceTestUtilities\AbstractResourceTest;
use ApiClients\Client\Travis\ApiSettings;
use ApiClients\Client\Travis\Resource\Job;

class JobTest extends AbstractResourceTest
{
    public function getSyncAsync() : string
    {
        return 'Sync';
    }
    public function getClass() : string
    {
        return Job::class;
    }
    public function getNamespace() : string
    {
        return Apisettings::NAMESPACE;
    }
}
