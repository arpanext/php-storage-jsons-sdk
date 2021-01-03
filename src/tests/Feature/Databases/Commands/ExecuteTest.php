<?php

namespace Tests\Feature\Databases\Commands;

use Arpanext\Storage\Jsons\Client;
use PHPUnit\Framework\TestCase;

class Execute extends TestCase
{
    /**
     * Get many object.
     *
     * @return void
     */
    public function testExecute()
    {
        $object = file_get_contents('https://jsonplaceholder.typicode.com/users/1');

        $response = (new Client())->setDatabases()->getDatabases()->setDatabase('database')->getDatabase()->setCommands()->getCommands()->setExecute()->getExecute()->request();

        $responseObjects = json_decode($response->getBody()->getContents());

        $this->assertObjectHasAttribute('ok', $responseObjects);

        //$this->assertGreaterThanOrEqual(count(((object) $objects)->data), count((array) $responseObjects->data));
    }
}
