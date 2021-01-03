<?php

namespace Arpanext\Storage\Jsons\Databases\Collections;

class FindOne
{
    private $client;

    private $database;

    private $collection;

    private $filter;

    private $options;

    public function __construct($client, $database, $collection, $filter, $options)
    {
        $this->client = $client;

        $this->database = $database;

        $this->collection = $collection;

        $this->filter = $filter;

        $this->options = $options;
    }

    public function request()
    {
        return $this->client->request('GET', "databases/{$this->database}/collections/{$this->collection}/findOne", [
            'query' => [
                'filter' => $this->filter,
                'options' => $this->options,
            ]
        ]);
    }
}
