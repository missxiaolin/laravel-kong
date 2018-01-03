<?php

namespace App\Http\Controllers;

use App\Core\Swoole\Test\TestClient;

class IndexController extends Controller
{
    public function index()
    {
        $result = [];
        try {
            $result = TestClient::getInstance()->returnString();
        } catch (\Exception $e) {
            return api_response([], 1000, '接口超时');
        }

        return api_response($result);
    }

    public function timeout()
    {
        $result = [];
        try {
            $result = TestClient::getInstance()->recvTimeout();
        } catch (\Exception $e) {
            return api_response([], 1000, '接口超时');
        }

        return api_response($result);
    }
}