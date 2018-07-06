<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/6
 * Time: 上午10:01
 */

namespace App\Http\Controllers\Kong;


use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * 响应结果
     * @param object $filter
     * @param object $form
     * @param object $response
     * @param array $manager
     * @return string
     */
    public function run($filter, $form, $response, $manager)
    {
        $data = $filter->getData();
        $form->validate($data);
        return $response->run();
    }
}