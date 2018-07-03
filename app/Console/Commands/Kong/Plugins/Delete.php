<?php

namespace App\Console\Commands\Kong\Plugins;

use App\Support\Clients\KongClient;
use Illuminate\Console\Command;

class Delete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:plugins:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '删除插件';

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
        $id = '0a265396-7628-4eb2-a3d0-bc3503b2f837';
        $client = KongClient::getInstance();
        $res = $client->deletePlugins($id);
        dump($res);
    }
}
