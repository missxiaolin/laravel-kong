<?php

namespace App\Console\Commands\Kong\Service;

use App\Console\Kong;
use App\Support\Clients\KongClient;

class Upload extends Kong
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:service:upload {name=0} {url=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kong跟新服务';

    public $params = [
        'id' => 'The Service id.',
        'name' => 'The Service name.',
        'protocol' => 'The protocol used to communicate with the upstream. It can be one of http (default) or https.',
        'host' => 'The host of the upstream server.',
        'port' => 'The upstream server port. Defaults to 80.',
        'path' => 'The path to be used in requests to the upstream server. Empty by default.',
        'retries' => 'The number of retries to execute upon failure to proxy. The default is 5.',
        'connect_timeout' => 'The timeout in milliseconds for establishing a connection to the upstream server. Defaults to 60000.',
        'write_timeout' => 'The timeout in milliseconds between two successive write operations for transmitting a request to the upstream server. Defaults to 60000.',
        'read_timeout' => 'The timeout in milliseconds between two successive read operations for transmitting a request to the upstream server. Defaults to 60000.',
        'url' => 'Shorthand attribute to set protocol, host, port and path at once. This attribute is write-only (the Admin API never "returns" the url).',
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function init()
    {
        $params = [
            'name' => 'kong',
            'url' => 'http://kong.missxiaolin.com',
        ];
        dump($params);
        try {
            $id = $this->getIdOrName();
            $client = KongClient::getInstance();
            $res = $client->updateService($id, $params);
            dd($res);
        } catch (\Exception $e) {
            dump($e->getMessage());
        }
    }

    /**
     * @return array|string
     * @throws \Exception
     */
    public function getIdOrName()
    {
        $name = $this->argument('name');
        $url = $this->argument('url');
        if ($name) {
            return $name;
        }
        if ($url) {
            return $url;
        }
        throw new \Exception('请传入参数');
    }
}
