<?php

namespace App\Console\Commands\Kong\Routes;

use App\Support\Clients\KongClient;
use Illuminate\Console\Command;

class Delete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:routes:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kong路由删除';

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
        $id = 'd14e60ab-3f88-4c9e-82f6-1a0ce150c345';
        $client = KongClient::getInstance();
        $res = $client->deleteRoute($id);
        dump($res);
    }
}
