<?php

namespace App\Console\Commands\Swoole;

use App\Core\Swoole\Test\Test2Client;
use Illuminate\Console\Command;

class SendMultistage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:swoole:multistage';

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
        $result = Test2Client::getInstance()->getTest2Handler100Times();
        dd($result);
    }
}
