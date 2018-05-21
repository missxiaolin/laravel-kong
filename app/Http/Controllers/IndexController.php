<?php

namespace App\Http\Controllers;

use App\Core\Enums\ErrorCode;
use App\Core\Swoole\Test\TestClient;
use Exception;

class IndexController extends Controller
{
    public function index()
    {
        $result = [];
        try {
            $result = TestClient::getInstance()->returnString();
        } catch (\Exception $e) {
            return api_error(ErrorCode::$ENUM_SYSTEM_TIMEOUT);
        }

        return api_response($result);
    }

    public function timeout()
    {
        $result = [];
        try {
            $result = TestClient::getInstance()->recvTimeout();
        } catch (\Exception $e) {
            return api_error(ErrorCode::$ENUM_SYSTEM_TIMEOUT);
        }

        return api_response($result);
    }

    public function testException()
    {
        try {
            $result = TestClient::getInstance()->exception();
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }
}