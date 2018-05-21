<?php
namespace App\Core\Swoole\Test;

use App\Core\Swoole\Client;

class TestClient extends Client
{
    protected $service = 'test';

    protected $host = '127.0.0.1';

    protected $port = 11520;
}