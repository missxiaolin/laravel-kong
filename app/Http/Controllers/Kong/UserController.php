<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/4
 * Time: 下午6:37
 */

namespace App\Http\Controllers\Kong;


use App\Http\Controllers\Controller;
use App\Src\Basic\Filter;
use App\Src\Form\User\LoginForm;

class UserController extends Controller
{
    public function add()
    {

    }

    public function login(Filter $filter, LoginForm $form)
    {
        $data = $filter->getData();
        $form->validate($data);
    }
}