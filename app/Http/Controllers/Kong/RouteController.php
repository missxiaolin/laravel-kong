<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/27
 * Time: 下午2:02
 */

namespace App\Http\Controllers\Kong;


use App\Src\Basic\Filter;
use App\Src\Form\Auth\RouteAddForm;
use App\Src\Form\Auth\RouteDelForm;
use App\Src\Form\Auth\RouteInfoForm;
use App\Src\Form\Auth\RouteListForm;
use App\Src\Repository\RoleRepository;
use App\Src\Repository\RoutesRepository;

class RouteController extends BaseController
{
    /**
     * 规则列表
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

    /**
     * 跟新规则缓存
     * @return \Illuminate\Http\JsonResponse
     */
    public function reload()
    {
        $res = [];
        // 缓存
        $role = app(RoleRepository::class);
        $role->reloadRouters();
        return api_response($res);
    }

    /**
     * 规则添加
     * @param Filter $filter
     * @param RouteAddForm $form
     * @param RoutesRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function save(Filter $filter, RouteAddForm $form, RoutesRepository $repository)
    {
        $res = [];
        $data = $filter->getData();
        $form->validate($data);
        $res = $repository->save($data);
        return api_response($res);
    }

    /**
     * 规则详情
     * @param Filter $filter
     * @param RouteInfoForm $form
     * @param RoutesRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function info(Filter $filter, RouteInfoForm $form, RoutesRepository $repository)
    {
        $res = [];
        $data = $filter->getData();
        $form->validate($data);
        $res = $repository->info($data);
        return api_response($res);
    }

    /**
     * @param Filter $filter
     * @param RouteInfoForm $form
     * @param RoutesRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function delete(Filter $filter, RouteDelForm $form, RoutesRepository $repository)
    {
        $res = [];
        $data = $filter->getData();
        $form->validate($data);
        $res = $repository->del($data);
        return api_response($res);
    }
}