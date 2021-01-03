<?php

namespace Arpanext\Storage\Jsons\Databases;

use Arpanext\Storage\Jsons\Databases\Commands\Execute;

class Commands
{
    private $client;

    private $execute;    

    private $database;

    public function __construct($client, $database)
    {
        $this->client = $client;

        $this->database = $database;
    }

    /**
     * Get the value of execute
     */ 
    public function getExecute()
    {
        return $this->execute;
    }

    /**
     * Set the value of execute
     *
     * @return  self
     */ 
    public function setExecute()
    {
        $this->execute = new Execute($this->guzzleHttpClient, $this->database);

        return $this;
    }
}
