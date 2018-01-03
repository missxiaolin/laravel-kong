<?php
namespace App\Core\Swoole;

use swoole_client;
use Exception;

class SwooleClient
{
    public $client;

    protected static $_instances = [];

    public static function getInstance($service, $host, $port)
    {
        if (isset(static::$_instances[$service]) && static::$_instances[$service] instanceof static) {
            return static::$_instances[$service];
        }

        return static::$_instances[$service] = new static($host, $port);
    }

    public function __construct($host, $port)
    {
        $client = new swoole_client(SWOOLE_SOCK_TCP);
        if (!$client->connect($host, $port, -1)) {
            throw new Exception("connect failed. Error: {$client->errCode}");
        }
        $this->client = $client;
    }

    public function handle($data)
    {
        $this->client->send(json_encode($data));
        return $this->client->recv();
    }
}