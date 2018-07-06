<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/6/22
 * Time: 下午3:50
 */

namespace App\Http\Controllers\Kong;


class IndexController extends BaseController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function kong()
    {
        return api_response(['kong']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function add()
    {
        return api_response(['add']);
    }
}