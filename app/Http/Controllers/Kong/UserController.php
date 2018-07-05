<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/4
 * Time: 下午6:37
 */

namespace App\Http\Controllers\Kong;


use App\Exceptions\CodeException;
use App\Http\Controllers\Controller;
use App\Src\Basic\Filter;
use App\Src\Form\User\LoginForm;
use App\Src\Repository\UsersRepository;

class UserController extends Controller
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

    public function add(Filter $filter)
    {
        $response = [];

    }

    public function lists()
    {

    }
}