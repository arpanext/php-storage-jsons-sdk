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
        $client = (new Client([
            'base_uri' => 'http://127.0.0.1:8000/api/v1/storage/jsons/',
        ]));

        $response = $client->databases('database')->commands()->execute('{"ping":1}')->request();

        $responseObjects = json_decode($response->getBody()->getContents());

        $this->assertGreaterThanOrEqual(1, count((array) $responseObjects));

        $this->assertObjectHasAttribute('ok', $responseObjects[0]);
    }
}
