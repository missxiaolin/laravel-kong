<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午4:25
 */

namespace App\Kong\Client\Kong\Service\Response;

use App\Kong\Basic\Response;

class UploadResponse extends Response
{
    /**
     * 请求失败
     * @param array $request
     * @param array $response
     * @return array
     */
    public function fail($request = [], $response = [])
    {
        return api_response($response, 500, '修改服务失败');
    }
}