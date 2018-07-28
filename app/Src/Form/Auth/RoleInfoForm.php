<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/27
 * Time: 下午2:13
 */

namespace App\Src\Form\Auth;

use App\Src\Basic\Form;

class RoleInfoForm extends Form
{
    public function rules()
    {
        return [
            'id' => 'required',
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
            'id' => '角色Id',
        ];
    }

    public function validation()
    {
    }
}