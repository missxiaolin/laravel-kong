<?php

namespace App\Console\Commands\Kong\Service;

use App\Console\Kong;
use App\Support\Clients\KongClient;

class Info extends Kong
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:service:info {name=0} {url=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kong获取service详情';

    public $params = [
        'id' => 'The Service id.',
        'name' => 'The Service name.',
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
        try {
            $id = $this->getIdOrName();
            $client = KongClient::getInstance();
            $res = $client->getService($id);
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
