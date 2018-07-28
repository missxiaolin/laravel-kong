<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/26
 * Time: 下午7:25
 */

namespace App\Http\Controllers\Kong;


use App\Src\Basic\Filter;
use App\Src\Form\Auth\RoleAddForm;
use App\Src\Form\Auth\RoleDelForm;
use App\Src\Form\Auth\RoleInfoForm;
use App\Src\Form\Auth\RoleListForm;
use App\Src\Form\Auth\RoleSearchForm;
use App\Src\Repository\RoleRepository;

class RoleController extends BaseController
{
    /**
     * 列表
     * @param Filter $filter
     * @param RoleListForm $form
     * @param RoleRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function lists(Filter $filter, RoleListForm $form, RoleRepository $repository)
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
     * 添加
     * @param Filter $filter
     * @param RoleListForm $form
     * @param RoleRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function add(Filter $filter, RoleAddForm $form, RoleRepository $repository)
    {
        $res = [];
        $data = $filter->getData();
        $form->validate($data);
        $res = $repository->save($data);
        return api_response($res);
    }

    /**
     * 添加
     * @param Filter $filter
     * @param RoleListForm $form
     * @param RoleRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function info(Filter $filter, RoleInfoForm $form, RoleRepository $repository)
    {
        $res = [];
        $data = $filter->getData();
        $form->validate($data);
        $res = $repository->getIdRole($data);
        return api_response($res);
    }

    /**
     * 删除
     * @param Filter $filter
     * @param RoleInfoForm $form
     * @param RoleRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function delete(Filter $filter, RoleDelForm $form, RoleRepository $repository)
    {
        $res = [];
        $data = $filter->getData();
        $form->validate($data);
        $res = $repository->del($data);
        return api_response($res);
    }

    /**
     * 获取某角色绑定的路由
     * @param Filter $filter
     * @param RoleDelForm $form
     * @param RoleRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function routers(Filter $filter, RoleSearchForm $form, RoleRepository $repository)
    {
        $res = [];
        $data = $filter->getData();
        $form->validate($data);
        $res = $repository->search($data);
        return api_response($res);
    }
}