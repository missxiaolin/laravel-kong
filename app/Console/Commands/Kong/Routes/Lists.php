<?php

namespace App\Console\Commands\Kong\Routes;

use App\Support\Clients\KongClient;
use Illuminate\Console\Command;

class Lists extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:routes:lists';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kong路由列表';

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
        $res = $client->routes();
        dump($res);
    }
}
