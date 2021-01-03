<?php

namespace Tests\Feature\Databases\Commands;

use PHPUnit\Framework\TestCase;
use Arpanext\Storage\Jsons\Client;

class ExecuteTest extends TestCase
{
    /**
     * Get many object.
     *
     * @return void
     */
    public function testExecute()
    {
        $response = (new Client())->setDatabases()->getDatabases()->setDatabase('database')->setCommands()->getCommands()->setExecute()->getExecute()->request();

        $responseObjects = json_decode($response->getBody()->getContents());

        $this->assertGreaterThanOrEqual(1, count((array) $responseObjects));

        $this->assertObjectHasAttribute('ok', $responseObjects[0]);
    }
}
