<?php
namespace App\Core\Swoole;

use swoole_client;
use Exception;

class SwooleClient implements SwooleClientInterface
{
    public $client;

    protected $timeout = 0.1;

    protected static $_instances = [];

    protected $service;

    /**
     * SwooleClient constructor.
     * @param $host
     * @param $port
     * @param $options
     * @throws Exception
     */
    public function __construct($host, $port, $options = [])
    {
        $client = new swoole_client(SWOOLE_TCP | SWOOLE_KEEP);

        if (isset($options['timeout']) && is_numeric($options['timeout'])) {
            $this->timeout = $options['timeout'];
        }

        if (!$client->connect($host, $port, $this->timeout)) {
            throw new Exception("connect failed. Error: {$client->errCode}");
        }
        $this->client = $client;
    }

    /**
     * @param $service
     * @param $host
     * @param $port
     * @param array $options
     * @return mixed|static
     */
    public static function getInstance($service, $host, $port, $options = [])
    {
        if (isset(static::$_instances[$service]) && static::$_instances[$service] instanceof static) {
            return static::$_instances[$service];
        }

        $client = new static($host, $port, $options);
        static::$_instances[$service] = $client;
        $client->service = $service;
        return $client;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function handle($data)
    {
        $client = $this->client;
        if (!$client->isConnected()) {
            throw new Exception("connect failed. Error: {$client->errCode}");
        }
        $client->send(json_encode($data) . "\r\n");
        return $client->recv();
    }

    public function flush()
    {
        // $this->client->close();
        unset(static::$_instances[$this->service]);
    }
}