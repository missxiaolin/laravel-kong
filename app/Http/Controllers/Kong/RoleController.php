<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/26
 * Time: 下午7:25
 */

namespace App\Http\Controllers\Kong;


use App\Src\Basic\Filter;
use App\Src\Form\Auth\RoleListForm;
use App\Src\Repository\RoleRepository;

class RoleController extends BaseController
{
    /**
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

    public function add()
    {

    }
}