<?php

namespace Arpanext\Storage\Jsons\Databases\Commands;

class Execute
{
    private $client;

    private $database;

    public function __construct($client, $database)
    {
        $this->client = $client;
    }

    public function request()
    {
        return $this->guzzleHttpClient->request('POST', '/databases/database/commands/execute', [
            'body' => '{"ping":1}',
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);
    }
}
