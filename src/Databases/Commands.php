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

    public function execute(string $command)
    {
        if (is_null($this->execute)) {
            $this->setExecute($command);
        }

        return $this->getExecute();
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
    public function setExecute(string $command)
    {
        $this->execute = new Execute($this->client, $this->database, $command);

        return $this;
    }
}
