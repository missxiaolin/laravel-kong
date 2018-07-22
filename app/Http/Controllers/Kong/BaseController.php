<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/6
 * Time: 上午10:01
 */

namespace App\Http\Controllers\Kong;

use App\Http\Controllers\Controller;
use Exception;

class BaseController extends Controller
{
    /**
     * 响应结果
     * @param object $filter
     * @param object $form
     * @param object $request
     * @param object $response
     * @param object $manager
     * @return string
     */
    public function run($filter, $form, $request, $response, $manager)
    {
        $data = $filter->getData();
        $data = $form->validate($data);
        $paramter = [];
        try {
            $request->setData($data);
            $result = $manager->connect($request, $paramter);
        } catch (Exception $ex) {
            $result = app()['micro'];
            if (!$result) {
                $result = [
                    'errorCode' => 'E50000',
                    'errorMessage' => $ex->getMessage(),
                    'errorServer' => 'Systemt Error',
                ];
            }
            return $response->fail($data, $result);
        }
        return $response->callback($data, $result);
    }
}