<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/4
 * Time: 下午6:37
 */

namespace App\Http\Controllers\Kong;


use App\Core\Enums\ErrorCode;
use App\Exceptions\CodeException;
use App\Src\Basic\Filter;
use App\Src\Form\User\LoginForm;
use App\Src\Form\User\UserAddForm;
use App\Src\Form\User\UserBindRolesForm;
use App\Src\Form\User\UserDisableForm;
use App\Src\Form\User\UserInfoForm;
use App\Src\Form\User\UserListForm;
use App\Src\Form\User\UserRolesForm;
use App\Src\Repository\UsersRepository;

class UserController extends BaseController
{
    /**
     * 用户登录
     * @param Filter $filter
     * @param LoginForm $form
     * @param UsersRepository $repository
     * @return mixed
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function login(Filter $filter, LoginForm $form, UsersRepository $repository)
    {
        $response = [];
        $data = $filter->getData();
        $form->validate($data);

        $res = $repository->setToken($data);
        $response['token'] = $res['token'];

        return api_response($response);
    }

    /**
     * 用户添加
     * @param Filter $filter
     * @param UserAddForm $form
     * @param UsersRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function add(Filter $filter, UserAddForm $form, UsersRepository $repository)
    {
        $data = $filter->getData();
        $form->validate($data);
        $response = $repository->setUser($data);
        return api_response($response);
    }

    /**
     * 用户列表
     * @param Filter $filter
     * @param UserListForm $form
     * @param UsersRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function lists(Filter $filter, UserListForm $form, UsersRepository $repository)
    {
        $data = $filter->getData();
        $form->validate($data);
        $response = $repository->getLists($data);
        return api_response($response);
    }

    /**
     * 禁用用户
     * @param Filter $filter
     * @param UserDisableForm $form
     * @param UsersRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function status(Filter $filter, UserDisableForm $form, UsersRepository $repository)
    {
        $data = $filter->getData();
        $form->validate($data);
        $response = $repository->disable($data);
        return api_response($response);
    }

    /**
     * 用户详情
     * @param Filter $filter
     * @param UserInfoForm $form
     * @param UsersRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function info(Filter $filter, UserInfoForm $form, UsersRepository $repository)
    {
        $data = $filter->getData();
        $form->validate($data);
        $model = $repository->getInfoId($data);
        if (!$model) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_API_NO_USER_ERROR);
        }
        return api_response($model);
    }

    /**
     * 获取用户角色
     * @param Filter $filter
     * @param UserRolesForm $form
     * @param UsersRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function roles(Filter $filter, UserRolesForm $form, UsersRepository $repository)
    {
        $data = $filter->getData();
        $form->validate($data);
        $response = $repository->getRoles($data);
        return api_response($response);
    }

    /**
     * 绑定角色
     * @param Filter $filter
     * @param UserBindRolesForm $form
     * @param UsersRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function updateRoles(Filter $filter, UserBindRolesForm $form, UsersRepository $repository)
    {
        $data = $filter->getData();
        $form->validate($data);
        $response = $repository->setRoles($data);
        return api_response($response);
    }

    /**
     * 权限列表
     * @param UsersRepository $repository
     * @return \Illuminate\Http\JsonResponse
     */
    public function power(UsersRepository $repository)
    {
        $user = app('kong.user');
        $res = $repository->getPower($user);
        return api_response($res);
    }

    /**
     * 按钮权限
     * @param Filter $filter
     * @param UsersRepository $repository
     * @return \Illuminate\Http\JsonResponse
     */
    public function btnPower(Filter $filter, UsersRepository $repository)
    {
        $data = $filter->getData();
        $user = app('kong.user');
        $res = $repository->getBtnPower($user, $data);
        return api_response($res);
    }
}