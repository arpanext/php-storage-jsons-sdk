<?php

namespace Arpanext\Storage\Jsons;

use Arpanext\Storage\Jsons\Databases\Collections;
use Arpanext\Storage\Jsons\Databases\Commands;

class Databases
{
    private $client;

    private $database;

    private $collections;

    private $commands;

    public function __construct($client, $database)
    {
        $this->client = $client;

        $this->database = $database;
    }

    public function collections($collection)
    {
        if (is_null($this->collections)) {
            $this->setCollections($collection);
        }

        return $this->getCollections();
    }

    public function commands()
    {
        if (is_null($this->commands)) {
            $this->setCommands();
        }

        return $this->getCommands();
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

    /**
     * Get the value of collections
     */ 
    public function getCollections()
    {
        return $this->collections;
    }

    /**
     * Set the value of collections
     *
     * @return  self
     */ 
    public function setCollections($collection)
    {
        $this->collections = new Collections($this->client, $this->database, $collection);

        return $this;
    }
}
