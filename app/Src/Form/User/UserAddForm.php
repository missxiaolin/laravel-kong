<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/4
 * Time: 下午6:39
 */

namespace App\Src\Form\User;


use App\Src\Basic\Form;

class UserAddForm extends Form
{
    public function rules()
    {
        return [
            'name' => 'required',
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
            'name' => '用户名称',
            'mobile' => '手机号码',
            'password' => '密码',
        ];
    }

    public function validation()
    {
        $mobile = array_get($this->data, 'mobile');
        if (!preg_match('/^1\d{10}$/', $mobile)) {
            $this->addError('mobile', '格式有误');
        }
    }
}