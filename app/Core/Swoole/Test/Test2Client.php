<?php
namespace App\Core\Swoole\Test;

use App\Core\Swoole\Client;

class Test2Client extends Client
{
    protected $service = 'order';

    protected $host = '127.0.0.1';

    protected $port = 11521;
}