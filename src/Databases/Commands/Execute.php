<?php

namespace Arpanext\Storage\Jsons\Databases\Commands;

class Execute
{
    private $client;

    private $database;

    private $command;

    public function __construct($client, $database, $command)
    {
        $this->client = $client;

        $this->database = $database;

        $this->command = $command;
    }

    public function request()
    {
        return $this->client->request('POST', "databases/{$this->database}/commands/execute", [
            'body' => $this->command,
        ]);
    }
}
