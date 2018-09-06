<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/4
 * Time: 下午6:39
 */

namespace App\Src\Form\User;


use Lin\Src\Basic\Form;

class LoginForm extends Form
{
    public function rules()
    {
        return [
            'mobile' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute必填。',
        ];
    }

    public function attributes()
    {
        return [
            'mobile' => '手机号',
            'password' => '密码',
        ];
    }

    public function validation()
    {
    }
}