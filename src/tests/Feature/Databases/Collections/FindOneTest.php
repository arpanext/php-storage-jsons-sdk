<?php

namespace Tests\Feature\Databases\Collections;

use PHPUnit\Framework\TestCase;
use Arpanext\Storage\Jsons\Client;

class FindOneTest extends TestCase
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

        $response = $client->databases('database')->collections('collection')->findOne('{"id":1,"name":"Leanne Graham","email":"Sincere@april.biz"}', '{"sort":{"_id":-1}}')->request();
        
        $responseObject = json_decode($response->getBody()->getContents());

        $this->assertObjectHasAttribute('_id', $responseObject);
    }
}
