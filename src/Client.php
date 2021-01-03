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

    public function __construct(array $options)
    {
        $headers = array_merge([
            'Content-Type' => 'application/json',
            //'Authorization' => 'Bearer <token>',
        ], $options['headers'] ?? []);

        $this->guzzleHttpClient = new GuzzleHttpClient([
            'base_uri' => $options['base_uri'],
            'timeout' => 5.0,
            'headers' => $headers,
            "http_errors" => false,
        ]);

        return $this->guzzleHttpClient;
    }

    public function databases(string $database)
    {
        if (is_null($this->databases)) {
            $this->setDatabases($database);
        }

        return $this->getDatabases();
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
    public function setDatabases(string $database)
    {
        $this->databases = new Databases($this->guzzleHttpClient, $database);

        return $this;
    }
}
