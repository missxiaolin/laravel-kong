<?php
namespace App\Core\Swoole;

use swoole_client;
use Exception;

class SwooleClient implements SwooleClientInterface
{
    public $client;

    protected $connectTimeout = 0.1;

    protected static $_instances = [];

    /**
     * SwooleClient constructor.
     * @param $host
     * @param $port
     * @param $options
     * @throws Exception
     */
    public function __construct($host, $port, $options = [])
    {
        $client = new swoole_client(SWOOLE_SOCK_TCP);

        if (isset($options['connect_timeout']) && is_numeric($options['connect_timeout'])) {
            $this->connectTimeout = $options['connect_timeout'];
        }

        if (!$client->connect($host, $port, $this->connectTimeout)) {
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

        return static::$_instances[$service] = new static($host, $port, $options);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function handle($data)
    {
        $this->client->send(json_encode($data));
        return $this->client->recv();
    }
}