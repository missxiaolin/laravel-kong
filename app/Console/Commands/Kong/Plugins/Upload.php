<?php

namespace App\Console\Commands\Kong\Plugins;

use App\Support\Clients\KongClient;
use Illuminate\Console\Command;

class Upload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:plugins:upload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kong 插件修改';

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
    public function handle()
    {
        $id = 'ec112607-cd52-4ca7-8ee0-6a3c0e909ce0';
        $params = [
            'name' => 'ip-restriction',
            'service_id' => '2bda353e-cd8a-4815-ba24-5effe317e9c5',
            'route_id' => 'd14e60ab-3f88-4c9e-82f6-1a0ce150c345',
            'consumer_id' => '626a7ca9-c84e-442d-bb4a-7f1fce5d5fc1',
//            'config.whitelist' => '200.1.1.35,127.0.0.1',
            'config.blacklist' => '200.1.1.35,127.0.0.1',
        ];
        $client = KongClient::getInstance();
        $res = $client->updatePlugins($id, $params);
        dump($res);
    }
}
