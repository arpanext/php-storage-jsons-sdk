<?php

namespace Arpanext\Storage\Jsons;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use Arpanext\Storage\Jsons\Databases;

class Client
{
    private $guzzleHttpClient;

    private $databases;

    public function __construct()
    {
        $headers = [];

        $this->guzzleHttpClient = new GuzzleHttpClient([
            'base_uri' => 'http://127.0.0.1:8000/api/v1/storage/jsons/',
            'timeout' => 5.0,
            'headers' => $headers,
            "http_errors" => false,
        ]);

        return $this->guzzleHttpClient;
    }

    /**
     * Get the value of databases
     */ 
    public function getDatabases()
    {
        return $this->databases;
    }

    /**
     * Set the value of databases
     *
     * @return  self
     */ 
    public function setDatabases()
    {
        $this->databases = new Databases($this->guzzleHttpClient);

        return $this;
    }
}
