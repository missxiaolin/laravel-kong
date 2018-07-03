<?php

namespace App\Console\Commands\Kong\Plugins;

use App\Support\Clients\KongClient;
use Illuminate\Console\Command;

class Add extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:plugins:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kong 插件添加';

    public $params = [
        'name' => 'The name of the Plugin that\'s going to be added. Currently the Plugin must be installed in every Kong instance separately.',
        'consumer_id' => 'The unique identifier of the consumer that overrides the existing settings for this specific consumer on incoming requests.',
        'config.{property}' => 'The configuration properties for the Plugin which can be found on the plugins documentation page in the Plugin Gallery.',
    ];

    public $mappers = [
        'rate-limiting' => [

        ],
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
    public function handle()
    {
        $params = [
            'name' => 'ip-restriction',
            'consumer_id' => '626a7ca9-c84e-442d-bb4a-7f1fce5d5fc1',
            'config.whitelist' => '200.1.1.35',
        ];


        $client = KongClient::getInstance();
        $res = $client->addPlugin($params);
        dump($res);
    }
}
