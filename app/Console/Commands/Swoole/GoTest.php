<?php

namespace App\Console\Commands\Swoole;

use App\Core\Swoole\Test\TestClient;
use Illuminate\Console\Command;

class GoTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'go:send';

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
        try {
            $result = TestClient::getInstance()->Version();
            dump($result);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
