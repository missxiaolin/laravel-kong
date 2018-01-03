<?php

namespace App\Http\Controllers;

use App\Core\Swoole\Test\TestClient;

class IndexController extends Controller
{
    public function index()
    {
        $result = TestClient::getInstance()->returnArray();
        return api_response($result);
    }
}