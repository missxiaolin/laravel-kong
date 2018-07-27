<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/27
 * Time: 下午2:02
 */

namespace App\Http\Controllers\Kong;


use App\Src\Basic\Filter;
use App\Src\Form\Auth\RouteListForm;
use App\Src\Repository\RoutesRepository;

class RouteController extends BaseController
{
    /**
     * @param Filter $filter
     * @param RouteListForm $form
     * @param RoutesRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function lists(Filter $filter, RouteListForm $form, RoutesRepository $repository)
    {
        $res = [];
        $data = $filter->getData();
        $form->validate($data);
        $res = $repository->getLists($data);
        return api_response($res);
    }
}