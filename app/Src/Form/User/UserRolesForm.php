<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/4
 * Time: 下午6:39
 */

namespace App\Src\Form\User;


use Lin\Src\Basic\Form;

class UserRolesForm extends Form
{
    public function rules()
    {
        return [
            'userId' => 'required',
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
            'userId' => '用户Id',
        ];
    }

    public function validation()
    {
    }
}