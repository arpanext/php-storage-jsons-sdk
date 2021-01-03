<?php

namespace Arpanext\Storage\Jsons;

use Arpanext\Storage\Jsons\Databases\Commands;

class Databases
{
    private $client;

    private $database;

    private $commands;

    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Get the value of database
     */ 
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * Set the value of database
     *
     * @return  self
     */ 
    public function setDatabase($database)
    {
        $this->database = $database;

        return $this;
    }

    /**
     * Get the value of commands
     */ 
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * Set the value of commands
     *
     * @return  self
     */ 
    public function setCommands()
    {
        $this->commands = new Commands($this->client, $this->database);

        return $this;
    }
}
