<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午8:15
 */

namespace App\Kong\Client\Kong\Plugins\Response;

use Lin\Src\Basic\Response;

class AddResponse extends Response
{
    /**
     * 请求失败
     * @param array $request
     * @param array $response
     * @return array
     */
    public function fail($request = [], $response = [])
    {
        return api_response($response, 500, '添加失败');
    }
}