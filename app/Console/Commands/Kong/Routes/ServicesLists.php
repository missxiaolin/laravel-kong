<?php

namespace App\Console\Commands\Kong\Routes;

use App\Support\Clients\KongClient;
use Illuminate\Console\Command;

class ServicesLists extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:routes:services:lists';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $res = $client->getRouteService('2bda353e-cd8a-4815-ba24-5effe317e9c5');
        dump($res);
    }
}
