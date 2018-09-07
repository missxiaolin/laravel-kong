<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/4
 * Time: 下午6:39
 */

namespace App\Src\Form\User;


use Lin\Src\Basic\Form;

class UserBindRolesForm extends Form
{
    public function rules()
    {
        return [
            'userId' => 'required',
            'roleId' => 'required',
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
            'roleId' => '角色Id',
        ];
    }

    public function validation()
    {
    }
}