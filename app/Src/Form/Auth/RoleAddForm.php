<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/27
 * Time: 下午2:13
 */

namespace App\Src\Form\Auth;

use Lin\Src\Basic\Form;

class RoleAddForm extends Form
{
    public function rules()
    {
        return [
            'roleName' => 'required',
            'roleDesc' => 'required',
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
            'roleName' => '角色名称',
            'roleDesc' => '介绍',
        ];
    }

    public function validation()
    {
    }
}