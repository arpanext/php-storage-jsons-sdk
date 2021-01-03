<?php

namespace Arpanext\Storage\Jsons\Databases;

use Arpanext\Storage\Jsons\Databases\Collections\FindOne;

class Collections
{
    private $client;

    private $database;

    private $collection;

    private $findOne;

    public function __construct($client, $database, $collection)
    {
        $this->client = $client;

        $this->database = $database;

        $this->collection = $collection;
    }

    public function findOne(string $filter, string $options)
    {
        if (is_null($this->findOne)) {
            $this->setFindOne($filter, $options);
        }

        return $this->getFindOne();
    }

    /**
     * Get the value of execute
     */ 
    public function getFindOne()
    {
        return $this->findOne;
    }

    /**
     * Set the value of execute
     *
     * @return  self
     */ 
    public function setFindOne(string $filter, string $options)
    {
        $this->findOne = new FindOne($this->client, $this->database, $this->collection, $filter, $options);

        return $this;
    }
}
