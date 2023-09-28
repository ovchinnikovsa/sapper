<?php

namespace Module\Connector;

class Connector
{
    private $host;
    private $username;
    private $password;

    /**
     * Summary of __construct
     * @param string $host
     * @param string $username
     * @param string $password
     */
    public function __construct(string $host, string $username, string $password)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;


        // $this->connect();
    }
}