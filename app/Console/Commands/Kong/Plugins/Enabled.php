<?php

namespace App\Console\Commands\Kong\Plugins;

use App\Support\Clients\KongClient;
use Illuminate\Console\Command;

class Enabled extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:plugins:enabled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kong 插件启用';

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
        $client = KongClient::getInstance();
        $res = $client->pluginsEnabled();
        dump($res);
    }
}
